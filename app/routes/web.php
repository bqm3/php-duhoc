<?php
// Public / web routes
if ($uri === "/" && $method === "GET") {
  (new HomeController())->index();
}

if ($uri === "/gioi-thieu" && $method === "GET") {
  (new AboutController())->index();
}

if ($uri === "/lien-he" && $method === "GET") {
  require_once __DIR__ . '/../controllers/client/LienheController.php';
  (new LienheController())->index();
  exit;
}

if ($uri === "/consultation/register" && $method === "POST") {
  require_once __DIR__ . '/../controllers/ConsultationController.php';
  (new ConsultationController())->register();
}

if ($uri === "/dang-ky" && $method === "GET") {
  $countries = [];
  try {
    $db = Db::getInstance()->pdo();
    $countries = $db->query("SELECT id, name FROM countries ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);
  } catch (Exception $e) {
  }

  view('main', 'layouts/pages/dang_ky/index', [
    'title' => 'Đăng ký tư vấn',
    'pageCss' => ['dang_ky.css', 'about.css'],
    'countries' => $countries
  ]);
}

// Post Detail Route
if (preg_match('#^/posts/([^/]+)$#', $uri, $matches) && $method === "GET") {
  require_once __DIR__ . '/../controllers/client/StudyAbroadController.php';
  (new StudyAbroadController())->detail($matches[1]);
  exit;
}

// /api/menu-content/:slug (Mega menu)
if (preg_match('#^/api/menu-content/([a-z-]+)$#', $uri, $m) && $method === "GET") {
  (new NavbarController())->getCategoryMenu($m[1]);
}

if ($uri === "/du-hoc" && $method === "GET") {
  (new HomeController())->index();
  exit;
}

if (preg_match('#^/hoc-bong$#', $uri, $m) && $method === 'GET') {
  require_once __DIR__ . '/../controllers/client/ScholarshipController.php';
  (new ScholarshipController())->index();
  exit;
}

// Study Abroad Detail (General slug) - Phải để ở cuối các route GET 1 cấp
if (preg_match('#^/([^/]+)$#', $uri, $m) && $method === 'GET') {
  require_once __DIR__ . '/../controllers/client/StudyAbroadController.php';
  (new StudyAbroadController())->detail($m[1]);
  exit;
}