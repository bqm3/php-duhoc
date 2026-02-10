<?php
// app/routes/admin_partners.php

// List partners
if ($uri === '/admin/partners' && $method === 'GET') {
    AdminPartnerController::index();
    exit;
}

// Create partner form
if ($uri === '/admin/partners/create' && $method === 'GET') {
    AdminPartnerController::create();
    exit;
}

// Store partner
if ($uri === '/admin/partners' && $method === 'POST') {
    AdminPartnerController::store();
    exit;
}

// Edit partner form
if (preg_match('#^/admin/partners/(\d+)/edit$#', $uri, $matches) && $method === 'GET') {
    AdminPartnerController::edit((int) $matches[1]);
    exit;
}

// Update partner
if (preg_match('#^/admin/partners/(\d+)$#', $uri, $matches) && $method === 'POST') {
    AdminPartnerController::update((int) $matches[1]);
    exit;
}

// Delete partner
if (preg_match('#^/admin/partners/(\d+)/delete$#', $uri, $matches) && $method === 'POST') {
    AdminPartnerController::delete((int) $matches[1]);
    exit;
}

// Toggle hidden partner
if (preg_match('#^/admin/partners/(\d+)/toggle-hidden$#', $uri, $matches) && $method === 'POST') {
    AdminPartnerController::toggleHidden((int) $matches[1]);
    exit;
}
