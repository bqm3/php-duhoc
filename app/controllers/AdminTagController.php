<?php
// app/controllers/AdminTagController.php

class AdminTagController
{

    // List all tags
    public static function index()
    {
        Auth::requireAdmin();

        $db = Db::getInstance()->pdo();

        // Pagination & Search Logic
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $limit = 10;
        $offset = ($page - 1) * $limit;

        // Conditions
        $whereClause = "WHERE t.is_delete = 0";
        $params = [];
        if (!empty($keyword)) {
            $whereClause .= " AND t.name LIKE ?";
            $searchTerm = "%$keyword%";
            $params[] = $searchTerm;
        }

        // Count total
        $countStmt = $db->prepare("SELECT COUNT(*) FROM tags t $whereClause");
        $countStmt->execute($params);
        $totalRecords = $countStmt->fetchColumn();
        $totalPages = ceil($totalRecords / $limit);

        // Fetch tags with post count
        $sql = "
            SELECT t.*, COUNT(p.id) as post_count 
            FROM tags t 
            LEFT JOIN posts p ON t.id = p.tag_id 
            $whereClause
            GROUP BY t.id 
            ORDER BY t.created_at DESC
            LIMIT $limit OFFSET $offset
        ";

        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);

        view('admin', 'admin/tags/index', [
            'tags' => $tags,
            'total_pages' => $totalPages,
            'current_page' => $page,
            'keyword' => $keyword
        ]);
    }

    // Show create form
    public static function create()
    {
        Auth::requireAdmin();

        $referer = $_SERVER['HTTP_REFERER'] ?? '/admin/tags';
        $redirect_to = $_GET['redirect_to'] ?? $referer;

        view('admin', 'admin/tags/create', [
            'csrf' => Csrf::token(),
            'redirect_to' => $redirect_to
        ]);
    }

    // Store new tag
    public static function store()
    {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');

        $name = trim($_POST['name'] ?? '');
        $icon = trim($_POST['icon'] ?? '');

        if (empty($name)) {
            view('admin', 'admin/tags/create', [
                'csrf' => Csrf::token(),
                'error' => "Tên tag không được để trống.",
                'old' => $_POST
            ]);
            return;
        }

        $db = Db::getInstance()->pdo();

        $stmt = $db->prepare("INSERT INTO tags (name, icon, created_at) VALUES (?, ?, NOW())");

        if ($stmt->execute([$name, $icon])) {
            $_SESSION['flash_success'] = 'Thêm thẻ thành công!';
            Response::redirect($_POST['redirect_to'] ?? '/admin/tags');
        } else {
            view('admin', 'admin/tags/create', [
                'csrf' => Csrf::token(),
                'error' => "Lỗi hệ thống, không thể tạo tag.",
                'old' => $_POST
            ]);
        }
    }

    // Show edit form
    public static function edit($id)
    {
        Auth::requireAdmin();

        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("SELECT * FROM tags WHERE id = ? AND is_delete = 0");
        $stmt->execute([$id]);
        $tag = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$tag) {
            Response::notFound();
        }

        $referer = $_SERVER['HTTP_REFERER'] ?? '/admin/tags';
        $redirect_to = $_GET['redirect_to'] ?? $referer;

        view('admin', 'admin/tags/edit', [
            'tag' => $tag,
            'csrf' => Csrf::token(),
            'redirect_to' => $redirect_to
        ]);
    }

    // Update tag
    public static function update($id)
    {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');

        $name = trim($_POST['name'] ?? '');
        $icon = trim($_POST['icon'] ?? '');

        if (empty($name)) {
            Response::redirect("/admin/tags/$id/edit?error=empty_name");
            return;
        }

        $db = Db::getInstance()->pdo();

        $stmt = $db->prepare("UPDATE tags SET name=?, icon=? WHERE id=?");

        if ($stmt->execute([$name, $icon, $id])) {
            $_SESSION['flash_success'] = 'Cập nhật thẻ thành công!';
            Response::redirect($_POST['redirect_to'] ?? '/admin/tags');
        } else {
            Response::json(['error' => 'Failed to update tag'], 500);
        }
    }

    // Delete tag
    public static function delete($id)
    {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');

        $db = Db::getInstance()->pdo();

        // Check for existing posts in this tag
        $stmt = $db->prepare("SELECT COUNT(*) FROM posts WHERE tag_id = ?");
        $stmt->execute([$id]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            Response::json(['error' => "Không thể xóa tag này vì đang có $count bài viết thuộc tag này."], 400);
            return;
        }

        $stmt = $db->prepare("UPDATE tags SET is_delete = 1 WHERE id = ?");

        if ($stmt->execute([$id])) {
            ob_clean();
            Response::json(['success' => true]);
            exit;
        } else {
            ob_clean();
            Response::json(['error' => 'Failed to delete tag'], 500);
            exit;
        }
    }
}
