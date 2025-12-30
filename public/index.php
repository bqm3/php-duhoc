<?php
declare(strict_types=1);

$cfg = require __DIR__ . "/../app/config/config.php";
session_name($cfg["app"]["session_name" ?? "PHP_DU_HOC"]);
session_start();

require __DIR__ . "/../app/core/Db.php";
require __DIR__ . "/../app/core/Auth.php";
require __DIR__ . "/../app/core/Csrf.php";
require __DIR__ . "/../app/core/Response.php";

// require __DIR__ . "/../app/controllers/HomeController.php";
// require __DIR__ . "/../app/controllers/AdminAuthController.php";
// require __DIR__ . "/../app/controllers/AdminPostController.php";

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

// expose base to controllers via $GLOBALS so redirects can honor subdirectory installs
$GLOBALS['base'] = $base;

function view(string $layout, string $view, array $data = []) {
  $data['base'] = $GLOBALS['base'] ?? '';
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
// Load route definitions from app/routes/*.php
foreach (glob(__DIR__ . "/../app/routes/*.php") as $routeFile) {
  require $routeFile;
}

notFound();
