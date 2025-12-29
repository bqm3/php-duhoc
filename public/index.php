<?php
declare(strict_types=1);

$cfg = require __DIR__ . "/../app/config/config.php";
session_name($cfg["app"]["session_name" ?? "PHP_DU_HOC"]);
session_start();

require __DIR__ . "/../app/core/Db.php";
require __DIR__ . "/../app/core/Auth.php";
require __DIR__ . "/../app/core/Csrf.php";
require __DIR__ . "/../app/core/Response.php";

require __DIR__ . "/../app/controllers/HomeController.php";
require __DIR__ . "/../app/controllers/AdminAuthController.php";
require __DIR__ . "/../app/controllers/AdminPostController.php";

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$method = $_SERVER["REQUEST_METHOD"];

// auto-detect base path, ví dụ: /php-duhoc/public
$base = rtrim(str_replace('\\', '/', dirname($_SERVER["SCRIPT_NAME"])), '/');
if ($base !== '' && $base !== '/') {
  if (strpos($uri, $base) === 0) {
    $uri = substr($uri, strlen($base));
  }
}
$uri = $uri === '' ? '/' : $uri;

function view(string $layout, string $view, array $data = []) {
  extract($data);
  $viewFile = __DIR__ . "/../app/views/$view.php";
  $layoutFile = __DIR__ . "/../app/views/layouts/$layout.php";
  include $layoutFile;
  exit;
}

function notFound() {
  http_response_code(404);
  echo "404 Not Found";
  exit;
}

/** ROUTES **/
if ($uri === "/" && $method === "GET") {
  (new HomeController())->index();
}

if ($uri === "/admin/login" && $method === "GET") {
  (new AdminAuthController())->showLogin();
}
if ($uri === "/admin/login" && $method === "POST") {
  (new AdminAuthController())->login();
}
if ($uri === "/admin/logout" && $method === "POST") {
  (new AdminAuthController())->logout();
}

if ($uri === "/admin/posts" && $method === "GET") {
  (new AdminPostController())->index();
}
if ($uri === "/admin/posts/create" && $method === "GET") {
  (new AdminPostController())->create();
}
if ($uri === "/admin/posts/store" && $method === "POST") {
  (new AdminPostController())->store();
}
if (preg_match('#^/admin/posts/edit/(\d+)$#', $uri, $m) && $method === "GET") {
  (new AdminPostController())->edit((int)$m[1]);
}
if (preg_match('#^/admin/posts/update/(\d+)$#', $uri, $m) && $method === "POST") {
  (new AdminPostController())->update((int)$m[1]);
}
if (preg_match('#^/admin/posts/delete/(\d+)$#', $uri, $m) && $method === "POST") {
  (new AdminPostController())->delete((int)$m[1]);
}

notFound();
