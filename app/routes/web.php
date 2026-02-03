<?php
// Public / web routes

// HOME
if ($uri === "/" && $method === "GET") {
  (new HomeController())->index();
  exit;
}

if ($uri === "/gioi-thieu" && $method === "GET") {
  (new AboutController())->index();
  exit;
}

if ($uri === "/lien-he" && $method === "GET") {
  require_once __DIR__ . '/../controllers/client/LienheController.php';
  (new LienheController())->index();
  exit;
}

if ($uri === "/consultation/register" && $method === "POST") {
  require_once __DIR__ . '/../controllers/ConsultationController.php';
  (new ConsultationController())->register();
  exit;
}

if ($uri === "/dang-ky" && $method === "GET") {
  $countries = [];
  try {
    $db = Db::getInstance()->pdo();
    $countries = $db->query("SELECT id, name FROM countries ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);
  } catch (Exception $e) {
    // bạn có thể log $e->getMessage() nếu muốn
  }

  view('main', 'layouts/pages/dang_ky/index', [
    'title' => 'Đăng ký tư vấn',
    'pageCss' => ['dang_ky.css', 'about.css'],
    'countries' => $countries
  ]);
  exit;
}

// Post Detail Route
if ($method === "GET" && preg_match('#^/posts/([^/]+)$#', $uri, $matches)) {
  require_once __DIR__ . '/../controllers/client/StudyAbroadController.php';
  (new StudyAbroadController())->detail($matches[1]);
  exit;
}

// /api/menu-content/:slug (Mega menu)
if ($method === "GET" && preg_match('#^/api/menu-content/([a-z-]+)$#', $uri, $m)) {
  (new NavbarController())->getCategoryMenu($m[1]);
  exit;
}

if ($method === "GET" && ($uri === "/du-hoc" || $uri === "/visa-du-hoc")) {
  (new HomeController())->index();
  exit;
}

if ($method === "GET" && preg_match('#^/hoc-bong$#', $uri)) {
  require_once __DIR__ . '/../controllers/client/ScholarshipController.php';
  (new ScholarshipController())->index();
  exit;
}

if ($uri === "/tin-tuc" && $method === "GET") {
  require_once __DIR__ . '/../controllers/client/NewsController.php';
  (new NewsController())->index();
  exit;
}

// Study Abroad Detail (General slug) - để cuối cùng
if ($method === 'GET' && preg_match('#^/([^/]+)$#', $uri, $m)) {
  require_once __DIR__ . '/../controllers/client/StudyAbroadController.php';
  (new StudyAbroadController())->detail($m[1]);
  exit;
}
