<?php
// app/core/Response.php

class Response
{
    public static function json($data, $status = 200)
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    public static function redirect($path)
    {
        $base = $GLOBALS['base'] ?? '';

        // If path is already a full URL, don't prepend base
        if (strpos($path, 'http://') === 0 || strpos($path, 'https://') === 0) {
            header('Location: ' . $path);
            exit;
        }

        // If path already starts with base, don't prepend it again
        if ($base !== '' && strpos($path, $base) === 0) {
            header('Location: ' . $path);
        } else {
            header('Location: ' . $base . $path);
        }
        exit;
    }

    public static function notFound()
    {
        // http_response_code(404);
        // echo "404 Not Found";
        // exit;
        $layoutFile = __DIR__ . "/../views/admin/error-404.php";
        include $layoutFile;
        exit;
    }
}