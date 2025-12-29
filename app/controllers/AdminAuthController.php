<?php
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

    Auth::login($user);
    header("Location: /admin/posts");
    exit;
  }

  public function logout() {
    if (!Csrf::verify($_POST["_csrf"] ?? "")) {
      header("Location: /admin/posts");
      exit;
    }
    Auth::logout();
    header("Location: /admin/login");
    exit;
  }
}
