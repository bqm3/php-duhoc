<?php

class AdminCountryController
{

    public static function index()
    {
        Auth::requirePermission('countries');
        $db = Db::getInstance()->pdo();

        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $whereClause = "WHERE c.is_delete = 0";
        $params = [];
        if (!empty($keyword)) {
            $whereClause .= " AND (c.name LIKE ? OR c.code LIKE ?)";
            $params[] = "%$keyword%";
            $params[] = "%$keyword%";
        }

        // Count
        $countStmt = $db->prepare("SELECT COUNT(*) FROM countries c $whereClause");
        $countStmt->execute($params);
        $totalRecords = $countStmt->fetchColumn();
        $totalPages = ceil($totalRecords / $limit);

        // Fetch
        $sql = "
            SELECT c.*, ct.name as continent_name 
            FROM countries c 
            LEFT JOIN continents ct ON c.continent_id = ct.id 
            $whereClause 
            ORDER BY c.display_order ASC, c.name ASC 
            LIMIT $limit OFFSET $offset
        ";
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $countries = $stmt->fetchAll(PDO::FETCH_ASSOC);

        view('admin', 'admin/countries/index', [
            'countries' => $countries,
            'total_pages' => $totalPages,
            'current_page' => $page,
            'keyword' => $keyword
        ]);
    }

    public static function create()
    {
        Auth::requirePermission('countries');
        $db = Db::getInstance()->pdo();
        $continents = $db->query("SELECT id, name FROM continents ORDER BY name")->fetchAll();

        $referer = $_SERVER['HTTP_REFERER'] ?? '/admin/countries';
        $redirect_to = $_GET['redirect_to'] ?? $referer;

        view('admin', 'admin/countries/create', [
            'continents' => $continents,
            'csrf' => Csrf::token(),
            'redirect_to' => $redirect_to
        ]);
    }

    public static function store()
    {
        Auth::requirePermission('countries');
        Csrf::verify($_POST['_csrf'] ?? '');

        $name = trim($_POST['name'] ?? '');
        $code = strtoupper(trim($_POST['code'] ?? ''));
        $slug = trim($_POST['slug'] ?? '');
        if (empty($slug))
            $slug = self::generateSlug($name);

        $continent_id = (int) $_POST['continent_id'];
        $description = $_POST['description'] ?? '';
        $display_order = (int) ($_POST['display_order'] ?? 0);
        $is_popular = isset($_POST['is_popular']) ? 1 : 0;

        if (empty($name))
            Response::json(['error' => 'Tên quốc gia bắt buộc'], 400);

        // Uploads
        $flag_url = null;
        $image_url = null;
        try {
            if (isset($_FILES['flag']) && $_FILES['flag']['size'] > 0)
                $flag_url = Upload::saveUploadedImage($_FILES['flag'], 'flag_', 'locations');

            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0)
                $image_url = Upload::saveUploadedImage($_FILES['image'], 'country_', 'locations');
        } catch (Exception $e) {
            Response::json(['error' => $e->getMessage()], 400);
        }

        $db = Db::getInstance()->pdo();

        // Check slug
        $stmt = $db->prepare("SELECT id FROM countries WHERE slug = ?");
        $stmt->execute([$slug]);
        if ($stmt->fetch())
            $slug .= '-' . time();

        $sql = "INSERT INTO countries (continent_id, name, slug, code, description, flag_url, image_url, display_order, is_popular, created_at) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $db->prepare($sql);

        if ($stmt->execute([$continent_id, $name, $slug, $code, $description, $flag_url, $image_url, $display_order, $is_popular])) {
            $_SESSION['flash_success'] = 'Thêm quốc gia thành công!';
            Response::redirect($_POST['redirect_to'] ?? '/admin/countries');
        } else {
            Response::json(['error' => 'Failed'], 500);
        }
    }

    public static function edit($id)
    {
        Auth::requirePermission('countries');
        $db = Db::getInstance()->pdo();

        $country = $db->prepare("SELECT * FROM countries WHERE id = ? AND is_delete = 0");
        $country->execute([$id]);
        $country = $country->fetch(PDO::FETCH_ASSOC);

        if (!$country)
            Response::notFound();

        $continents = $db->query("SELECT id, name FROM continents ORDER BY name")->fetchAll();

        $referer = $_SERVER['HTTP_REFERER'] ?? '/admin/countries';
        $redirect_to = $_GET['redirect_to'] ?? $referer;

        view('admin', 'admin/countries/edit', [
            'country' => $country,
            'continents' => $continents,
            'csrf' => Csrf::token(),
            'redirect_to' => $redirect_to
        ]);
    }

    public static function update($id)
    {
        Auth::requirePermission('countries');
        Csrf::verify($_POST['_csrf'] ?? '');

        $name = trim($_POST['name'] ?? '');
        $code = strtoupper(trim($_POST['code'] ?? ''));
        $slug = trim($_POST['slug'] ?? '');
        if (empty($slug))
            $slug = self::generateSlug($name);

        $continent_id = (int) $_POST['continent_id'];
        $description = $_POST['description'] ?? '';
        $display_order = (int) ($_POST['display_order'] ?? 0);
        $is_popular = isset($_POST['is_popular']) ? 1 : 0;

        $db = Db::getInstance()->pdo();

        // Get old files
        $stmt = $db->prepare("SELECT flag_url, image_url FROM countries WHERE id = ?");
        $stmt->execute([$id]);
        $old = $stmt->fetch();

        $flag_url = $old['flag_url'];
        $image_url = $old['image_url'];

        try {
            if (isset($_FILES['flag']) && $_FILES['flag']['size'] > 0)
                $flag_url = Upload::saveUploadedImage($_FILES['flag'], 'flag_', 'locations');

            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0)
                $image_url = Upload::saveUploadedImage($_FILES['image'], 'country_', 'locations');
        } catch (Exception $e) {
            Response::json(['error' => $e->getMessage()], 400);
        }

        // Check slug
        $stmt = $db->prepare("SELECT id FROM countries WHERE slug = ? AND id != ?");
        $stmt->execute([$slug, $id]);
        if ($stmt->fetch())
            $slug .= '-' . time();

        $sql = "UPDATE countries SET continent_id=?, name=?, slug=?, code=?, description=?, flag_url=?, image_url=?, display_order=?, is_popular=?, updated_at=NOW() WHERE id=?";
        $stmt = $db->prepare($sql);

        if ($stmt->execute([$continent_id, $name, $slug, $code, $description, $flag_url, $image_url, $display_order, $is_popular, $id])) {
            $_SESSION['flash_success'] = 'Cập nhật quốc gia thành công!';
            Response::redirect($_POST['redirect_to'] ?? '/admin/countries');
        } else {
            Response::json(['error' => 'Failed'], 500);
        }
    }

    public static function delete($id)
    {
        Auth::requirePermission('countries');
        Csrf::verify($_POST['_csrf'] ?? '');
        $db = Db::getInstance()->pdo();

        $stmt = $db->prepare("UPDATE countries SET is_delete = 1 WHERE id = ?");
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
