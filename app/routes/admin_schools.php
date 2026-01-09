<?php

if ($uri === "/admin/schools" && $method === "GET") {
    require_once __DIR__ . '/../controllers/AdminSchoolController.php';
    AdminSchoolController::index();
}
if ($uri === "/admin/schools/create" && $method === "GET") {
    require_once __DIR__ . '/../controllers/AdminSchoolController.php';
    AdminSchoolController::create();
}
if ($uri === "/admin/schools" && $method === "POST") {
    require_once __DIR__ . '/../controllers/AdminSchoolController.php';
    AdminSchoolController::store();
}
if (preg_match('#^/admin/schools/(\d+)/edit$#', $uri, $matches) && $method === "GET") {
    require_once __DIR__ . '/../controllers/AdminSchoolController.php';
    AdminSchoolController::edit($matches[1]);
}
if (preg_match('#^/admin/schools/(\d+)/update$#', $uri, $matches) && $method === "POST") {
    require_once __DIR__ . '/../controllers/AdminSchoolController.php';
    AdminSchoolController::update($matches[1]);
}
if (preg_match('#^/admin/schools/(\d+)/delete$#', $uri, $matches) && $method === "POST") {
    require_once __DIR__ . '/../controllers/AdminSchoolController.php';
    AdminSchoolController::delete($matches[1]);
}
