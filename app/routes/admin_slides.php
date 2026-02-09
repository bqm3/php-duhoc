<?php
// app/routes/admin_slides.php

// List slides
if ($uri === '/admin/slides' && $method === 'GET') {
    AdminSlideController::index();
    exit;
}

// Create slide form
if ($uri === '/admin/slides/create' && $method === 'GET') {
    AdminSlideController::create();
    exit;
}

// Store slide
if ($uri === '/admin/slides' && $method === 'POST') {
    AdminSlideController::store();
    exit;
}

// Edit slide form
if (preg_match('#^/admin/slides/(\d+)/edit$#', $uri, $matches) && $method === 'GET') {
    AdminSlideController::edit((int) $matches[1]);
    exit;
}

// Update slide
if (preg_match('#^/admin/slides/(\d+)$#', $uri, $matches) && $method === 'POST') {
    AdminSlideController::update((int) $matches[1]);
    exit;
}

// Delete slide
if (preg_match('#^/admin/slides/(\d+)/delete$#', $uri, $matches) && $method === 'POST') {
    AdminSlideController::delete((int) $matches[1]);
    exit;
}

// Toggle hidden slide
if (preg_match('#^/admin/slides/(\d+)/toggle-hidden$#', $uri, $matches) && $method === 'POST') {
    AdminSlideController::toggleHidden((int) $matches[1]);
    exit;
}
