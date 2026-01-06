<?php
// app/core/Response.php

class Response {
    public static function json($data, $status = 200) {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
    
    public static function redirect($path) {
        $base = $GLOBALS['base'] ?? '';
        header('Location: ' . $base . $path);
        exit;
    }
    
    public static function notFound() {
        // http_response_code(404);
        // echo "404 Not Found";
        // exit;
        $layoutFile = __DIR__ ."/../views/admin/error-404.html";
        include $layoutFile;
        exit;
    }
}