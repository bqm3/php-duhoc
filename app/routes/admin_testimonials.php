<?php
// app/routes/admin_testimonials.php

// List testimonials
if ($method === 'GET' && $uri === '/admin/testimonials') {
    AdminTestimonialController::index();
}

// Create form
if ($method === 'GET' && $uri === '/admin/testimonials/create') {
    AdminTestimonialController::create();
}

// Store
if ($method === 'POST' && $uri === '/admin/testimonials/store') {
    AdminTestimonialController::store();
}

// Edit form
if ($method === 'GET' && preg_match('/^\/admin\/testimonials\/(\d+)\/edit$/', $uri, $matches)) {
    AdminTestimonialController::edit($matches[1]);
}

// Update
if ($method === 'POST' && preg_match('/^\/admin\/testimonials\/(\d+)\/update$/', $uri, $matches)) {
    AdminTestimonialController::update($matches[1]);
}

// Delete
if ($method === 'POST' && preg_match('/^\/admin\/testimonials\/(\d+)\/delete$/', $uri, $matches)) {
    AdminTestimonialController::delete($matches[1]);
}

// Toggle hidden
if ($method === 'POST' && preg_match('/^\/admin\/testimonials\/(\d+)\/toggle-hidden$/', $uri, $matches)) {
    AdminTestimonialController::toggleHidden($matches[1]);
}
