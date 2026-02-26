<?php
require_once __DIR__ . '/../utils/createLog.php';
class AdminAuthController
{
  public function showLogin()
  {
    view("auth", "admin/login", ["csrf" => Csrf::token()]);
  }

  public function login()
  {
    if (!Csrf::verify($_POST["_csrf"] ?? "")) {
      view("auth", "admin/login", ["error" => "CSRF invalid", "csrf" => Csrf::token()]);
    }

    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    $pdo = Db::getInstance()->pdo();

    // Lazy migration: Ensure permissions column exists
    try {
      $stmt = $pdo->prepare("SHOW COLUMNS FROM users LIKE 'permissions'");
      $stmt->execute();
      if (!$stmt->fetch()) {
        $pdo->exec("ALTER TABLE users ADD COLUMN permissions TEXT NULL");
      }
    } catch (Exception $e) {
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($password, $user["password_hash"])) {
      view("auth", "admin/login", ["error" => "Sai email hoặc mật khẩu", "csrf" => Csrf::token()]);
    }

    // require direct role or staff to access admin area
    if ($user["role"] !== "admin" && $user["role"] !== "staff") {
      view("auth", "admin/login", ["error" => "Tài khoản này không có quyền truy cập trang quản trị", "csrf" => Csrf::token()]);
    }

    Auth::login($user);
    $dashboard = $GLOBALS['base'] !== '' ? $GLOBALS['base'] . '/admin/users' : '/admin/users';
    header("Location: " . $dashboard);
    exit;
  }

  public function logout()
  {
    if (!Csrf::verify($_POST["_csrf"] ?? "")) {
      $posts = $GLOBALS['base'] !== '' ? $GLOBALS['base'] . '/admin/posts' : '/admin/posts';
      header("Location: " . $posts);
      exit;
    }
    Auth::logout();
    $login = $GLOBALS['base'] !== '' ? $GLOBALS['base'] . '/admin/login' : '/admin/login';
    header("Location: " . $login);
    exit;
  }
}
