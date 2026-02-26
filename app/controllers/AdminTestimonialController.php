<?php
// app/controllers/AdminTestimonialController.php

class AdminTestimonialController
{
    // List all testimonials
    public static function index()
    {
        Auth::requireAdmin();
        $db = Db::getInstance()->pdo();

        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $whereClause = "WHERE is_delete = 0";
        $params = [];
        if (!empty($keyword)) {
            $whereClause .= " AND (name LIKE ? OR role LIKE ? OR content LIKE ?)";
            $searchTerm = "%$keyword%";
            $params[] = $searchTerm;
            $params[] = $searchTerm;
            $params[] = $searchTerm;
        }

        $countStmt = $db->prepare("SELECT COUNT(*) FROM testimonials $whereClause");
        $countStmt->execute($params);
        $totalRecords = $countStmt->fetchColumn();
        $totalPages = ceil($totalRecords / $limit);

        $sql = "SELECT * FROM testimonials $whereClause ORDER BY display_order ASC, created_at DESC LIMIT $limit OFFSET $offset";
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $testimonials = $stmt->fetchAll(PDO::FETCH_ASSOC);

        view('admin', 'admin/testimonials/index', [
            'testimonials' => $testimonials,
            'total_pages' => $totalPages,
            'current_page' => $page,
            'keyword' => $keyword
        ]);
    }

    // Show create form
    public static function create()
    {
        Auth::requireAdmin();

        $referer = $_SERVER['HTTP_REFERER'] ?? '/admin/testimonials';
        $redirect_to = $_GET['redirect_to'] ?? $referer;

        view('admin', 'admin/testimonials/create', [
            'csrf' => Csrf::token(),
            'redirect_to' => $redirect_to
        ]);
    }

    // Store new testimonial
    public static function store()
    {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');

        $name = trim($_POST['name'] ?? '');
        $role = trim($_POST['role'] ?? '');
        $rating = (int) ($_POST['rating'] ?? 5);
        $content = trim($_POST['content'] ?? '');
        $display_order = (int) ($_POST['display_order'] ?? 0);
        $is_hidden = isset($_POST['is_hidden']) ? 1 : 0;

        $image_url = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image_url = Upload::saveUploadedImage($_FILES['image'], 'testimonial_', 'testimonials');
        }

        if (empty($name) || empty($content)) {
            view('admin', 'admin/testimonials/create', [
                'csrf' => Csrf::token(),
                'error' => "Tên và nội dung không được để trống.",
                'old' => $_POST
            ]);
            return;
        }

        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("INSERT INTO testimonials (name, image_url, role, rating, content, display_order, is_hidden) VALUES (?, ?, ?, ?, ?, ?, ?)");

        if ($stmt->execute([$name, $image_url, $role, $rating, $content, $display_order, $is_hidden])) {
            $_SESSION['flash_success'] = 'Thêm nhận xét thành công!';
            Response::redirect($_POST['redirect_to'] ?? '/admin/testimonials');
        } else {
            view('admin', 'admin/testimonials/create', [
                'csrf' => Csrf::token(),
                'error' => "Lỗi hệ thống, không thể lưu dữ liệu.",
                'old' => $_POST
            ]);
        }
    }

    // Show edit form
    public static function edit($id)
    {
        Auth::requireAdmin();
        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("SELECT * FROM testimonials WHERE id = ? AND is_delete = 0");
        $stmt->execute([$id]);
        $testimonial = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$testimonial) {
            Response::notFound();
        }

        $referer = $_SERVER['HTTP_REFERER'] ?? '/admin/testimonials';
        $redirect_to = $_GET['redirect_to'] ?? $referer;

        view('admin', 'admin/testimonials/edit', [
            'testimonial' => $testimonial,
            'csrf' => Csrf::token(),
            'redirect_to' => $redirect_to
        ]);
    }

    // Update testimonial
    public static function update($id)
    {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');

        $name = trim($_POST['name'] ?? '');
        $role = trim($_POST['role'] ?? '');
        $rating = (int) ($_POST['rating'] ?? 5);
        $content = trim($_POST['content'] ?? '');
        $display_order = (int) ($_POST['display_order'] ?? 0);
        $is_hidden = isset($_POST['is_hidden']) ? 1 : 0;

        $db = Db::getInstance()->pdo();

        // Get current image
        $stmt = $db->prepare("SELECT image_url FROM testimonials WHERE id = ?");
        $stmt->execute([$id]);
        $image_url = $stmt->fetchColumn();

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $new_image = Upload::saveUploadedImage($_FILES['image'], 'testimonial_', 'testimonials');
            if ($new_image) {
                $image_url = $new_image;
            }
        }

        if (empty($name) || empty($content)) {
            Response::redirect("/admin/testimonials/$id/edit?error=empty_fields");
            return;
        }

        $stmt = $db->prepare("UPDATE testimonials SET name=?, image_url=?, role=?, rating=?, content=?, display_order=?, is_hidden=? WHERE id=?");
        if ($stmt->execute([$name, $image_url, $role, $rating, $content, $display_order, $is_hidden, $id])) {
            $_SESSION['flash_success'] = 'Cập nhật nhận xét thành công!';
            Response::redirect($_POST['redirect_to'] ?? '/admin/testimonials');
        } else {
            Response::redirect("/admin/testimonials/$id/edit?error=system_error");
        }
    }

    // Toggle hidden status
    public static function toggleHidden($id)
    {
        Auth::requireAdmin();
        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("UPDATE testimonials SET is_hidden = 1 - is_hidden WHERE id = ?");
        if ($stmt->execute([$id])) {
            Response::json(['success' => true]);
        } else {
            Response::json(['error' => 'Failed to toggle status'], 500);
        }
    }

    // Delete testimonial (Soft delete)
    public static function delete($id)
    {
        Auth::requireAdmin();
        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("UPDATE testimonials SET is_delete = 1 WHERE id = ?");
        if ($stmt->execute([$id])) {
            Response::json(['success' => true]);
        } else {
            Response::json(['error' => 'Failed to delete'], 500);
        }
    }


}
