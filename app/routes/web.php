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
  require_once __DIR__ . '/../controllers/AdminPostController.php';
  AdminPostController::show($matches[1]);
}

// /api/study-abroad-menu  (Mega menu Du học)
if ($uri === "/api/study-abroad-menu" && $method === "GET") {
  (new NavbarController())->getStudyAbroadMenu();
}



// Study Abroad Detail
if (preg_match('#^/du-hoc-([^/]+)$#', $uri, $m) && $method === 'GET') {
  require_once __DIR__ . '/../controllers/duhoc/StudyAbroadController.php';
  (new StudyAbroadController())->detail('du-hoc-' . $m[1]);
  exit;
}

// Post detail
if (preg_match('#^/([^/]+)$#', $uri, $matches) && $method === "GET") {
  require_once __DIR__ . '/../controllers/AdminPostController.php';
  AdminPostController::show($matches[1]); // slug
  exit;
}