<?php
// Public / web routes
if ($uri === "/" && $method === "GET") {
  (new HomeController())->index();
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
