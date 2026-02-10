<?php

class AdminSchoolController
{

    public static function index()
    {
        Auth::requireAdmin();
        $db = Db::getInstance()->pdo();

        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $country_id = isset($_GET['country_id']) ? (int) $_GET['country_id'] : 0;
        $city_id = isset($_GET['city_id']) ? (int) $_GET['city_id'] : 0;
        $level_id = isset($_GET['level_id']) ? (int) $_GET['level_id'] : 0;
        $is_scholarship = isset($_GET['is_scholarship']) ? $_GET['is_scholarship'] : '';

        $limit = 10;
        $offset = ($page - 1) * $limit;

        $whereClause = "WHERE s.is_delete = 0";
        $params = [];
        if (!empty($keyword)) {
            $whereClause .= " AND (s.name LIKE ? OR s.slug LIKE ?)";
            $params[] = "%$keyword%";
            $params[] = "%$keyword%";
        }
        if ($country_id > 0) {
            $whereClause .= " AND s.country_id = ?";
            $params[] = $country_id;
        }
        if ($city_id > 0) {
            $whereClause .= " AND s.city_id = ?";
            $params[] = $city_id;
        }
        if ($level_id > 0) {
            $whereClause .= " AND s.education_level_id = ?";
            $params[] = $level_id;
        }
        if ($is_scholarship !== '') {
            $whereClause .= " AND s.is_scholarship = ?";
            $params[] = (int) $is_scholarship;
        }

        // Count
        $countStmt = $db->prepare("SELECT COUNT(*) FROM schools s $whereClause");
        $countStmt->execute($params);
        $totalRecords = $countStmt->fetchColumn();
        $totalPages = ceil($totalRecords / $limit);

        // Fetch
        $sql = "
            SELECT s.*, 
                   c.name as country_name, 
                   ci.name as city_name, 
                   el.name as level_name
            FROM schools s 
            LEFT JOIN countries c ON s.country_id = c.id 
            LEFT JOIN cities ci ON s.city_id = ci.id 
            LEFT JOIN education_levels el ON s.education_level_id = el.id 
            $whereClause 
            ORDER BY s.created_at DESC 
            LIMIT $limit OFFSET $offset
        ";
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $schools = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Dropdowns for filter
        $countries = $db->query("SELECT id, name FROM countries ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);
        $cities = $db->query("SELECT id, name, country_id FROM cities ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);
        $levels = $db->query("SELECT id, name FROM education_levels ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);

        view('admin', 'admin/schools/index', [
            'schools' => $schools,
            'total_pages' => $totalPages,
            'current_page' => $page,
            'keyword' => $keyword,
            'country_id' => $country_id,
            'city_id' => $city_id,
            'level_id' => $level_id,
            'is_scholarship' => $is_scholarship,
            'countries' => $countries,
            'cities' => $cities,
            'levels' => $levels
        ]);
    }

    public static function create()
    {
        Auth::requireAdmin();
        $db = Db::getInstance()->pdo();

        $countries = $db->query("SELECT id, name FROM countries ORDER BY name")->fetchAll();
        $cities = $db->query("SELECT id, name, country_id FROM cities ORDER BY name")->fetchAll();
        $levels = $db->query("SELECT id, name FROM education_levels ORDER BY name")->fetchAll();

        view('admin', 'admin/schools/create', [
            'countries' => $countries,
            'cities' => $cities,
            'levels' => $levels,
            'csrf' => Csrf::token()
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

        $country_id = !empty($_POST['country_id']) ? (int) $_POST['country_id'] : null;
        $city_id = !empty($_POST['city_id']) ? (int) $_POST['city_id'] : null;
        $education_level_id = !empty($_POST['education_level_id']) ? (int) $_POST['education_level_id'] : null;
        $tuition_fee = $_POST['tuition_fee'] ?? '';
        $is_scholarship = isset($_POST['is_scholarship']) ? 1 : 0;
        $description = $_POST['description'] ?? '';

        if (empty($name))
            Response::json(['error' => 'Name is required'], 400);

        // Upload Image
        $image_url = null;
        try {
            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
                $image_url = self::saveUploadedImage($_FILES['image'], 'school_');
            }
        } catch (Exception $e) {
            Response::json(['error' => $e->getMessage()], 400);
        }

        $db = Db::getInstance()->pdo();

        // Check slug
        $stmt = $db->prepare("SELECT id FROM schools WHERE slug = ?");
        $stmt->execute([$slug]);
        if ($stmt->fetch())
            $slug .= '-' . time();

        $sql = "INSERT INTO schools (name, slug, country_id, city_id, education_level_id, tuition_fee, is_scholarship, image_url, description, created_at) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $db->prepare($sql);

        if ($stmt->execute([$name, $slug, $country_id, $city_id, $education_level_id, $tuition_fee, $is_scholarship, $image_url, $description])) {
            Response::redirect('/admin/schools');
        } else {
            Response::json(['error' => 'Failed to create'], 500);
        }
    }

    public static function edit($id)
    {
        Auth::requireAdmin();
        $db = Db::getInstance()->pdo();

        $school = $db->prepare("SELECT * FROM schools WHERE id = ? AND is_delete = 0");
        $school->execute([$id]);
        $school = $school->fetch(PDO::FETCH_ASSOC);

        if (!$school)
            Response::notFound();

        $countries = $db->query("SELECT id, name FROM countries ORDER BY name")->fetchAll();
        $cities = $db->query("SELECT id, name, country_id FROM cities ORDER BY name")->fetchAll();
        $levels = $db->query("SELECT id, name FROM education_levels ORDER BY name")->fetchAll();

        view('admin', 'admin/schools/edit', [
            'school' => $school,
            'countries' => $countries,
            'cities' => $cities,
            'levels' => $levels,
            'csrf' => Csrf::token()
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

        $country_id = !empty($_POST['country_id']) ? (int) $_POST['country_id'] : null;
        $city_id = !empty($_POST['city_id']) ? (int) $_POST['city_id'] : null;
        $education_level_id = !empty($_POST['education_level_id']) ? (int) $_POST['education_level_id'] : null;
        $tuition_fee = $_POST['tuition_fee'] ?? '';
        $is_scholarship = isset($_POST['is_scholarship']) ? 1 : 0;
        $description = $_POST['description'] ?? '';

        $db = Db::getInstance()->pdo();

        // Get old image
        $stmt = $db->prepare("SELECT image_url FROM schools WHERE id = ?");
        $stmt->execute([$id]);
        $old = $stmt->fetch();
        $image_url = $old['image_url'];

        try {
            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
                $image_url = self::saveUploadedImage($_FILES['image'], 'school_');
            }
        } catch (Exception $e) {
            Response::json(['error' => $e->getMessage()], 400);
        }

        // Check slug
        $stmt = $db->prepare("SELECT id FROM schools WHERE slug = ? AND id != ?");
        $stmt->execute([$slug, $id]);
        if ($stmt->fetch())
            $slug .= '-' . time();

        $sql = "UPDATE schools SET name=?, slug=?, country_id=?, city_id=?, education_level_id=?, tuition_fee=?, is_scholarship=?, image_url=?, description=?, updated_at=NOW() WHERE id=?";
        $stmt = $db->prepare($sql);

        if ($stmt->execute([$name, $slug, $country_id, $city_id, $education_level_id, $tuition_fee, $is_scholarship, $image_url, $description, $id])) {
            Response::redirect('/admin/schools');
        } else {
            Response::json(['error' => 'Failed to update'], 500);
        }
    }

    public static function delete($id)
    {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');
        $db = Db::getInstance()->pdo();

        $stmt = $db->prepare("UPDATE schools SET is_delete = 1 WHERE id = ?");
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

    private static function saveUploadedImage($file, $prefix)
    {
        if (!isset($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
            throw new Exception("File upload không hợp lệ");
        }

        $uploadDir = rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/assets/uploads/schools';

        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0755, true) && !is_dir($uploadDir)) {
                throw new Exception("Không tạo được thư mục upload: " . $uploadDir);
            }
        }

        $ext = strtolower(pathinfo($file['name'] ?? '', PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
        if (!in_array($ext, $allowed, true)) {
            throw new Exception("Định dạng ảnh không hỗ trợ: " . $ext);
        }

        $filename = $prefix . time() . '_' . random_int(1000, 9999) . '.' . $ext;
        $dest = $uploadDir . '/' . $filename;

        if (!move_uploaded_file($file['tmp_name'], $dest)) {
            throw new Exception("Upload failed (move_uploaded_file). Kiểm tra quyền ghi folder assets/uploads/schools.");
        }

        return '/assets/uploads/schools/' . $filename;
    }
}
