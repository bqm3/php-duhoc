<?php
require_once __DIR__ . '/../utils/createLog.php';
class AdminAuthController {
  public function showLogin() {
    view("admin", "admin/login", ["csrf" => Csrf::token()]);
  }

  public function login() {
    if (!Csrf::verify($_POST["_csrf"] ?? "")) {
      view("admin", "admin/login", ["error" => "CSRF invalid", "csrf" => Csrf::token()]);
    }

    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    $pdo = Db::pdo();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($password, $user["password_hash"])) {
      view("admin", "admin/login", ["error" => "Sai email hoặc mật khẩu", "csrf" => Csrf::token()]);
    }

    // require admin role to access admin area
    if (($user["role"] ?? "") !== "admin") {
      view("admin", "admin/login", ["error" => "Tài khoản này không có quyền truy cập trang quản trị", "csrf" => Csrf::token()]);
    }

    Auth::login($user);
    $dashboard = $GLOBALS['base'] !== '' ? $GLOBALS['base'] . '/admin' : '/admin';
    header("Location: " . $dashboard);
    exit;
  }

  public function logout() {
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
