<?php

class AdminCountryController {

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

    public static function create() {
        Auth::requireAdmin();
        $db = Db::getInstance()->pdo();
        $continents = $db->query("SELECT id, name FROM continents ORDER BY name")->fetchAll();
        
        view('admin', 'admin/countries/create', [
            'continents' => $continents,
            'csrf' => Csrf::token()
        ]);
    }

    public static function store() {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');

        $name = trim($_POST['name'] ?? '');
        $code = strtoupper(trim($_POST['code'] ?? ''));
        $slug = trim($_POST['slug'] ?? '');
        if (empty($slug)) $slug = self::generateSlug($name);
        
        $continent_id = (int)$_POST['continent_id'];
        $description = $_POST['description'] ?? '';
        $display_order = (int)($_POST['display_order'] ?? 0);
        $is_popular = isset($_POST['is_popular']) ? 1 : 0;

        if (empty($name)) Response::json(['error' => 'Tên quốc gia bắt buộc'], 400);

        // Uploads
        $flag_url = null;
        $image_url = null;
        try {
            if (isset($_FILES['flag']) && $_FILES['flag']['size'] > 0) 
                $flag_url = self::saveUploadedImage($_FILES['flag'], 'flag_');
            
            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) 
                $image_url = self::saveUploadedImage($_FILES['image'], 'country_');
        } catch (Exception $e) {
            Response::json(['error' => $e->getMessage()], 400);
        }

        $db = Db::getInstance()->pdo();
        
        // Check slug
        $stmt = $db->prepare("SELECT id FROM countries WHERE slug = ?");
        $stmt->execute([$slug]);
        if ($stmt->fetch()) $slug .= '-' . time();

        $sql = "INSERT INTO countries (continent_id, name, slug, code, description, flag_url, image_url, display_order, is_popular, created_at) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $db->prepare($sql);
        
        if ($stmt->execute([$continent_id, $name, $slug, $code, $description, $flag_url, $image_url, $display_order, $is_popular])) {
            Response::redirect('/admin/countries');
        } else {
            Response::json(['error' => 'Failed'], 500);
        }
    }

    public static function edit($id) {
        Auth::requireAdmin();
        $db = Db::getInstance()->pdo();
        
        $country = $db->prepare("SELECT * FROM countries WHERE id = ?");
        $country->execute([$id]);
        $country = $country->fetch(PDO::FETCH_ASSOC);
        
        if (!$country) Response::notFound();

        $continents = $db->query("SELECT id, name FROM continents ORDER BY name")->fetchAll();

        view('admin', 'admin/countries/edit', [
            'country' => $country,
            'continents' => $continents,
            'csrf' => Csrf::token()
        ]);
    }

    public static function update($id) {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');

        $name = trim($_POST['name'] ?? '');
        $code = strtoupper(trim($_POST['code'] ?? ''));
        $slug = trim($_POST['slug'] ?? '');
        if (empty($slug)) $slug = self::generateSlug($name);
        
        $continent_id = (int)$_POST['continent_id'];
        $description = $_POST['description'] ?? '';
        $display_order = (int)($_POST['display_order'] ?? 0);
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
                $flag_url = self::saveUploadedImage($_FILES['flag'], 'flag_');
            
            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) 
                $image_url = self::saveUploadedImage($_FILES['image'], 'country_');
        } catch (Exception $e) {
            Response::json(['error' => $e->getMessage()], 400);
        }

        // Check slug
        $stmt = $db->prepare("SELECT id FROM countries WHERE slug = ? AND id != ?");
        $stmt->execute([$slug, $id]);
        if ($stmt->fetch()) $slug .= '-' . time();

        $sql = "UPDATE countries SET continent_id=?, name=?, slug=?, code=?, description=?, flag_url=?, image_url=?, display_order=?, is_popular=?, updated_at=NOW() WHERE id=?";
        $stmt = $db->prepare($sql);
        
        if ($stmt->execute([$continent_id, $name, $slug, $code, $description, $flag_url, $image_url, $display_order, $is_popular, $id])) {
            Response::redirect('/admin/countries');
        } else {
            Response::json(['error' => 'Failed'], 500);
        }
    }

    public static function delete($id) {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');
        $db = Db::getInstance()->pdo();
        
        $stmt = $db->prepare("DELETE FROM countries WHERE id = ?");
        if ($stmt->execute([$id])) {
            Response::json(['success' => true]);
        } else {
            Response::json(['error' => 'Failed'], 500);
        }
    }

    // --- Helpers ---
    private static function generateSlug($text) {
        $text = strtolower(trim($text));
        $text = preg_replace('/[^a-z0-9-]/', '-', $text);
        return preg_replace('/-+/', '-', $text);
    }

    private static function saveUploadedImage($file, $prefix) {
        $uploadDir = __DIR__ . '/../../public/assets/uploads/locations';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $filename = $prefix . time() . '_' . rand(1000,9999) . '.' . $ext;
        
        if (move_uploaded_file($file['tmp_name'], $uploadDir . '/' . $filename)) {
            return '/assets/uploads/locations/' . $filename;
        }
        throw new Exception("Upload failed");
    }
}
