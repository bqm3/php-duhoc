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

if ($uri === "/api/study-abroad-menu" && $method === "GET") {
  (new NavbarController())->getStudyAbroadMenu();
}
