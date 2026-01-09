<?php
// app/controllers/AdminPostController.php

class AdminPostController
{

    // List all posts
    public static function index()
    {
        Auth::requireAdmin();

        $db = Db::getInstance()->pdo();

        // Lazy migration: Ensure user_id column exists
        try {
            $stmt = $db->prepare("SHOW COLUMNS FROM posts LIKE 'user_id'");
            $stmt->execute();
            if (!$stmt->fetch()) {
                $db->exec("ALTER TABLE posts ADD COLUMN user_id INT NULL AFTER id");
            }
        } catch (Exception $e) {
            // Ignore
        }

        // Pagination & Search Logic
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $categoryId = isset($_GET['category_id']) ? (int)$_GET['category_id'] : 0;
        
        $limit = 10;
        $offset = ($page - 1) * $limit;

        // Build query conditions
        $whereClause = "WHERE 1=1";
        $params = [];
        
        if (!empty($keyword)) {
            $whereClause .= " AND (p.title LIKE ? OR p.slug LIKE ? OR c.name LIKE ? OR u.full_name LIKE ?)";
            $searchTerm = "%$keyword%";
            $params[] = $searchTerm;
            $params[] = $searchTerm;
            $params[] = $searchTerm;
            $params[] = $searchTerm;
        }
        
        if ($categoryId > 0) {
            $whereClause .= " AND p.category_id = ?";
            $params[] = $categoryId;
        }

        // Count total records
        $countSql = "
            SELECT COUNT(*) 
            FROM posts p 
            LEFT JOIN categories c ON p.category_id = c.id 
            LEFT JOIN users u ON p.user_id = u.id
            $whereClause
        ";
        $countStmt = $db->prepare($countSql);
        $countStmt->execute($params);
        $totalRecords = $countStmt->fetchColumn();
        $totalPages = ceil($totalRecords / $limit);

        // Fetch records
        $sql = "
            SELECT p.*, c.name as category_name, u.full_name as creator_name, ctry.name as country_name, s.name as school_name
            FROM posts p 
            LEFT JOIN categories c ON p.category_id = c.id 
            LEFT JOIN users u ON p.user_id = u.id
            LEFT JOIN countries ctry ON p.country_id = ctry.id
            LEFT JOIN schools s ON p.school_id = s.id
            $whereClause
            ORDER BY p.created_at DESC
            LIMIT $limit OFFSET $offset
        ";
        
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        view('admin', 'admin/posts/index', [
            'posts' => $posts,
            'total_pages' => $totalPages,
            'current_page' => $page,
            'keyword' => $keyword,
            'current_category_id' => $categoryId
        ]);
    }

    // Show create form
    public static function create()
    {
        Auth::requireAdmin();

        $selectedCategoryId = isset($_GET['category_id']) ? (int)$_GET['category_id'] : 0;

        $db = Db::getInstance()->pdo();
        $stmt = $db->query("SELECT * FROM categories ORDER BY name");
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $db->query("SELECT * FROM countries ORDER BY name");
        $countries = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $db->query("SELECT id, name FROM schools ORDER BY name");
        $schools = $stmt->fetchAll(PDO::FETCH_ASSOC);

        view('admin', 'admin/posts/create', [
            'categories' => $categories,
            'countries' => $countries,
            'schools' => $schools,
            'selected_category_id' => $selectedCategoryId,
            'csrf' => Csrf::token()
        ]);
    }

    // Store new post
    public static function store()
    {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');

        $title = trim($_POST['title'] ?? '');
        $summary = $_POST['summary'] ?? '';
        $slug = self::generateSlug($_POST['slug'] ?? $title);
        $category_id = !empty($_POST['category_id']) ? (int)$_POST['category_id'] : null;
        $country_id = !empty($_POST['country_id']) ? (int)$_POST['country_id'] : null;
        $school_id = !empty($_POST['school_id']) ? (int)$_POST['school_id'] : null;
        $is_popular = isset($_POST['is_popular']) ? 1 : 0;
        $content = $_POST['content'] ?? '';

        $user = Auth::user();
        $user_id = $user ? $user['id'] : null;

        if (empty($title)) {
            Response::json(['error' => 'Title is required'], 400);
        }

        $featured_image = null;
        try {
            if (isset($_FILES['featured_image'])) {
                $featured_image = self::saveUploadedImage($_FILES['featured_image'], 'post_cover_');
            }
        } catch (Exception $e) {
            Response::json(['error' => $e->getMessage()], 400);
            return;
        }

        $db = Db::getInstance()->pdo();

        // Check if slug exists
        $stmt = $db->prepare("SELECT id FROM posts WHERE slug = ?");
        $stmt->execute([$slug]);
        if ($stmt->fetch()) {
            $slug = $slug . '-' . time();
        }

        $stmt = $db->prepare("
            INSERT INTO posts (slug, title, summary, category_id, country_id, school_id, is_popular, content, user_id, featured_image) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        if ($stmt->execute([$slug, $title, $summary, $category_id, $country_id, $school_id, $is_popular, $content, $user_id, $featured_image])) {
            Response::redirect('/admin/posts');
        } else {
            Response::json(['error' => 'Failed to create post'], 500);
        }
    }

    // Show edit form
    public static function edit($id)
    {
        Auth::requireAdmin();

        $db = Db::getInstance()->pdo();

        // Get post
        $stmt = $db->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$post) {
            Response::notFound();
        }

        // Get categories
        $stmt = $db->query("SELECT * FROM categories ORDER BY name");
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $db->query("SELECT * FROM countries ORDER BY name");
        $countries = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $db->query("SELECT id, name FROM schools ORDER BY name");
        $schools = $stmt->fetchAll(PDO::FETCH_ASSOC);

        view('admin', 'admin/posts/edit', [
            'post' => $post,
            'categories' => $categories,
            'countries' => $countries,
            'schools' => $schools,
            'csrf' => Csrf::token()
        ]);
    }

    // Update post
    public static function update($id)
    {
        Auth::requireAdmin();

        if (!Csrf::verify($_POST['_csrf'] ?? '')) {
            Response::json(['error' => 'Invalid CSRF token'], 403);
            return;
        }

        $title = trim($_POST['title'] ?? '');
        $summary = $_POST['summary'] ?? '';
        $slug = self::generateSlug($_POST['slug'] ?? $title);
        $category_id = !empty($_POST['category_id']) ? (int)$_POST['category_id'] : null;
        $country_id = !empty($_POST['country_id']) ? (int)$_POST['country_id'] : null;
        $school_id = !empty($_POST['school_id']) ? (int)$_POST['school_id'] : null;
        $is_popular = isset($_POST['is_popular']) ? 1 : 0;
        $content = $_POST['content'] ?? '';

        // ADMIN chỉnh tay view/share
        $count_view  = isset($_POST['count_view']) ? (int)$_POST['count_view'] : 0;
        $count_share = isset($_POST['count_share']) ? (int)$_POST['count_share'] : 0;

        // chặn âm
        if ($count_view < 0) $count_view = 0;
        if ($count_share < 0) $count_share = 0;

        if (empty($title)) {
            Response::json(['error' => 'Title is required'], 400);
            return;
        }

        $db = Db::getInstance()->pdo();

        // lấy post cũ để biết ảnh cũ
        $stmt = $db->prepare("SELECT featured_image FROM posts WHERE id = ? LIMIT 1");
        $stmt->execute([(int)$id]);
        $old = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$old) {
            Response::notFound();
            return;
        }

        // Check if slug exists (exclude current post)
        $stmt = $db->prepare("SELECT id FROM posts WHERE slug = ? AND id != ?");
        $stmt->execute([$slug, $id]);
        if ($stmt->fetch()) {
            $slug = $slug . '-' . time();
        }

        // upload ảnh mới nếu có
        $newFeatured = $old['featured_image'] ?? null;
        try {
            if (isset($_FILES['featured_image']) && ($_FILES['featured_image']['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE) {
                $newFeatured = self::saveUploadedImage($_FILES['featured_image'], 'post_cover_');

                // (tuỳ chọn) xoá file cũ trên disk nếu thuộc uploads của mình
                if (!empty($old['featured_image']) && str_contains($old['featured_image'], '/assets/uploads/')) {
                    $path = __DIR__ . '/../../public' . parse_url($old['featured_image'], PHP_URL_PATH);
                    if (is_file($path)) @unlink($path);
                }
            }
        } catch (Exception $e) {
            Response::json(['error' => $e->getMessage()], 400);
            return;
        }

        $stmt = $db->prepare("
            UPDATE posts 
            SET slug = ?, title = ?, summary = ?, category_id = ?, country_id = ?, school_id = ?, is_popular = ?, content = ?, featured_image = ?, count_view = ?, count_share = ?
            WHERE id = ?
        ");

        if ($stmt->execute([$slug, $title, $summary, $category_id, $country_id, $school_id, $is_popular, $content, $newFeatured, $count_view, $count_share, $id])) {
            Response::redirect('/admin/posts');
        } else {
            Response::json(['error' => 'Failed to update post'], 500);
        }
    }


    // Delete post
    public static function delete($id)
    {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');

        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("DELETE FROM posts WHERE id = ?");

        if ($stmt->execute([$id])) {
            ob_clean();
            Response::json(['success' => true]);
            exit;
        } else {
            ob_clean();
            Response::json(['error' => 'Failed to delete post'], 500);
            exit;
        }
    }

    // /posts/{slug}
    public static function show($slug)
    {
        $db = Db::getInstance()->pdo();

        $stmt = $db->prepare("
            SELECT p.*, c.name AS category_name, u.full_name AS creator_name
            FROM posts p
            LEFT JOIN categories c ON p.category_id = c.id
            LEFT JOIN users u ON p.user_id = u.id
            WHERE p.slug = ?
            LIMIT 1
        ");
        $stmt->execute([$slug]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$post) {
            Response::notFound();
        }

        // Chống tăng view liên tục khi refresh: 1 session / 1 bài
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
        $key = "viewed_post_" . $post['id'];
        if (empty($_SESSION[$key])) {
            $_SESSION[$key] = true;

            $up = $db->prepare("UPDATE posts SET count_view = count_view + 1 WHERE id = ?");
            $up->execute([$post['id']]);

            // cập nhật lại để view hiển thị đúng ngay trong lần render này
            $post['count_view'] = (int)$post['count_view'] + 1;
        }

        view('main', 'client/posts/show', [
            'post' => $post,
            'csrf' => Csrf::token()
        ]);
    }

    // POST /posts/{id}/share
    public static function share($id)
    {
        // Share vẫn nên có CSRF để tránh bị spam từ site khác
        if (!Csrf::verify($_POST['_csrf'] ?? '')) {
            Response::json(['ok' => false, 'message' => 'Invalid CSRF token'], 403);
        }

        $id = (int)$id;
        if ($id <= 0) Response::json(['ok' => false, 'message' => 'Invalid post id'], 400);

        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
        $key = "shared_post_" . $id;
        if (!empty($_SESSION[$key])) {
            // đã cộng rồi trong session này -> trả ok luôn (tránh spam)
            Response::json(['ok' => true, 'counted' => false]);
        }
        $_SESSION[$key] = true;

        $db = Db::getInstance()->pdo();
        $up = $db->prepare("UPDATE posts SET count_share = count_share + 1 WHERE id = ?");
        $up->execute([$id]);

        // lấy lại số share mới để trả về UI
        $stmt = $db->prepare("SELECT count_share FROM posts WHERE id = ? LIMIT 1");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        Response::json([
            'ok' => true,
            'counted' => true,
            'count_share' => (int)($row['count_share'] ?? 0),
        ]);
    }

    // Save uploaded image
    private static function saveUploadedImage($file, $prefix)
    {
        // Check if file array structure is valid
        if (!isset($file) || !isset($file['error'])) {
            return null;
        }

        // Check specifically for no file uploaded
        if ($file['error'] === UPLOAD_ERR_NO_FILE) {
            return null;
        }

        if ($file['error'] !== UPLOAD_ERR_OK) {
            $msg = 'Upload failed.';
            switch ($file['error']) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    $msg = 'File is too large (exceeds server limits).';
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $msg = 'File was only partially uploaded.';
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $msg = 'Missing a temporary folder.';
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $msg = 'Failed to write file to disk.';
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $msg = 'File upload stopped by extension.';
                    break;
            }
            throw new Exception($msg);
        }

        if (!isset($file['tmp_name']) || empty($file['tmp_name'])) {
             return null;
        }

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (!in_array($ext, $allowed, true)) {
            throw new Exception('Invalid file type. Only JPG, PNG, GIF, WEBP allowed.');
        }

        $filename = $prefix . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;

        // Lưu file vào public/assets/uploads
        $uploadDir = realpath(__DIR__ . '/../../public') . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'uploads';
        if ($uploadDir === false) {
            // Try to create if realpath fails (dir doesnt exist)
             $uploadDir = __DIR__ . '/../../public/assets/uploads';
        }

        if (!is_dir($uploadDir) && !mkdir($uploadDir, 0755, true)) {
            throw new Exception('Failed to create upload directory.');
        }

        $destPath = $uploadDir . DIRECTORY_SEPARATOR . $filename;

        if (!move_uploaded_file($file['tmp_name'], $destPath)) {
            throw new Exception('Failed to move uploaded file. Check permissions.');
        }

        // Khi render: echo $base . $featured_image
        return '/assets/uploads/' . $filename;
    }


    // Generate slug from title
    private static function generateSlug($text)
    {
        // Convert Vietnamese characters
        $text = self::removeVietnameseTones($text);

        // Convert to lowercase
        $text = strtolower($text);

        // Remove special characters
        $text = preg_replace('/[^a-z0-9\s-]/', '', $text);

        // Replace spaces with hyphens
        $text = preg_replace('/[\s-]+/', '-', $text);

        // Trim hyphens from ends
        return trim($text, '-');
    }

    // Remove Vietnamese tones
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

    // Upload image for CKEditor
    public static function uploadImage()
{
    Auth::requireAdmin();

    if (!Csrf::verify($_POST['_csrf'] ?? '')) {
        if (ob_get_length()) ob_clean();
        header('Content-Type: application/json; charset=utf-8');
        http_response_code(403);
        echo json_encode(['error' => 'Invalid CSRF token']);
        exit;
    }

    if (!isset($_FILES['upload'])) {
        if (ob_get_length()) ob_clean();
        header('Content-Type: application/json; charset=utf-8');
        http_response_code(400);
        echo json_encode(['error' => 'No file uploaded']);
        exit;
    }

    if (($_FILES['upload']['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_OK) {
        if (ob_get_length()) ob_clean();
        header('Content-Type: application/json; charset=utf-8');
        http_response_code(400);
        echo json_encode(['error' => 'Upload failed']);
        exit;
    }

    try {
        $file = $_FILES['upload'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (!in_array($ext, $allowed, true)) {
            throw new Exception('Invalid file type');
        }

        $filename = 'post_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;

        $uploadDir = __DIR__ . '/../../public/assets/uploads';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $destPath = $uploadDir . '/' . $filename;

        if (!move_uploaded_file($file['tmp_name'], $destPath)) {
            throw new Exception('Failed to move file');
        }

        $url = '/assets/uploads/' . $filename;
        if (ob_get_length()) ob_clean();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'url' => $url,
        ]);
        exit;

    } catch (Exception $e) {
        header('Content-Type: application/json; charset=utf-8');
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
        exit;
    }
}

}
