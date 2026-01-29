<?php
// app/routes/admin_tags.php

// List tags
if ($uri === '/admin/tags' && $method === 'GET') {
    AdminTagController::index();
}

// Create form
if ($uri === '/admin/tags/create' && $method === 'GET') {
    AdminTagController::create();
}

// Store tag
if ($uri === '/admin/tags' && $method === 'POST') {
    AdminTagController::store();
}

// Edit form
if (preg_match('#^/admin/tags/(\d+)/edit$#', $uri, $matches) && $method === 'GET') {
    AdminTagController::edit((int) $matches[1]);
}

// Update tag
if (preg_match('#^/admin/tags/(\d+)$#', $uri, $matches) && $method === 'POST') {
    AdminTagController::update((int) $matches[1]);
}

// Delete tag
if (preg_match('#^/admin/tags/(\d+)/delete$#', $uri, $matches) && $method === 'POST') {
    AdminTagController::delete((int) $matches[1]);
}
