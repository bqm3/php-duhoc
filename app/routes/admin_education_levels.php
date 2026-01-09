<?php
// Education Levels
if ($uri === "/admin/education-levels" && $method === "GET") {
    require_once __DIR__ . '/../controllers/AdminEducationLevelController.php';
    AdminEducationLevelController::index();
}
if ($uri === "/admin/education-levels/create" && $method === "GET") {
    require_once __DIR__ . '/../controllers/AdminEducationLevelController.php';
    AdminEducationLevelController::create();
}
if ($uri === "/admin/education-levels" && $method === "POST") {
    require_once __DIR__ . '/../controllers/AdminEducationLevelController.php';
    AdminEducationLevelController::store();
}
if (preg_match('#^/admin/education-levels/(\d+)/edit$#', $uri, $matches) && $method === "GET") {
    require_once __DIR__ . '/../controllers/AdminEducationLevelController.php';
    AdminEducationLevelController::edit($matches[1]);
}
if (preg_match('#^/admin/education-levels/(\d+)/update$#', $uri, $matches) && $method === "POST") {
    require_once __DIR__ . '/../controllers/AdminEducationLevelController.php';
    AdminEducationLevelController::update($matches[1]);
}
if (preg_match('#^/admin/education-levels/(\d+)/delete$#', $uri, $matches) && $method === "POST") {
    require_once __DIR__ . '/../controllers/AdminEducationLevelController.php';
    AdminEducationLevelController::delete($matches[1]);
}