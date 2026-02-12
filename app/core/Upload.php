<?php
// app/core/Upload.php

class Upload
{
    /**
     * Tìm thư mục public webroot trên hosting kiểu:
     * php-duhoc/ (code) ngang cấp public_html/ (webroot)
     */
    public static function publicRoot(): string
    {
        // Ưu tiên 1: nếu bạn define sẵn PUBLIC_ROOT ở bootstrap/config
        if (defined('PUBLIC_ROOT') && is_dir(PUBLIC_ROOT)) {
            return rtrim(PUBLIC_ROOT, '/\\');
        }

        // Ưu tiên 2: dùng DOCUMENT_ROOT (thường là .../public_html)
        $docRoot = $_SERVER['DOCUMENT_ROOT'] ?? '';
        if ($docRoot && is_dir($docRoot)) {
            return rtrim($docRoot, '/\\');
        }

        // Ưu tiên 3: đoán theo cấu trúc: php-duhoc/app/core -> lên 3 cấp về php-duhoc -> sang ../public_html
        // __DIR__ = php-duhoc/app/core
        $guess = realpath(__DIR__ . '/../../../public_html');
        if ($guess && is_dir($guess)) {
            return rtrim($guess, '/\\');
        }

        // fallback cuối: thử ngay cạnh project
        $guess2 = realpath(__DIR__ . '/../../../../public_html');
        if ($guess2 && is_dir($guess2)) {
            return rtrim($guess2, '/\\');
        }

        throw new Exception('Cannot locate public web root (public_html). Please define PUBLIC_ROOT.');
    }

    /**
     * Map URL (/assets/uploads/...) -> filesystem path (public_html/assets/uploads/...)
     */
    public static function publicPathFromUrl(string $url): string
    {
        $path = parse_url($url, PHP_URL_PATH) ?? $url; // lấy phần path
        $path = '/' . ltrim($path, '/');
        return self::publicRoot() . $path;
    }

    /**
     * Save uploaded file
     *
     * @param array $file The $_FILES['name'] array
     * @param string $prefix Prefix for the filename
     * @param string $subdir Subdirectory inside public_html/assets/uploads/
     * @param array|null $allowed Allowed extensions
     * @return string|null Relative URL path for DB storage (e.g. /assets/uploads/posts/xxx.webp)
     * @throws Exception
     */
    public static function saveUploadedFile($file, $prefix = 'file_', $subdir = '', $allowed = null)
    {
        if (!isset($file) || !isset($file['error'])) {
            return null;
        }

        if ($file['error'] === UPLOAD_ERR_NO_FILE) {
            return null;
        }

        if ($file['error'] !== UPLOAD_ERR_OK) {
            $msg = 'Upload failed.';
            switch ($file['error']) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    $msg = 'File is too large (exceeds server limits).';
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $msg = 'File was only partially uploaded.';
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $msg = 'Missing a temporary folder.';
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $msg = 'Failed to write file to disk.';
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $msg = 'File upload stopped by extension.';
                    break;
            }
            throw new Exception($msg);
        }

        if (empty($file['tmp_name'])) {
            return null;
        }

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if ($allowed === null) {
            $allowed = ['jpg','jpeg','png','gif','webp','bmp','svg','pdf','doc','docx','xls','xlsx','ppt','pptx','zip','rar','txt','csv'];
        }

        if (!in_array($ext, $allowed, true)) {
            throw new Exception('Invalid file type.');
        }

        $filename = $prefix . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;

        // Base upload directory: public_html/assets/uploads
        $publicRoot = self::publicRoot();
        $baseDir = $publicRoot . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'uploads';

        $targetDir = $baseDir;
        if (!empty($subdir)) {
            $subdir = trim($subdir, '/\\');
            $targetDir .= DIRECTORY_SEPARATOR . $subdir;
        }

        if (!is_dir($targetDir) && !mkdir($targetDir, 0755, true)) {
            throw new Exception('Failed to create upload directory.');
        }

        $destPath = $targetDir . DIRECTORY_SEPARATOR . $filename;

        if (!move_uploaded_file($file['tmp_name'], $destPath)) {
            throw new Exception('Failed to move uploaded file.');
        }

        // URL path lưu DB
        $relativePath = '/assets/uploads/';
        if (!empty($subdir)) {
            $relativePath .= $subdir . '/';
        }
        return $relativePath . $filename;
    }

    public static function saveUploadedImage($file, $prefix = 'img_', $subdir = '')
    {
        return self::saveUploadedFile($file, $prefix, $subdir, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
    }

    public static function inferTypeFromUrl(string $url): string
    {
        $ext = strtolower(pathinfo(parse_url($url, PHP_URL_PATH) ?? $url, PATHINFO_EXTENSION));
        $img = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp', 'svg'];
        return in_array($ext, $img, true) ? 'image' : 'file';
    }
}
