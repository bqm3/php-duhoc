<?php
// app/routes/admin_files.php

// List
if ($uri === '/admin/files' && $method === 'GET') {
    AdminFileController::index();
    exit;
}

// Create form
if ($uri === '/admin/files/create' && $method === 'GET') {
    AdminFileController::create();
    exit;
}

// Store
if ($uri === '/admin/files' && $method === 'POST') {
    AdminFileController::store();
    exit;
}

// Edit form
if (preg_match('#^/admin/files/(\d+)/edit$#', $uri, $matches) && $method === 'GET') {
    AdminFileController::edit((int)$matches[1]);
    exit;
}

// Update
if (preg_match('#^/admin/files/(\d+)$#', $uri, $matches) && $method === 'POST') {
    AdminFileController::update((int)$matches[1]);
    exit;
}

// Delete
if (preg_match('#^/admin/files/(\d+)/delete$#', $uri, $matches) && $method === 'POST') {
    AdminFileController::delete((int)$matches[1]);
    exit;
}
