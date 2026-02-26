<?php
class AdminConsultationController
{
    public static function index()
    {
        Auth::requirePermission('consultations'); // Ensure only logged-in users can access

        $db = Db::getInstance()->pdo();

        // Capture filters
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $status = isset($_GET['status']) ? trim($_GET['status']) : '';
        $country_id = isset($_GET['country_id']) ? (int) $_GET['country_id'] : 0;
        $date_from = isset($_GET['date_from']) ? trim($_GET['date_from']) : '';
        $date_to = isset($_GET['date_to']) ? trim($_GET['date_to']) : '';

        $limit = 10;
        $offset = ($page - 1) * $limit;

        // Build query conditions
        $whereClause = "WHERE c.is_delete = 0";
        $params = [];

        if (!empty($keyword)) {
            $whereClause .= " AND (c.full_name LIKE ? OR c.email LIKE ? OR c.phone LIKE ?)";
            $searchTerm = "%$keyword%";
            $params[] = $searchTerm;
            $params[] = $searchTerm;
            $params[] = $searchTerm;
        }

        if (!empty($status)) {
            $whereClause .= " AND c.status = ?";
            $params[] = $status;
        }

        if ($country_id > 0) {
            $whereClause .= " AND c.country_id = ?";
            $params[] = $country_id;
        }

        if (!empty($date_from)) {
            $whereClause .= " AND c.created_at >= ?";
            $params[] = $date_from . ' 00:00:00';
        }

        if (!empty($date_to)) {
            $whereClause .= " AND c.created_at <= ?";
            $params[] = $date_to . ' 23:59:59';
        }

        // Fetch countries for filter
        $countries = $db->query("SELECT id, name FROM countries ORDER BY name ASC")->fetchAll();

        // Count total
        $countStmt = $db->prepare("SELECT COUNT(*) FROM consultations c $whereClause");
        $countStmt->execute($params);
        $totalRecords = $countStmt->fetchColumn();
        $totalPages = ceil($totalRecords / $limit);

        // Fetch consultations
        $sql = "SELECT c.*, ctry.name as country_name 
                FROM consultations c 
                LEFT JOIN countries ctry ON c.country_id = ctry.id 
                $whereClause 
                ORDER BY c.created_at DESC 
                LIMIT $limit OFFSET $offset";
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $consultations = $stmt->fetchAll();

        // Pass data to view
        view("admin", "admin/consultations/index", [
            "consultations" => $consultations,
            "total_pages" => $totalPages,
            "current_page" => $page,
            "keyword" => $keyword,
            "status" => $status,
            "country_id" => $country_id,
            "date_from" => $date_from,
            "date_to" => $date_to,
            "countries" => $countries
        ]);
    }

    public static function edit($id)
    {
        Auth::requirePermission('consultations');
        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("SELECT * FROM consultations WHERE id = ? AND is_delete = 0");
        $stmt->execute([$id]);
        $consultation = $stmt->fetch();

        if (!$consultation) {
            Response::notFound();
        }

        $referer = $_SERVER['HTTP_REFERER'] ?? '/admin/consultations';
        $redirect_to = $_GET['redirect_to'] ?? $referer;

        view("admin", "admin/consultations/edit", [
            "consultation" => $consultation,
            "csrf" => Csrf::token(),
            "redirect_to" => $redirect_to
        ]);
    }

    public static function update($id)
    {
        Auth::requirePermission('consultations');
        Csrf::verify($_POST['_csrf'] ?? '');

        $status = $_POST['status'] ?? 'new';
        $description = $_POST['description'] ?? '';

        $validStatuses = ['new', 'processing', 'completed', 'cancelled'];
        if (!in_array($status, $validStatuses)) {
            $status = 'new';
        }

        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("UPDATE consultations SET status = ?, description = ? WHERE id = ?");

        if ($stmt->execute([$status, $description, $id])) {
            $_SESSION['flash_success'] = 'Cập nhật yêu cầu tư vấn thành công!';
            Response::redirect($_POST['redirect_to'] ?? '/admin/consultations');
        } else {
            // Handle error (redirect back or show error)
            Response::redirect("/admin/consultations/$id/edit?error=update_failed");
        }
    }

    public static function delete($id)
    {
        Auth::requirePermission('consultations');
        Csrf::verify($_POST['_csrf'] ?? '');
        $db = Db::getInstance()->pdo();

        $stmt = $db->prepare("UPDATE consultations SET is_delete = 1 WHERE id = ?");

        if ($stmt->execute([$id])) {
            ob_clean();
            Response::json(['success' => true]);
            exit;
        } else {
            ob_clean();
            Response::json(['error' => 'Failed to delete'], 500);
            exit;
        }
    }
}