<?php
// app/controllers/AdminCategoryController.php

class AdminCategoryController
{

    // List all categories
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
        $whereClause = "WHERE c.is_delete = 0";
        $params = [];
        if (!empty($keyword)) {
            $whereClause .= " AND (c.name LIKE ? OR c.slug LIKE ?)";
            $searchTerm = "%$keyword%";
            $params[] = $searchTerm;
            $params[] = $searchTerm;
        }

        // Count total
        $countStmt = $db->prepare("SELECT COUNT(*) FROM categories c $whereClause");
        $countStmt->execute($params);
        $totalRecords = $countStmt->fetchColumn();
        $totalPages = ceil($totalRecords / $limit);

        // Fetch categories with post count
        // Note: Using subquery or GROUP BY with LIMIT/OFFSET can be tricky but simple logic usually works fine
        // Using LEFT JOIN + GROUP BY with LIMIT applied to the result set
        $sql = "
            SELECT c.*, COUNT(p.id) as post_count 
            FROM categories c 
            LEFT JOIN posts p ON c.id = p.category_id 
            $whereClause
            GROUP BY c.id 
            ORDER BY c.display_order ASC, c.created_at DESC
            LIMIT $limit OFFSET $offset
        ";

        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        view('admin', 'admin/categories/index', [
            'categories' => $categories,
            'total_pages' => $totalPages,
            'current_page' => $page,
            'keyword' => $keyword
        ]);
    }

    // Show create form
    public static function create()
    {
        Auth::requireAdmin();

        $referer = $_SERVER['HTTP_REFERER'] ?? '/admin/categories';
        $redirect_to = $_GET['redirect_to'] ?? $referer;

        view('admin', 'admin/categories/create', [
            'csrf' => Csrf::token(),
            'redirect_to' => $redirect_to
        ]);
    }

    // Store new category
    public static function store()
    {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');

        $name = trim($_POST['name'] ?? '');
        $slug = trim($_POST['slug'] ?? '');
        $display_order = (int) ($_POST['display_order'] ?? 0);

        // Nếu slug trống, tự tạo từ name
        if (empty($slug) && !empty($name)) {
            $slug = self::generateSlug($name);
        }

        if (empty($name)) {
            view('admin', 'admin/categories/create', [
                'csrf' => Csrf::token(),
                'error' => "Tên danh mục không được để trống.",
                'old' => $_POST
            ]);
            return;
        }

        $db = Db::getInstance()->pdo();

        // Check slug exists
        $stmt = $db->prepare("SELECT id FROM categories WHERE slug = ?");
        $stmt->execute([$slug]);
        if ($stmt->fetch()) {
            // Nếu trùng slug, thêm hậu tố
            $slug = $slug . '-' . time();
        }

        $stmt = $db->prepare("INSERT INTO categories (name, slug, display_order, created_at) VALUES (?, ?, ?, NOW())");

        if ($stmt->execute([$name, $slug, $display_order])) {
            $_SESSION['flash_success'] = 'Thêm danh mục thành công!';
            Response::redirect($_POST['redirect_to'] ?? '/admin/categories');
        } else {
            view('admin', 'admin/categories/create', [
                'csrf' => Csrf::token(),
                'error' => "Lỗi hệ thống, không thể tạo danh mục.",
                'old' => $_POST
            ]);
        }
    }

    // Show edit form
    public static function edit($id)
    {
        Auth::requireAdmin();

        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("SELECT * FROM categories WHERE id = ? AND is_delete = 0");
        $stmt->execute([$id]);
        $category = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$category) {
            Response::notFound();
        }

        $referer = $_SERVER['HTTP_REFERER'] ?? '/admin/categories';
        $redirect_to = $_GET['redirect_to'] ?? $referer;

        view('admin', 'admin/categories/edit', [
            'category' => $category,
            'csrf' => Csrf::token(),
            'redirect_to' => $redirect_to
        ]);
    }

    // Update category
    public static function update($id)
    {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');

        $name = trim($_POST['name'] ?? '');
        $slug = trim($_POST['slug'] ?? '');
        $display_order = (int) ($_POST['display_order'] ?? 0);

        if (empty($slug) && !empty($name)) {
            $slug = self::generateSlug($name);
        }

        if (empty($name)) {
            Response::redirect("/admin/categories/$id/edit?error=empty_name");
            return;
        }

        $db = Db::getInstance()->pdo();

        // Check slug exists (exclude current category)
        $stmt = $db->prepare("SELECT id FROM categories WHERE slug = ? AND id != ?");
        $stmt->execute([$slug, $id]);
        if ($stmt->fetch()) {
            $slug = $slug . '-' . time();
        }

        $stmt = $db->prepare("UPDATE categories SET name=?, slug=?, display_order=? WHERE id=?");

        if ($stmt->execute([$name, $slug, $display_order, $id])) {
            $_SESSION['flash_success'] = 'Cập nhật danh mục thành công!';
            Response::redirect($_POST['redirect_to'] ?? '/admin/categories');
        } else {
            Response::json(['error' => 'Failed to update category'], 500);
        }
    }

    // Delete category
    public static function delete($id)
    {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');

        $db = Db::getInstance()->pdo();

        // Check for existing posts in this category
        $stmt = $db->prepare("SELECT COUNT(*) FROM posts WHERE category_id = ?");
        $stmt->execute([$id]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            Response::json(['error' => "Không thể xóa danh mục này vì đang có $count bài viết thuộc danh mục."], 400);
            return;
        }

        $stmt = $db->prepare("UPDATE categories SET is_delete = 1 WHERE id = ?");

        if ($stmt->execute([$id])) {
            ob_clean();
            Response::json(['success' => true]);
            exit;
        } else {
            ob_clean();
            Response::json(['error' => 'Failed to delete category'], 500);
            exit;
        }
    }

    // Helper: Generate slug (copy logic from PostController or move to a shared Helper)
    private static function generateSlug($text)
    {
        $text = self::removeVietnameseTones($text);
        $text = strtolower($text);
        $text = preg_replace('/[^a-z0-9\s-]/', '', $text);
        $text = preg_replace('/[\s-]+/', '-', $text);
        return trim($text, '-');
    }

    private static function removeVietnameseTones($str)
    {
        $vietnameseTones = [
            'à' => 'a',
            'á' => 'a',
            'ạ' => 'a',
            'ả' => 'a',
            'ã' => 'a',
            'â' => 'a',
            'ầ' => 'a',
            'ấ' => 'a',
            'ậ' => 'a',
            'ẩ' => 'a',
            'ẫ' => 'a',
            'ă' => 'a',
            'ằ' => 'a',
            'ắ' => 'a',
            'ặ' => 'a',
            'ẳ' => 'a',
            'ẵ' => 'a',
            'è' => 'e',
            'é' => 'e',
            'ẹ' => 'e',
            'ẻ' => 'e',
            'ẽ' => 'e',
            'ê' => 'e',
            'ề' => 'e',
            'ế' => 'e',
            'ệ' => 'e',
            'ể' => 'e',
            'ễ' => 'e',
            'ì' => 'i',
            'í' => 'i',
            'ị' => 'i',
            'ỉ' => 'i',
            'ĩ' => 'i',
            'ò' => 'o',
            'ó' => 'o',
            'ọ' => 'o',
            'ỏ' => 'o',
            'õ' => 'o',
            'ô' => 'o',
            'ồ' => 'o',
            'ố' => 'o',
            'ộ' => 'o',
            'ổ' => 'o',
            'ỗ' => 'o',
            'ơ' => 'o',
            'ờ' => 'o',
            'ớ' => 'o',
            'ợ' => 'o',
            'ở' => 'o',
            'ỡ' => 'o',
            'ù' => 'u',
            'ú' => 'u',
            'ụ' => 'u',
            'ủ' => 'u',
            'ũ' => 'u',
            'ư' => 'u',
            'ừ' => 'u',
            'ứ' => 'u',
            'ự' => 'u',
            'ử' => 'u',
            'ữ' => 'u',
            'ỳ' => 'y',
            'ý' => 'y',
            'ỵ' => 'y',
            'ỷ' => 'y',
            'ỹ' => 'y',
            'đ' => 'd',
            'À' => 'A',
            'Á' => 'A',
            'Ạ' => 'A',
            'Ả' => 'A',
            'Ã' => 'A',
            'Â' => 'A',
            'Ầ' => 'A',
            'Ấ' => 'A',
            'Ậ' => 'A',
            'Ẩ' => 'A',
            'Ẫ' => 'A',
            'Ă' => 'A',
            'Ằ' => 'A',
            'Ắ' => 'A',
            'Ặ' => 'A',
            'Ẳ' => 'A',
            'Ẵ' => 'A',
            'È' => 'E',
            'É' => 'E',
            'Ẹ' => 'E',
            'Ẻ' => 'E',
            'Ẽ' => 'E',
            'Ê' => 'E',
            'Ề' => 'E',
            'Ế' => 'E',
            'Ệ' => 'E',
            'Ể' => 'E',
            'Ễ' => 'E',
            'Ì' => 'I',
            'Í' => 'I',
            'Ị' => 'I',
            'Ỉ' => 'I',
            'Ĩ' => 'I',
            'Ò' => 'O',
            'Ó' => 'O',
            'Ọ' => 'O',
            'Ỏ' => 'O',
            'Õ' => 'O',
            'Ô' => 'O',
            'Ồ' => 'O',
            'Ố' => 'O',
            'Ộ' => 'O',
            'Ổ' => 'O',
            'Ỗ' => 'O',
            'Ơ' => 'O',
            'Ờ' => 'O',
            'Ớ' => 'O',
            'Ợ' => 'O',
            'Ở' => 'O',
            'Ỡ' => 'O',
            'Ù' => 'U',
            'Ú' => 'U',
            'Ụ' => 'U',
            'Ủ' => 'U',
            'Ũ' => 'U',
            'Ư' => 'U',
            'Ừ' => 'U',
            'Ứ' => 'U',
            'Ự' => 'U',
            'Ử' => 'U',
            'Ữ' => 'U',
            'Ỳ' => 'Y',
            'Ý' => 'Y',
            'Ỵ' => 'Y',
            'Ỷ' => 'Y',
            'Ỹ' => 'Y',
            'Đ' => 'D'
        ];
        return strtr($str, $vietnameseTones);
    }
}