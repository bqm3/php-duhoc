<?php

class AdminContinentController
{

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
            $whereClause .= " AND (name LIKE ? OR slug LIKE ?)";
            $params[] = "%$keyword%";
            $params[] = "%$keyword%";
        }

        // Count
        $countStmt = $db->prepare("SELECT COUNT(*) FROM continents $whereClause");
        $countStmt->execute($params);
        $totalRecords = $countStmt->fetchColumn();
        $totalPages = ceil($totalRecords / $limit);

        // Fetch
        $stmt = $db->prepare("SELECT * FROM continents $whereClause ORDER BY display_order ASC, name ASC LIMIT $limit OFFSET $offset");
        $stmt->execute($params);
        $continents = $stmt->fetchAll(PDO::FETCH_ASSOC);

        view('admin', 'admin/continents/index', [
            'continents' => $continents,
            'total_pages' => $totalPages,
            'current_page' => $page,
            'keyword' => $keyword
        ]);
    }

    public static function create()
    {
        Auth::requireAdmin();

        $referer = $_SERVER['HTTP_REFERER'] ?? '/admin/continents';
        $redirect_to = $_GET['redirect_to'] ?? $referer;

        view('admin', 'admin/continents/create', [
            'csrf' => Csrf::token(),
            'redirect_to' => $redirect_to
        ]);
    }

    public static function store()
    {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');

        $name = trim($_POST['name'] ?? '');
        $slug = trim($_POST['slug'] ?? '');
        if (empty($slug))
            $slug = self::generateSlug($name);

        $description = $_POST['description'] ?? '';
        $display_order = (int) ($_POST['display_order'] ?? 0);

        if (empty($name)) {
            Response::json(['error' => 'Tên châu lục không được để trống'], 400);
        }

        // Upload Image
        $image_url = null;
        try {
            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
                $image_url = Upload::saveUploadedImage($_FILES['image'], 'continent_', 'locations');
            }
        } catch (Exception $e) {
            Response::json(['error' => $e->getMessage()], 400);
        }

        $db = Db::getInstance()->pdo();

        // Check slug
        $stmt = $db->prepare("SELECT id FROM continents WHERE slug = ?");
        $stmt->execute([$slug]);
        if ($stmt->fetch())
            $slug .= '-' . time();

        $stmt = $db->prepare("INSERT INTO continents (name, slug, description, image_url, display_order, created_at) VALUES (?, ?, ?, ?, ?, NOW())");

        if ($stmt->execute([$name, $slug, $description, $image_url, $display_order])) {
            $_SESSION['flash_success'] = 'Thêm châu lục thành công!';
            Response::redirect($_POST['redirect_to'] ?? '/admin/continents');
        } else {
            Response::json(['error' => 'Failed to create continent'], 500);
        }
    }

    public static function edit($id)
    {
        Auth::requireAdmin();
        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("SELECT * FROM continents WHERE id = ? AND is_delete = 0");
        $stmt->execute([$id]);
        $continent = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$continent)
            Response::notFound();

        $referer = $_SERVER['HTTP_REFERER'] ?? '/admin/continents';
        $redirect_to = $_GET['redirect_to'] ?? $referer;

        view('admin', 'admin/continents/edit', [
            'continent' => $continent,
            'csrf' => Csrf::token(),
            'redirect_to' => $redirect_to
        ]);
    }

    public static function update($id)
    {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');

        $name = trim($_POST['name'] ?? '');
        $slug = trim($_POST['slug'] ?? '');
        if (empty($slug))
            $slug = self::generateSlug($name);

        $description = $_POST['description'] ?? '';
        $display_order = (int) ($_POST['display_order'] ?? 0);

        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("SELECT image_url FROM continents WHERE id = ?");
        $stmt->execute([$id]);
        $old = $stmt->fetch();

        // Upload new Image
        $image_url = $old['image_url'];
        try {
            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
                $image_url = Upload::saveUploadedImage($_FILES['image'], 'continent_', 'locations');
            }
        } catch (Exception $e) {
            Response::json(['error' => $e->getMessage()], 400);
        }

        // Check slug
        $stmt = $db->prepare("SELECT id FROM continents WHERE slug = ? AND id != ?");
        $stmt->execute([$slug, $id]);
        if ($stmt->fetch())
            $slug .= '-' . time();

        $stmt = $db->prepare("UPDATE continents SET name=?, slug=?, description=?, image_url=?, display_order=?, updated_at=NOW() WHERE id=?");

        if ($stmt->execute([$name, $slug, $description, $image_url, $display_order, $id])) {
            $_SESSION['flash_success'] = 'Cập nhật châu lục thành công!';
            Response::redirect($_POST['redirect_to'] ?? '/admin/continents');
        } else {
            Response::json(['error' => 'Failed to update continent'], 500);
        }
    }

    public static function delete($id)
    {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');
        $db = Db::getInstance()->pdo();

        // Check dependencies
        $check = $db->prepare("SELECT COUNT(*) FROM countries WHERE continent_id = ?");
        $check->execute([$id]);
        if ($check->fetchColumn() > 0) {
            Response::json(['error' => 'Không thể xóa: Có quốc gia thuộc châu lục này.'], 400);
        }

        $stmt = $db->prepare("UPDATE continents SET is_delete = 1 WHERE id = ?");
        if ($stmt->execute([$id])) {
            ob_clean();
            Response::json(['success' => true]);
            exit;
        } else {
            ob_clean();
            Response::json(['error' => 'Failed'], 500);
            exit;
        }
    }

    // --- Helpers ---
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
