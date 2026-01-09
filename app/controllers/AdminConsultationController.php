<?php
class AdminConsultationController {
    public static function index() {
        Auth::requireAdmin(); // Ensure only logged-in users can access

        $db = Db::getInstance()->pdo();
        
        // Pagination & Search Logic
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $limit = 10;
        $offset = ($page - 1) * $limit;
        
        // Build query conditions
        $whereClause = "";
        $params = [];
        
        if (!empty($keyword)) {
            $whereClause = "WHERE full_name LIKE ? OR email LIKE ? OR phone LIKE ?";
            $searchTerm = "%$keyword%";
            $params[] = $searchTerm;
            $params[] = $searchTerm;
            $params[] = $searchTerm;
        }
        
        // Count total
        $countStmt = $db->prepare("SELECT COUNT(*) FROM consultations $whereClause");
        $countStmt->execute($params);
        $totalRecords = $countStmt->fetchColumn();
        $totalPages = ceil($totalRecords / $limit);
        
        // Fetch consultations
        $sql = "SELECT * FROM consultations $whereClause ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $consultations = $stmt->fetchAll();

        // Pass data to view
        view("admin", "admin/consultations/index", [
            "consultations" => $consultations,
            "total_pages" => $totalPages,
            "current_page" => $page,
            "keyword" => $keyword
        ]);
    }

    public static function edit($id) {
        Auth::requireAdmin();
        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("SELECT * FROM consultations WHERE id = ?");
        $stmt->execute([$id]);
        $consultation = $stmt->fetch();

        if (!$consultation) {
            Response::notFound();
        }

        view("admin", "admin/consultations/edit", [
            "consultation" => $consultation,
            "csrf" => Csrf::token()
        ]);
    }

    public static function update($id) {
        Auth::requireAdmin();
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
            Response::redirect('/admin/consultations');
        } else {
            // Handle error (redirect back or show error)
            Response::redirect("/admin/consultations/$id/edit?error=update_failed");
        }
    }

    public static function delete($id) {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');
        $db = Db::getInstance()->pdo();
        
        $stmt = $db->prepare("DELETE FROM consultations WHERE id = ?");
        
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