<?php
class Auth {
  public static function user(): ?array {
    return $_SESSION["user"] ?? null;
  }

  public static function checkAdmin(): bool {
    return isset($_SESSION["user"]) && ($_SESSION["user"]["role"] ?? "") === "admin";
  }

  public static function requireAdmin(): void {
    if (!self::checkAdmin()) {
      $login = $GLOBALS['base'] !== '' ? $GLOBALS['base'] . '/admin/login' : '/admin/login';
      header("Location: " . $login);
      exit;
    }
  }

  public static function login(array $user): void {
    $_SESSION["user"] = [
      "id" => $user["id"],
      "email" => $user["email"],
      "role" => $user["role"],
    ];
  }

  public static function logout(): void {
    unset($_SESSION["user"]);
  }
}
