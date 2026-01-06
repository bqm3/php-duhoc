<?php
// app/routes/admin_categories.php

// List categories
if ($uri === '/admin/categories' && $method === 'GET') {
    AdminCategoryController::index();
    exit;
}

// Create form
if ($uri === '/admin/categories/create' && $method === 'GET') {
    AdminCategoryController::create();
    exit;
}

// Store category
if ($uri === '/admin/categories' && $method === 'POST') {
    AdminCategoryController::store();
}

// Edit form
if (preg_match('#^/admin/categories/(\d+)/edit$#', $uri, $matches) && $method === 'GET') {
    AdminCategoryController::edit((int)$matches[1]);
}

// Update category
if (preg_match('#^/admin/categories/(\d+)$#', $uri, $matches) && $method === 'POST') {
    AdminCategoryController::update((int)$matches[1]);
}

// Delete category
if (preg_match('#^/admin/categories/(\d+)/delete$#', $uri, $matches) && $method === 'POST') {
    AdminCategoryController::delete((int)$matches[1]);
}
