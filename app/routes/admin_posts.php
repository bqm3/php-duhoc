<?php
// app/routes/admin_posts.php

// List posts
if ($uri === '/admin/posts' && $method === 'GET') {
    AdminPostController::index();
    exit;
}

// Create form
if ($uri === '/admin/posts/create' && $method === 'GET') {
    AdminPostController::create();
    exit;
}

// Store post
if ($uri === '/admin/posts' && $method === 'POST') {
    AdminPostController::store();
}

// Edit form
if (preg_match('#^/admin/posts/(\d+)/edit$#', $uri, $matches) && $method === 'GET') {
    AdminPostController::edit((int)$matches[1]);
}

// Update post
if (preg_match('#^/admin/posts/(\d+)$#', $uri, $matches) && $method === 'POST') {
    AdminPostController::update((int)$matches[1]);
}

// Delete post
if (preg_match('#^/admin/posts/(\d+)/delete$#', $uri, $matches) && $method === 'POST') {
    AdminPostController::delete((int)$matches[1]);
}

// Upload image (CKEditor)
if ($uri === '/admin/posts/upload-image' && $method === 'POST') {
    AdminPostController::uploadImage();
    exit;
}