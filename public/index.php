<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

ini_set('default_charset', 'UTF-8');
header('Content-Type: text/html; charset=UTF-8');
mb_internal_encoding('UTF-8');

// ✅ đường dẫn gốc project nằm ngoài public_html
$ROOT = realpath(__DIR__ . '../');
if (!$ROOT) {
    die('Project root not found');
}

/**
 * LOAD CONFIG
 */
$cfg = require $ROOT . '/app/config/config.php';

/**
 * SESSION
 */
$sessionName = $cfg['app']['session_name'] ?? 'PHP_DU_HOC';
session_name($sessionName);
session_start();

/**
 * CORE
 */
require $ROOT . '/app/core/Db.php';
require $ROOT . '/app/core/Auth.php';
require $ROOT . '/app/core/Csrf.php';
require $ROOT . '/app/core/Response.php';

/**
 * CONTROLLERS
 */
foreach (glob($ROOT . '/app/controllers/*.php') as $controllerFile) {
    require_once $controllerFile;
}

/**
 * URI & BASE PATH
 */
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/';
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

// ✅ base trong cPanel thường là '' vì chạy từ public_html
$base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
if ($base !== '' && $base !== '/') {
    if (strpos($uri, $base) === 0) {
        $uri = substr($uri, strlen($base));
    }
}
$uri = $uri === '' ? '/' : $uri;

$GLOBALS['base'] = $base;

function view(string $layout, string $view, array $data = []): void
{
    global $ROOT;
    $data['base'] = $GLOBALS['base'] ?? '';

    if (!isset($data['csrf'])) {
        $data['csrf'] = Csrf::token();
    }

    extract($data, EXTR_SKIP);

    $viewFile = $ROOT . "/app/views/$view.php";
    $layoutFile1 = $ROOT . "/app/views/layouts/$layout.php";
    $layoutFile2 = $ROOT . "/app/views/layouts/$layout.layout.php";

    $layoutFile = file_exists($layoutFile1) ? $layoutFile1 : (file_exists($layoutFile2) ? $layoutFile2 : null);

    if (!$layoutFile) throw new RuntimeException("Layout not found: $layoutFile1 OR $layoutFile2");
    if (!file_exists($viewFile)) throw new RuntimeException("View not found: $viewFile");

    include $layoutFile;
    exit;
}

function partial(string $view, array $data = []): void
{
    global $ROOT;
    $data['base'] = $GLOBALS['base'] ?? '';
    extract($data, EXTR_SKIP);

    $viewFile = $ROOT . "/app/views/$view.php";
    if (file_exists($viewFile)) include $viewFile;
}

function notFound(): void
{
    global $ROOT;
    http_response_code(404);
    include $ROOT . '/app/views/admin/error-404.html';
    exit;
}

/**
 * ROUTES
 */
foreach (glob($ROOT . '/app/routes/*.php') as $routeFile) {
    require $routeFile;
}

notFound();
