<?php
// app/controllers/AdminUserController.php

class AdminUserController {
    
    // List all users
    public static function index() {
        Auth::requireAdmin();
        
        $db = Db::getInstance()->pdo();
        
        // Pagination & Search Logic
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $limit = 10;
        $offset = ($page - 1) * $limit;
        
        // Build query conditions
        $whereClause = "WHERE is_deleted = 0";
        $params = [];
        
        if (!empty($keyword)) {
            $whereClause .= " AND (full_name LIKE ? OR email LIKE ? OR phone LIKE ?)";
            $searchTerm = "%$keyword%";
            $params[] = $searchTerm;
            $params[] = $searchTerm;
            $params[] = $searchTerm;
        }
        
        // Count total records
        $countStmt = $db->prepare("SELECT COUNT(*) FROM users $whereClause");
        $countStmt->execute($params);
        $totalRecords = $countStmt->fetchColumn();
        $totalPages = ceil($totalRecords / $limit);
        
        // Get records
        $sql = "SELECT * FROM users $whereClause ORDER BY id ASC LIMIT $limit OFFSET $offset";
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        view('admin', 'admin/users/index', [
            'users' => $users,
            'total_pages' => $totalPages,
            'current_page' => $page,
            'keyword' => $keyword
        ]);
    }
    
    // Show create form
    public static function create() {
        Auth::requireAdmin();
        
        view('admin', 'admin/users/create', [
            'csrf' => Csrf::token()
        ]);
    }
    
    // Store new user
    public static function store() {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');
        
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $full_name = trim($_POST['full_name'] ?? '');
        $role = $_POST['role'] ?? 'staff';
        $phone = trim($_POST['phone'] ?? '');
        $gender = $_POST['gender'] ?? 'other';
        $birth_date = $_POST['birth_date'] ?? null;
        if (empty($birth_date)) $birth_date = null;
        
        $errors = [];
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email không hợp lệ.";
        }
        if (empty($password) || strlen($password) < 6) {
            $errors[] = "Mật khẩu phải có ít nhất 6 ký tự.";
        }
        if (empty($full_name)) {
            $errors[] = "Họ tên không được để trống.";
        }
        
        if (!empty($errors)) {
             // Trong thực tế nên flash session error, ở đây trả về json hoặc redirect kèm lỗi đơn giản
             // Để đơn giản ta redirect lại với tham số lỗi (hoặc xử lý ajax)
             // Ở đây tôi sẽ dùng cách đơn giản là hiển thị lại form (nếu view hỗ trợ) hoặc báo lỗi
             // Để nhất quán với AdminPostController, tôi sẽ trả về view kèm lỗi
             view('admin', 'admin/users/create', [
                'csrf' => Csrf::token(),
                'error' => implode('<br>', $errors),
                'old' => $_POST
            ]);
            return;
        }

        $db = Db::getInstance()->pdo();
        
        // Check email exists
        $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
             view('admin', 'admin/users/create', [
                'csrf' => Csrf::token(),
                'error' => "Email này đã tồn tại trong hệ thống.",
                'old' => $_POST
            ]);
            return;
        }
        
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        
        $stmt = $db->prepare("
            INSERT INTO users (email, password_hash, full_name, role, phone, gender, birth_date, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW())
        ");
        
        if ($stmt->execute([$email, $password_hash, $full_name, $role, $phone, $gender, $birth_date])) {
            Response::redirect('/admin/users');
        } else {
             view('admin', 'admin/users/create', [
                'csrf' => Csrf::token(),
                'error' => "Lỗi hệ thống, không thể tạo người dùng.",
                'old' => $_POST
            ]);
        }
    }
    
    // Show edit form
    public static function edit($id) {
        Auth::requireAdmin();
        
        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$user) {
            Response::notFound();
        }
        
        view('admin', 'admin/users/edit', [
            'user' => $user,
            'csrf' => Csrf::token()
        ]);
    }
    
    // Update user
    public static function update($id) {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');
        
        $full_name = trim($_POST['full_name'] ?? '');
        $role = $_POST['role'] ?? 'staff';
        $phone = trim($_POST['phone'] ?? '');
        $gender = $_POST['gender'] ?? 'other';
        $birth_date = $_POST['birth_date'] ?? null;
        if (empty($birth_date)) $birth_date = null;

        $password = $_POST['password'] ?? ''; // Optional update
        
        if (empty($full_name)) {
            Response::json(['error' => 'Full name required'], 400);
        }
        
        $db = Db::getInstance()->pdo();
        
        // Build query dynamically based on password update
        if (!empty($password)) {
            if (strlen($password) < 6) {
                 // Xử lý lỗi validation đơn giản cho update
                 Response::redirect("/admin/users/$id/edit?error=password_too_short");
                 return;
            }
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $db->prepare("UPDATE users SET full_name=?, role=?, phone=?, gender=?, birth_date=?, password_hash=? WHERE id=?");
            $params = [$full_name, $role, $phone, $gender, $birth_date, $password_hash, $id];
        } else {
            $stmt = $db->prepare("UPDATE users SET full_name=?, role=?, phone=?, gender=?, birth_date=? WHERE id=?");
            $params = [$full_name, $role, $phone, $gender, $birth_date, $id];
        }
        
        if ($stmt->execute($params)) {
            Response::redirect('/admin/users');
        } else {
            Response::json(['error' => 'Failed to update user'], 500);
        }
    }
    
    // Delete user
    public static function delete($id) {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');

        // Prevent deleting self
        // (Assuming Auth::user() returns current user info, but let's check session safely)
        // For now, simpler check: can't delete if it's the only admin? 
        // Or just don't delete yourself.
        
        $db = Db::getInstance()->pdo();
        
        // Soft delete
        $stmt = $db->prepare("UPDATE users SET is_deleted = 1 WHERE id = ?");
        
        if ($stmt->execute([$id])) {
            ob_clean();
            Response::json(['success' => true]);
            exit;
        } else {
            ob_clean();
            Response::json(['error' => 'Failed to delete user'], 500);
            exit;
        }
    }
}
