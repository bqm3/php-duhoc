<?php
// app/routes/admin_users.php

// List users
if ($uri === '/admin/users' && $method === 'GET') {
    AdminUserController::index();
    exit;
}

// Create form
if ($uri === '/admin/users/create' && $method === 'GET') {
    AdminUserController::create();
    exit;
}

// Store user
if ($uri === '/admin/users' && $method === 'POST') {
    AdminUserController::store();
}

// Edit form
if (preg_match('#^/admin/users/(\d+)/edit$#', $uri, $matches) && $method === 'GET') {
    AdminUserController::edit((int)$matches[1]);
}

// Update user
if (preg_match('#^/admin/users/(\d+)$#', $uri, $matches) && $method === 'POST') {
    AdminUserController::update((int)$matches[1]);
}

// Delete user
if (preg_match('#^/admin/users/(\d+)/delete$#', $uri, $matches) && $method === 'POST') {
    AdminUserController::delete((int)$matches[1]);
}
