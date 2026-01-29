<?php
class ConsultationController
{
    public function register()
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid method']);
            return;
        }

        $fullName = $_POST['full_name'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $email = $_POST['email'] ?? null;
        $gender = $_POST['gender'] ?? null;
        $country_id = !empty($_POST['country_id']) ? (int) $_POST['country_id'] : null;
        $message = $_POST['message'] ?? '';

        if (empty($fullName) || empty($phone)) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng điền đầy đủ thông tin Họ tên và Số điện thoại']);
            return;
        }

        try {
            $pdo = Db::getInstance()->pdo();
            $stmt = $pdo->prepare("INSERT INTO consultations (full_name, phone, email, gender, country_id, message, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
            $stmt->execute([$fullName, $phone, $email, $gender, $country_id, $message]);

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
