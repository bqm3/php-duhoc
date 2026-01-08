<?php
class ConsultationController {
    public function register() {
        header('Content-Type: application/json');
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid method']);
            return;
        }

        $fullName = $_POST['full_name'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $email = $_POST['email'] ?? '';
        $message = $_POST['message'] ?? '';

        if (empty($fullName) || empty($phone) || empty($email)) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng điền đầy đủ thông tin']);
            return;
        }

        try {
            $pdo = Db::getInstance()->pdo();
            $stmt = $pdo->prepare("INSERT INTO consultations (full_name, phone, email, message) VALUES (?, ?, ?, ?)");
            $stmt->execute([$fullName, $phone, $email, $message]);
            
            ob_clean(); // Clear buffer
            echo json_encode(['success' => true, 'message' => 'Đăng ký tư vấn thành công!']);
            exit;
        } catch (Exception $e) {
            http_response_code(500);
            ob_clean(); // Clear buffer
            echo json_encode(['success' => false, 'message' => 'Lỗi hệ thống: ' . $e->getMessage()]);
            exit;
        }
    }
}
