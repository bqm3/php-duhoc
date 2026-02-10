<?php
declare(strict_types=1);

/**
 * =====================================================
 * BOOTSTRAP / FRONT CONTROLLER
 * =====================================================
 */
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

ini_set('default_charset', 'UTF-8');
header('Content-Type: text/html; charset=UTF-8');
mb_internal_encoding('UTF-8');

// bật khi dev
// ini_set('display_errors', '1');
// error_reporting(E_ALL);

/**
 * -----------------------------------------------------
 * LOAD CONFIG
 * -----------------------------------------------------
 */
$cfg = require __DIR__ . '/../app/config/config.php';

/**
 * -----------------------------------------------------
 * SESSION
 * -----------------------------------------------------
 */
$sessionName = $cfg['app']['session_name'] ?? 'PHP_DU_HOC';
session_name($sessionName);
session_start();

/**
 * -----------------------------------------------------
 * CORE
 * -----------------------------------------------------
 */
require __DIR__ . '/../app/core/Db.php';
require __DIR__ . '/../app/core/Auth.php';
require __DIR__ . '/../app/core/Csrf.php';
require __DIR__ . '/../app/core/Response.php';

/**
 * -----------------------------------------------------
 * CONTROLLERS (AUTO LOAD)
 * -----------------------------------------------------
 */
foreach (glob(__DIR__ . '/../app/controllers/*.php') as $controllerFile) {
    require_once $controllerFile;
}

/**
 * -----------------------------------------------------
 * URI & BASE PATH
 * -----------------------------------------------------
 */
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/';
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

/**
 * auto detect base path
 * ví dụ project nằm trong /php-duhoc/public
 */
$base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
if ($base !== '' && $base !== '/') {
    if (strpos($uri, $base) === 0) {
        $uri = substr($uri, strlen($base));
    }
}
$uri = $uri === '' ? '/' : $uri;

// expose base global
$GLOBALS['base'] = $base;

/**
 * -----------------------------------------------------
 * VIEW HELPER
 * -----------------------------------------------------
 */
function view(string $layout, string $view, array $data = []): void
{
    $data['base'] = $GLOBALS['base'] ?? '';

    if (!isset($data['csrf'])) {
        $data['csrf'] = Csrf::token();
    }

    extract($data, EXTR_SKIP);

    $viewFile = __DIR__ . "/../app/views/$view.php";

    // support both: {layout}.php and {layout}.layout.php
    $layoutFile1 = __DIR__ . "/../app/views/layouts/$layout.php";
    $layoutFile2 = __DIR__ . "/../app/views/layouts/$layout.layout.php";

    $layoutFile = null;
    if (file_exists($layoutFile1))
        $layoutFile = $layoutFile1;
    elseif (file_exists($layoutFile2))
        $layoutFile = $layoutFile2;

    if (!$layoutFile) {
        throw new RuntimeException("Layout not found: $layoutFile1 OR $layoutFile2");
    }
    if (!file_exists($viewFile)) {
        throw new RuntimeException("View not found: $viewFile");
    }

    include $layoutFile;
    exit;
}


/**
 * Helper to render partial views
 */
function partial(string $view, array $data = []): void
{
    $data['base'] = $GLOBALS['base'] ?? '';
    extract($data, EXTR_SKIP);
    $viewFile = __DIR__ . "/../app/views/$view.php";
    if (file_exists($viewFile)) {
        include $viewFile;
    }
}

/**
 * -----------------------------------------------------
 * 404
 * -----------------------------------------------------
 */
function notFound(): void
{
    http_response_code(404);
    include __DIR__ . '/../app/views/admin/error-404.php';
    exit;
}

/**
 * -----------------------------------------------------
 * ROUTES
 * -----------------------------------------------------
 */
foreach (glob(__DIR__ . '/../app/routes/*.php') as $routeFile) {
    require $routeFile;
}

/**
 * -----------------------------------------------------
 * FALLBACK
 * -----------------------------------------------------
 */
notFound();
