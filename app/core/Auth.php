<?php
class Auth
{
  public static function user(): ?array
  {
    return $_SESSION["user"] ?? null;
  }

  public static function checkAdmin(): bool
  {
    if (!isset($_SESSION["user"]))
      return false;
    $role = $_SESSION["user"]["role"] ?? "";
    return $role === "admin" || $role === "staff";
  }

  public static function requireAdmin(): void
  {
    if (!self::checkAdmin()) {
      $login = $GLOBALS['base'] !== '' ? $GLOBALS['base'] . '/admin/login' : '/admin/login';
      header("Location: " . $login);
      exit;
    }
  }

  public static function hasPermission(string $permission): bool
  {
    $user = self::user();
    if (!$user)
      return false;

    // Admin has all permissions
    if (($user['role'] ?? '') === 'admin')
      return true;

    $permissions = $user['permissions'] ?? [];
    return in_array($permission, $permissions);
  }

  public static function requirePermission(string $permission): void
  {
    self::requireAdmin(); // First ensure they are logged in as admin/staff
    if (!self::hasPermission($permission)) {
      $_SESSION['flash_error'] = "Bạn không có quyền truy cập chức năng này.";
      $dashboard = $GLOBALS['base'] !== '' ? $GLOBALS['base'] . '/admin/posts' : '/admin/posts';
      header("Location: " . $dashboard);
      exit;
    }
  }

  public static function login(array $user): void
  {
    $permissions = [];
    if (!empty($user['permissions'])) {
      if (is_array($user['permissions'])) {
        $permissions = $user['permissions'];
      } else {
        $permissions = json_decode($user['permissions'], true) ?: [];
      }
    }

    $_SESSION["user"] = [
      "id" => $user["id"],
      "email" => $user["email"],
      "full_name" => $user["full_name"] ?? "User",
      "role" => $user["role"],
      "permissions" => $permissions
    ];
  }

  public static function logout(): void
  {
    unset($_SESSION["user"]);
  }
}
