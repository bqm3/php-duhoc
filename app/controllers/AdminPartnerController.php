<?php
// app/controllers/AdminPartnerController.php

class AdminPartnerController
{
    public static function index()
    {
        Auth::requirePermission('partners');
        $db = Db::getInstance()->pdo();

        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $whereClause = "WHERE is_delete = 0";
        $params = [];
        if (!empty($keyword)) {
            $whereClause .= " AND name LIKE ?";
            $params[] = "%$keyword%";
        }

        $countStmt = $db->prepare("SELECT COUNT(*) FROM partners $whereClause");
        $countStmt->execute($params);
        $totalRecords = $countStmt->fetchColumn();
        $totalPages = ceil($totalRecords / $limit);

        $sql = "
            SELECT *
            FROM partners
            $whereClause
            ORDER BY stt ASC, created_at DESC
            LIMIT $limit OFFSET $offset
        ";
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $partners = $stmt->fetchAll(PDO::FETCH_ASSOC);

        view('admin', 'admin/partners/index', [
            'partners' => $partners,
            'total_pages' => $totalPages,
            'current_page' => $page,
            'keyword' => $keyword
        ]);
    }

    public static function create()
    {
        Auth::requirePermission('partners');

        $referer = $_SERVER['HTTP_REFERER'] ?? '/admin/partners';
        $redirect_to = $_GET['redirect_to'] ?? $referer;

        view('admin', 'admin/partners/create', [
            'csrf' => Csrf::token(),
            'redirect_to' => $redirect_to
        ]);
    }

    public static function store()
    {
        Auth::requirePermission('partners');
        Csrf::verify($_POST['_csrf'] ?? '');

        $name = trim($_POST['name'] ?? '');
        $link_href = trim($_POST['link_href'] ?? '');
        $is_hidden = isset($_POST['is_hidden']) ? 1 : 0;
        $stt = (int) ($_POST['stt'] ?? 0);

        if (empty($name)) {
            Response::json(['error' => 'Tên đối tác không được để trống'], 400);
            return;
        }

        $image_url = '';
        if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
            try {
                $image_url = Upload::saveUploadedImage($_FILES['image'], 'partner_', 'partners');
            } catch (Exception $e) {
                Response::json(['error' => $e->getMessage()], 400);
                return;
            }
        }

        $db = Db::getInstance()->pdo();
        $sql = "INSERT INTO partners (name, image_url, link_href, is_hidden, stt, created_at) 
                VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = $db->prepare($sql);

        if ($stmt->execute([$name, $image_url, $link_href, $is_hidden, $stt])) {
            $_SESSION['flash_success'] = 'Thêm đối tác thành công!';
            Response::redirect($_POST['redirect_to'] ?? '/admin/partners');
        } else {
            Response::json(['error' => 'Lỗi hệ thống'], 500);
        }
    }

    public static function edit($id)
    {
        Auth::requirePermission('partners');
        $db = Db::getInstance()->pdo();

        $stmt = $db->prepare("SELECT * FROM partners WHERE id = ? AND is_delete = 0");
        $stmt->execute([$id]);
        $partner = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$partner)
            Response::notFound();

        $referer = $_SERVER['HTTP_REFERER'] ?? '/admin/partners';
        $redirect_to = $_GET['redirect_to'] ?? $referer;

        view('admin', 'admin/partners/edit', [
            'partner' => $partner,
            'csrf' => Csrf::token(),
            'redirect_to' => $redirect_to
        ]);
    }

    public static function update($id)
    {
        Auth::requirePermission('partners');
        Csrf::verify($_POST['_csrf'] ?? '');

        $name = trim($_POST['name'] ?? '');
        $link_href = trim($_POST['link_href'] ?? '');
        $is_hidden = isset($_POST['is_hidden']) ? 1 : 0;
        $stt = (int) ($_POST['stt'] ?? 0);

        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("SELECT image_url FROM partners WHERE id = ?");
        $stmt->execute([$id]);
        $old = $stmt->fetch();
        $image_url = $old['image_url'];

        if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
            try {
                $image_url = Upload::saveUploadedImage($_FILES['image'], 'partner_', 'partners');
            } catch (Exception $e) {
                Response::json(['error' => $e->getMessage()], 400);
                return;
            }
        }

        $sql = "UPDATE partners SET name=?, image_url=?, link_href=?, is_hidden=?, stt=?, updated_at=NOW() WHERE id=?";
        $stmt = $db->prepare($sql);

        if ($stmt->execute([$name, $image_url, $link_href, $is_hidden, $stt, $id])) {
            $_SESSION['flash_success'] = 'Cập nhật đối tác thành công!';
            Response::redirect($_POST['redirect_to'] ?? '/admin/partners');
        } else {
            Response::json(['error' => 'Lỗi hệ thống'], 500);
        }
    }

    public static function delete($id)
    {
        Auth::requirePermission('partners');
        Csrf::verify($_POST['_csrf'] ?? '');
        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("UPDATE partners SET is_delete = 1 WHERE id = ?");
        if ($stmt->execute([$id])) {
            ob_clean();
            Response::json(['success' => true]);
            exit;
        } else {
            ob_clean();
            Response::json(['error' => 'Lỗi hệ thống'], 500);
            exit;
        }
    }

    public static function toggleHidden($id)
    {
        Auth::requirePermission('partners');
        Csrf::verify($_POST['_csrf'] ?? '');
        $db = Db::getInstance()->pdo();

        $stmt = $db->prepare("SELECT is_hidden FROM partners WHERE id = ?");
        $stmt->execute([$id]);
        $partner = $stmt->fetch();

        if (!$partner) {
            Response::json(['error' => 'Không tìm thấy đối tác'], 404);
            return;
        }

        $newStatus = $partner['is_hidden'] ? 0 : 1;
        $stmt = $db->prepare("UPDATE partners SET is_hidden = ? WHERE id = ?");

        if ($stmt->execute([$newStatus, $id])) {
            ob_clean();
            Response::json(['success' => true, 'is_hidden' => $newStatus]);
            exit;
        } else {
            ob_clean();
            Response::json(['error' => 'Lỗi hệ thống'], 500);
            exit;
        }
    }


}
