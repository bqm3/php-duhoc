<?php
// Public / web routes
if ($uri === "/" && $method === "GET") {
  (new HomeController())->index();
}

if ($uri === "/gioi-thieu" && $method === "GET") {
  (new AboutController())->index();
}

if ($uri === "/consultation/register" && $method === "POST") {
  require_once __DIR__ . '/../controllers/ConsultationController.php';
  (new ConsultationController())->register();
}

// Post Detail Route
if (preg_match('#^/posts/([^/]+)$#', $uri, $matches) && $method === "GET") {
  require_once __DIR__ . '/../controllers/client/StudyAbroadController.php';
  (new StudyAbroadController())->detail($matches[1]);
  exit;
}

// /api/study-abroad-menu  (Mega menu Du học)
if ($uri === "/api/study-abroad-menu" && $method === "GET") {
  (new NavbarController())->getStudyAbroadMenu();
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