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
