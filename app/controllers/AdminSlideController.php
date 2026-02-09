<?php
// app/controllers/AdminSlideController.php

class AdminSlideController
{
    public static function index()
    {
        Auth::requireAdmin();
        $db = Db::getInstance()->pdo();

        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $whereClause = "WHERE is_dele = 0";
        $params = [];
        if (!empty($keyword)) {
            $whereClause .= " AND name LIKE ?";
            $params[] = "%$keyword%";
        }

        $countStmt = $db->prepare("SELECT COUNT(*) FROM slides $whereClause");
        $countStmt->execute($params);
        $totalRecords = $countStmt->fetchColumn();
        $totalPages = ceil($totalRecords / $limit);

        $sql = "
            SELECT s.*, c.name as country_name, sc.name as school_name
            FROM slides s
            LEFT JOIN countries c ON s.id_country = c.id
            LEFT JOIN schools sc ON s.id_school = sc.id
            $whereClause
            ORDER BY s.stt ASC, s.created_at DESC
            LIMIT $limit OFFSET $offset
        ";
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $slides = $stmt->fetchAll(PDO::FETCH_ASSOC);

        view('admin', 'admin/slides/index', [
            'slides' => $slides,
            'total_pages' => $totalPages,
            'current_page' => $page,
            'keyword' => $keyword
        ]);
    }

    public static function create()
    {
        Auth::requireAdmin();
        $db = Db::getInstance()->pdo();

        $countries = $db->query("SELECT id, name FROM countries ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
        $schools = $db->query("SELECT id, name FROM schools ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

        view('admin', 'admin/slides/create', [
            'countries' => $countries,
            'schools' => $schools,
            'csrf' => Csrf::token()
        ]);
    }

    public static function store()
    {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');

        $name = trim($_POST['name'] ?? '');
        $link_href = trim($_POST['link_href'] ?? '');
        $id_country = !empty($_POST['id_country']) ? (int) $_POST['id_country'] : null;
        $id_school = !empty($_POST['id_school']) ? (int) $_POST['id_school'] : null;
        $is_hidden = isset($_POST['is_hidden']) ? 1 : 0;
        $stt = (int) ($_POST['stt'] ?? 0);
        $ghi_chu = $_POST['ghi_chu'] ?? '';

        if (empty($name)) {
            Response::json(['error' => 'Tên slide không được để trống'], 400);
            return;
        }

        $image_url = '';
        if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
            try {
                $image_url = self::saveUploadedImage($_FILES['image'], 'slide_');
            } catch (Exception $e) {
                Response::json(['error' => $e->getMessage()], 400);
                return;
            }
        }

        $db = Db::getInstance()->pdo();
        $sql = "INSERT INTO slides (name, image_url, link_href, id_country, id_school, is_hidden, stt, ghi_chu, created_at) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $db->prepare($sql);

        if ($stmt->execute([$name, $image_url, $link_href, $id_country, $id_school, $is_hidden, $stt, $ghi_chu])) {
            Response::redirect('/admin/slides');
        } else {
            Response::json(['error' => 'Lỗi hệ thống'], 500);
        }
    }

    public static function edit($id)
    {
        Auth::requireAdmin();
        $db = Db::getInstance()->pdo();

        $stmt = $db->prepare("SELECT * FROM slides WHERE id = ? AND is_dele = 0");
        $stmt->execute([$id]);
        $slide = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$slide)
            Response::notFound();

        $countries = $db->query("SELECT id, name FROM countries ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
        $schools = $db->query("SELECT id, name FROM schools ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

        view('admin', 'admin/slides/edit', [
            'slide' => $slide,
            'countries' => $countries,
            'schools' => $schools,
            'csrf' => Csrf::token()
        ]);
    }

    public static function update($id)
    {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');

        $name = trim($_POST['name'] ?? '');
        $link_href = trim($_POST['link_href'] ?? '');
        $id_country = !empty($_POST['id_country']) ? (int) $_POST['id_country'] : null;
        $id_school = !empty($_POST['id_school']) ? (int) $_POST['id_school'] : null;
        $is_hidden = isset($_POST['is_hidden']) ? 1 : 0;
        $stt = (int) ($_POST['stt'] ?? 0);
        $ghi_chu = $_POST['ghi_chu'] ?? '';

        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("SELECT image_url FROM slides WHERE id = ?");
        $stmt->execute([$id]);
        $old = $stmt->fetch();
        $image_url = $old['image_url'];

        if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
            try {
                $image_url = self::saveUploadedImage($_FILES['image'], 'slide_');
            } catch (Exception $e) {
                Response::json(['error' => $e->getMessage()], 400);
                return;
            }
        }

        $sql = "UPDATE slides SET name=?, image_url=?, link_href=?, id_country=?, id_school=?, is_hidden=?, stt=?, ghi_chu=?, updated_at=NOW() WHERE id=?";
        $stmt = $db->prepare($sql);

        if ($stmt->execute([$name, $image_url, $link_href, $id_country, $id_school, $is_hidden, $stt, $ghi_chu, $id])) {
            Response::redirect('/admin/slides');
        } else {
            Response::json(['error' => 'Lỗi hệ thống'], 500);
        }
    }

    public static function delete($id)
    {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');
        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("UPDATE slides SET is_dele = 1 WHERE id = ?");
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
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');
        $db = Db::getInstance()->pdo();

        $stmt = $db->prepare("SELECT is_hidden FROM slides WHERE id = ?");
        $stmt->execute([$id]);
        $slide = $stmt->fetch();

        if (!$slide) {
            Response::json(['error' => 'Không tìm thấy slide'], 404);
            return;
        }

        $newStatus = $slide['is_hidden'] ? 0 : 1;
        $stmt = $db->prepare("UPDATE slides SET is_hidden = ? WHERE id = ?");

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
    private static function saveUploadedImage($file, $prefix)
    {
        $uploadDir = __DIR__ . '/../../public/assets/uploads/slides';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $filename = $prefix . time() . '_' . rand(1000, 9999) . '.' . $ext;
        if (move_uploaded_file($file['tmp_name'], $uploadDir . '/' . $filename)) {
            return '/assets/uploads/slides/' . $filename;
        }
        throw new Exception("Upload failed");
    }
}
