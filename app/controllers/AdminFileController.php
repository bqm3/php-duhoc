<?php
// app/controllers/AdminFileController.php

class AdminFileController
{
    public static function index()
    {
        Auth::requireAdmin();

        $db = Db::getInstance()->pdo();

        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $categoryId = isset($_GET['category_id']) ? (int) $_GET['category_id'] : 0;
        $type = isset($_GET['type']) ? trim($_GET['type']) : ''; // image|file

        $limit = 10;
        $offset = ($page - 1) * $limit;

        $where = "WHERE f.is_delete = 0";
        $params = [];

        if ($keyword !== '') {
            $where .= " AND (f.title LIKE ? OR f.url_file LIKE ? OR c.name LIKE ? OR u.full_name LIKE ?)";
            $s = "%$keyword%";
            $params[] = $s;
            $params[] = $s;
            $params[] = $s;
            $params[] = $s;
        }

        if ($categoryId > 0) {
            $where .= " AND f.category_id = ?";
            $params[] = $categoryId;
        }

        if ($type === 'image' || $type === 'file') {
            $where .= " AND f.type = ?";
            $params[] = $type;
        }

        // total
        $countSql = "
            SELECT COUNT(*)
            FROM files f
            LEFT JOIN categories c ON f.category_id = c.id
            LEFT JOIN users u ON f.user_id = u.id
            $where
        ";
        $countStmt = $db->prepare($countSql);
        $countStmt->execute($params);
        $totalRecords = (int) $countStmt->fetchColumn();
        $totalPages = (int) ceil($totalRecords / $limit);

        // list
        $sql = "
            SELECT f.*, c.name AS category_name, ctry.name AS country_name, u.full_name AS creator_name
            FROM files f
            LEFT JOIN categories c ON f.category_id = c.id
            LEFT JOIN countries ctry ON f.country_id = ctry.id
            LEFT JOIN users u ON f.user_id = u.id
            $where
            ORDER BY f.created_at DESC
            LIMIT $limit OFFSET $offset
        ";
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $files = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // categories for filter dropdown
        $cats = $db->query("SELECT * FROM categories ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

        view('admin', 'admin/files/index', [
            'files' => $files,
            'categories' => $cats,
            'total_pages' => $totalPages,
            'current_page' => $page,
            'keyword' => $keyword,
            'current_category_id' => $categoryId,
            'current_type' => $type,
            'csrf' => Csrf::token()
        ]);
    }

    public static function create()
    {
        Auth::requireAdmin();

        $db = Db::getInstance()->pdo();
        $categories = $db->query("SELECT * FROM categories ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
        $countries = $db->query("SELECT * FROM countries ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

        view('admin', 'admin/files/create', [
            'categories' => $categories,
            'countries' => $countries,
            'csrf' => Csrf::token()
        ]);
    }

    public static function store()
    {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');

        $title = trim($_POST['title'] ?? '');
        $category_id = !empty($_POST['category_id']) ? (int) $_POST['category_id'] : null;
        $country_id = !empty($_POST['country_id']) ? (int) $_POST['country_id'] : null;

        if ($title === '') {
            Response::json(['error' => 'Title is required'], 400);
        }

        $user = Auth::user();
        $user_id = $user ? (int) $user['id'] : null;

        // upload file input name: file
        if (!isset($_FILES['file'])) {
            Response::json(['error' => 'Vui lòng chọn file'], 400);
        }

        try {
            $saved = self::saveUploadedAny($_FILES['file'], 'lib_'); // returns ['url'=>..., 'type'=>...]
        } catch (Exception $e) {
            Response::json(['error' => $e->getMessage()], 400);
            return;
        }

        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("
            INSERT INTO files (category_id, country_id, user_id, title, url_file, type)
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        $ok = $stmt->execute([
            $category_id,
            $country_id,
            $user_id,
            $title,
            $saved['url'],
            $saved['type']
        ]);

        if ($ok)
            Response::redirect('/admin/files');
        Response::json(['error' => 'Failed to create file'], 500);
    }

    public static function edit($id)
    {
        Auth::requireAdmin();

        $db = Db::getInstance()->pdo();

        $stmt = $db->prepare("SELECT * FROM files WHERE id = ? AND is_delete = 0 LIMIT 1");
        $stmt->execute([(int) $id]);
        $file = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$file)
            Response::notFound();

        $categories = $db->query("SELECT * FROM categories ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
        $countries = $db->query("SELECT * FROM countries ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

        view('admin', 'admin/files/edit', [
            'file' => $file,
            'categories' => $categories,
            'countries' => $countries,
            'csrf' => Csrf::token()
        ]);
    }

    public static function update($id)
    {
        Auth::requireAdmin();

        if (!Csrf::verify($_POST['_csrf'] ?? '')) {
            Response::json(['error' => 'Invalid CSRF token'], 403);
            return;
        }

        $title = trim($_POST['title'] ?? '');
        $category_id = !empty($_POST['category_id']) ? (int) $_POST['category_id'] : null;
        $country_id = !empty($_POST['country_id']) ? (int) $_POST['country_id'] : null;

        if ($title === '') {
            Response::json(['error' => 'Title is required'], 400);
            return;
        }

        $db = Db::getInstance()->pdo();

        $stmt = $db->prepare("SELECT url_file FROM files WHERE id = ? LIMIT 1");
        $stmt->execute([(int) $id]);
        $old = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$old) {
            Response::notFound();
            return;
        }

        $url_file = $old['url_file'];
        $type = null;

        // upload new file optional
        try {
            if (isset($_FILES['file']) && ($_FILES['file']['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE) {
                $saved = self::saveUploadedAny($_FILES['file'], 'lib_');
                $url_file = $saved['url'];
                $type = $saved['type'];

                // delete old local file if in /assets/uploads/
                if (!empty($old['url_file']) && str_contains($old['url_file'], '/assets/uploads/files/')) {
                    $path = __DIR__ . '/../../public' . parse_url($old['url_file'], PHP_URL_PATH);
                    if (is_file($path))
                        @unlink($path);
                }
            }
        } catch (Exception $e) {
            Response::json(['error' => $e->getMessage()], 400);
            return;
        }

        // if no new upload: keep old type inferred from url
        if ($type === null) {
            $type = self::inferTypeFromUrl($url_file);
        }

        $stmt = $db->prepare("
            UPDATE files
            SET category_id = ?, country_id = ?, title = ?, url_file = ?, type = ?
            WHERE id = ?
        ");

        $ok = $stmt->execute([$category_id, $country_id, $title, $url_file, $type, (int) $id]);
        if ($ok)
            Response::redirect('/admin/files');
        Response::json(['error' => 'Failed to update file'], 500);
    }

    public static function delete($id)
    {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');

        $db = Db::getInstance()->pdo();

        // get old url to delete local file
        $stmt = $db->prepare("UPDATE files SET is_delete = 1 WHERE id = ?");
        $ok = $stmt->execute([(int) $id]);

        if ($ok) {
            // During soft delete, we typically keep the physical file.
            // If the user wants true soft delete, we don't unlink.
            if (ob_get_length())
                ob_clean();
            Response::json(['success' => true]);
            exit;
        }

        if (ob_get_length())
            ob_clean();
        Response::json(['error' => 'Failed to delete'], 500);
        exit;
    }

    private static function inferTypeFromUrl(string $url): string
    {
        $ext = strtolower(pathinfo(parse_url($url, PHP_URL_PATH) ?? $url, PATHINFO_EXTENSION));
        $img = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp', 'svg'];
        return in_array($ext, $img, true) ? 'image' : 'file';
    }

    // Save ANY file (image or other) -> /public/assets/uploads
    private static function saveUploadedAny($file, $prefix)
    {
        if (!isset($file['error']) || $file['error'] === UPLOAD_ERR_NO_FILE) {
            throw new Exception("Vui lòng chọn file");
        }

        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("File upload error: " . $file['error']);
        }

        if (!isset($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
            throw new Exception("File upload không hợp lệ");
        }

        $ext = strtolower(pathinfo($file['name'] ?? '', PATHINFO_EXTENSION));
        if ($ext === '') {
            throw new Exception('File không có phần mở rộng');
        }

        $allowed = [
            'jpg',
            'jpeg',
            'png',
            'gif',
            'webp',
            'bmp',
            'svg',
            'pdf',
            'doc',
            'docx',
            'xls',
            'xlsx',
            'ppt',
            'pptx',
            'zip',
            'rar',
            'txt',
            'csv'
        ];

        if (!in_array($ext, $allowed, true)) {
            throw new Exception('Định dạng file không hỗ trợ: ' . $ext);
        }

        $uploadDir = rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/assets/uploads/files';
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0755, true) && !is_dir($uploadDir)) {
                throw new Exception("Không tạo được thư mục upload: " . $uploadDir);
            }
        }

        $filename = $prefix . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
        $destPath = $uploadDir . '/' . $filename;

        if (!move_uploaded_file($file['tmp_name'], $destPath)) {
            throw new Exception('Upload failed (move_uploaded_file). Kiểm tra quyền ghi folder assets/uploads/files.');
        }

        $url = '/assets/uploads/files/' . $filename;
        $type = self::inferTypeFromUrl($url);

        return ['url' => $url, 'type' => $type];
    }
}
