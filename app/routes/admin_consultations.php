<?php
// Consultation Routes
if ($uri === "/admin/consultations" && $method === "GET") {
  AdminConsultationController::index();
}

if (preg_match('#^/admin/consultations/(\d+)/edit$#', $uri, $matches) && $method === "GET") {
    AdminConsultationController::edit($matches[1]);
}

if (preg_match('#^/admin/consultations/(\d+)/update$#', $uri, $matches) && $method === "POST") {
    AdminConsultationController::update($matches[1]);
}