<?php
// Admin authentication routes
if ($uri === "/admin" || $uri === "/admin/") {
  (new AdminAuthController())->dashboard();
  exit;
}

if ($uri === "/admin/login" && $method === "GET") {
  (new AdminAuthController())->showLogin();
}
if ($uri === "/admin/login" && $method === "POST") {
  (new AdminAuthController())->login();
}
if ($uri === "/admin/logout" && $method === "POST") {
  (new AdminAuthController())->logout();
}
