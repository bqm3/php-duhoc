<?php

// Continents
if ($uri === "/admin/continents" && $method === "GET") {
    AdminContinentController::index();
}
if ($uri === "/admin/continents/create" && $method === "GET") {
    AdminContinentController::create();
}
if ($uri === "/admin/continents" && $method === "POST") {
    AdminContinentController::store();
}
if (preg_match('#^/admin/continents/(\d+)/edit$#', $uri, $matches) && $method === "GET") {
    AdminContinentController::edit($matches[1]);
}
if (preg_match('#^/admin/continents/(\d+)/update$#', $uri, $matches) && $method === "POST") {
    AdminContinentController::update($matches[1]);
}
if (preg_match('#^/admin/continents/(\d+)/delete$#', $uri, $matches) && $method === "POST") {
    AdminContinentController::delete($matches[1]);
}

// Countries
if ($uri === "/admin/countries" && $method === "GET") {
    AdminCountryController::index();
}
if ($uri === "/admin/countries/create" && $method === "GET") {
    AdminCountryController::create();
}
if ($uri === "/admin/countries" && $method === "POST") {
    AdminCountryController::store();
}
if (preg_match('#^/admin/countries/(\d+)/edit$#', $uri, $matches) && $method === "GET") {
    AdminCountryController::edit($matches[1]);
}
if (preg_match('#^/admin/countries/(\d+)/update$#', $uri, $matches) && $method === "POST") {
    AdminCountryController::update($matches[1]);
}
if (preg_match('#^/admin/countries/(\d+)/delete$#', $uri, $matches) && $method === "POST") {
    AdminCountryController::delete($matches[1]);
}

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

// Cities
if ($uri === "/admin/cities" && $method === "GET") {
    require_once __DIR__ . '/../controllers/AdminCityController.php';
    AdminCityController::index();
}
if ($uri === "/admin/cities/create" && $method === "GET") {
    require_once __DIR__ . '/../controllers/AdminCityController.php';
    AdminCityController::create();
}
if ($uri === "/admin/cities" && $method === "POST") {
    require_once __DIR__ . '/../controllers/AdminCityController.php';
    AdminCityController::store();
}
if (preg_match('#^/admin/cities/(\d+)/edit$#', $uri, $matches) && $method === "GET") {
    require_once __DIR__ . '/../controllers/AdminCityController.php';
    AdminCityController::edit($matches[1]);
}
if (preg_match('#^/admin/cities/(\d+)/update$#', $uri, $matches) && $method === "POST") {
    require_once __DIR__ . '/../controllers/AdminCityController.php';
    AdminCityController::update($matches[1]);
}
if (preg_match('#^/admin/cities/(\d+)/delete$#', $uri, $matches) && $method === "POST") {
    require_once __DIR__ . '/../controllers/AdminCityController.php';
    AdminCityController::delete($matches[1]);
}
