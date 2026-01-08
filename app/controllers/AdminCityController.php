<?php

class AdminCityController {

    public static function index() {
        Auth::requireAdmin();
        $db = Db::getInstance()->pdo();

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $whereClause = "WHERE 1=1";
        $params = [];
        if (!empty($keyword)) {
            $whereClause .= " AND (ci.name LIKE ? OR ci.slug LIKE ?)";
            $params[] = "%$keyword%";
            $params[] = "%$keyword%";
        }

        // Count
        $countStmt = $db->prepare("SELECT COUNT(*) FROM cities ci $whereClause");
        $countStmt->execute($params);
        $totalRecords = $countStmt->fetchColumn();
        $totalPages = ceil($totalRecords / $limit);

        // Fetch
        $sql = "
            SELECT ci.*, c.name as country_name 
            FROM cities ci 
            LEFT JOIN countries c ON ci.country_id = c.id 
            $whereClause 
            ORDER BY ci.name ASC 
            LIMIT $limit OFFSET $offset
        ";
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);

        view('admin', 'admin/cities/index', [
            'cities' => $cities,
            'total_pages' => $totalPages,
            'current_page' => $page,
            'keyword' => $keyword
        ]);
    }

    public static function create() {
        Auth::requireAdmin();
        $db = Db::getInstance()->pdo();
        // Get countries for dropdown
        $countries = $db->query("SELECT id, name FROM countries ORDER BY name")->fetchAll();
        
        view('admin', 'admin/cities/create', [
            'countries' => $countries,
            'csrf' => Csrf::token()
        ]);
    }

    public static function store() {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');

        $name = trim($_POST['name'] ?? '');
        $slug = trim($_POST['slug'] ?? '');
        if (empty($slug)) $slug = self::generateSlug($name);
        
        $country_id = !empty($_POST['country_id']) ? (int)$_POST['country_id'] : null;

        if (empty($name)) Response::json(['error' => 'Name is required'], 400);

        $db = Db::getInstance()->pdo();
        
        // Check slug
        $stmt = $db->prepare("SELECT id FROM cities WHERE slug = ?");
        $stmt->execute([$slug]);
        if ($stmt->fetch()) $slug .= '-' . time();

        $stmt = $db->prepare("INSERT INTO cities (country_id, name, slug, created_at) VALUES (?, ?, ?, NOW())");
        
        if ($stmt->execute([$country_id, $name, $slug])) {
            Response::redirect('/admin/cities');
        } else {
            Response::json(['error' => 'Failed to create'], 500);
        }
    }

    public static function edit($id) {
        Auth::requireAdmin();
        $db = Db::getInstance()->pdo();
        
        $city = $db->prepare("SELECT * FROM cities WHERE id = ?");
        $city->execute([$id]);
        $city = $city->fetch(PDO::FETCH_ASSOC);
        
        if (!$city) Response::notFound();

        $countries = $db->query("SELECT id, name FROM countries ORDER BY name")->fetchAll();

        view('admin', 'admin/cities/edit', [
            'city' => $city,
            'countries' => $countries,
            'csrf' => Csrf::token()
        ]);
    }

    public static function update($id) {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');

        $name = trim($_POST['name'] ?? '');
        $slug = trim($_POST['slug'] ?? '');
        if (empty($slug)) $slug = self::generateSlug($name);
        
        $country_id = !empty($_POST['country_id']) ? (int)$_POST['country_id'] : null;

        $db = Db::getInstance()->pdo();
        
        // Check slug
        $stmt = $db->prepare("SELECT id FROM cities WHERE slug = ? AND id != ?");
        $stmt->execute([$slug, $id]);
        if ($stmt->fetch()) $slug .= '-' . time();

        $stmt = $db->prepare("UPDATE cities SET country_id=?, name=?, slug=?, updated_at=NOW() WHERE id=?");
        
        if ($stmt->execute([$country_id, $name, $slug, $id])) {
            Response::redirect('/admin/cities');
        } else {
            Response::json(['error' => 'Failed to update'], 500);
        }
    }

    public static function delete($id) {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');
        $db = Db::getInstance()->pdo();
        
        $stmt = $db->prepare("DELETE FROM cities WHERE id = ?");
        if ($stmt->execute([$id])) {
            Response::json(['success' => true]);
        } else {
            Response::json(['error' => 'Failed'], 500);
        }
    }

    private static function generateSlug($text) {
        $text = self::removeVietnameseTones($text);
        $text = strtolower($text);
        $text = preg_replace('/[^a-z0-9\s-]/', '', $text);
        $text = preg_replace('/[\s-]+/', '-', $text);
        return trim($text, '-');
    }

    private static function removeVietnameseTones($str) {
        $vietnameseTones = [
            'à' => 'a', 'á' => 'a', 'ạ' => 'a', 'ả' => 'a', 'ã' => 'a',
            'â' => 'a', 'ầ' => 'a', 'ấ' => 'a', 'ậ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a',
            'ă' => 'a', 'ằ' => 'a', 'ắ' => 'a', 'ặ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a',
            'è' => 'e', 'é' => 'e', 'ẹ' => 'e', 'ẻ' => 'e', 'ẽ' => 'e',
            'ê' => 'e', 'ề' => 'e', 'ế' => 'e', 'ệ' => 'e', 'ể' => 'e', 'ễ' => 'e',
            'ì' => 'i', 'í' => 'i', 'ị' => 'i', 'ỉ' => 'i', 'ĩ' => 'i',
            'ò' => 'o', 'ó' => 'o', 'ọ' => 'o', 'ỏ' => 'o', 'õ' => 'o',
            'ô' => 'o', 'ồ' => 'o', 'ố' => 'o', 'ộ' => 'o', 'ổ' => 'o', 'ỗ' => 'o',
            'ơ' => 'o', 'ờ' => 'o', 'ớ' => 'o', 'ợ' => 'o', 'ở' => 'o', 'ỡ' => 'o',
            'ù' => 'u', 'ú' => 'u', 'ụ' => 'u', 'ủ' => 'u', 'ũ' => 'u',
            'ư' => 'u', 'ừ' => 'u', 'ứ' => 'u', 'ự' => 'u', 'ử' => 'u', 'ữ' => 'u',
            'ỳ' => 'y', 'ý' => 'y', 'ỵ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y',
            'đ' => 'd',
            'À' => 'A', 'Á' => 'A', 'Ạ' => 'A', 'Ả' => 'A', 'Ã' => 'A',
            'Â' => 'A', 'Ầ' => 'A', 'Ấ' => 'A', 'Ậ' => 'A', 'Ẩ' => 'A', 'Ẫ' => 'A',
            'Ă' => 'A', 'Ằ' => 'A', 'Ắ' => 'A', 'Ặ' => 'A', 'Ẳ' => 'A', 'Ẵ' => 'A',
            'È' => 'E', 'É' => 'E', 'Ẹ' => 'E', 'Ẻ' => 'E', 'Ẽ' => 'E',
            'Ê' => 'E', 'Ề' => 'E', 'Ế' => 'E', 'Ệ' => 'E', 'Ể' => 'E', 'Ễ' => 'E',
            'Ì' => 'I', 'Í' => 'I', 'Ị' => 'I', 'Ỉ' => 'I', 'Ĩ' => 'I',
            'Ò' => 'O', 'Ó' => 'O', 'Ọ' => 'O', 'Ỏ' => 'O', 'Õ' => 'O',
            'Ô' => 'O', 'Ồ' => 'O', 'Ố' => 'O', 'Ộ' => 'O', 'Ổ' => 'O', 'Ỗ' => 'O',
            'Ơ' => 'O', 'Ờ' => 'O', 'Ớ' => 'O', 'Ợ' => 'O', 'Ở' => 'O', 'Ỡ' => 'O',
            'Ù' => 'U', 'Ú' => 'U', 'Ụ' => 'U', 'Ủ' => 'U', 'Ũ' => 'U',
            'Ư' => 'U', 'Ừ' => 'U', 'Ứ' => 'U', 'Ự' => 'U', 'Ử' => 'U', 'Ữ' => 'U',
            'Ỳ' => 'Y', 'Ý' => 'Y', 'Ỵ' => 'Y', 'Ỷ' => 'Y', 'Ỹ' => 'Y',
            'Đ' => 'D'
        ];
        return strtr($str, $vietnameseTones);
    }
}
