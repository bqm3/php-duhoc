<?php
// app/core/Upload.php

class Upload
{
    /**
     * Save uploaded file
     * 
     * @param array $file The $_FILES['name'] array
     * @param string $prefix Prefix for the filename
     * @param string $subdir Subdirectory inside public/assets/uploads/
     * @param array|null $allowed Allowed extensions. If null, allows common images + docs.
     * @return string|null The relative path to the file for DB storage, or null if no file
     * @throws Exception
     */
    public static function saveUploadedFile($file, $prefix = 'file_', $subdir = '', $allowed = null)
    {
        // Check if file array structure is valid
        if (!isset($file) || !isset($file['error'])) {
            return null;
        }

        // Check specifically for no file uploaded
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

        if (!isset($file['tmp_name']) || empty($file['tmp_name'])) {
            return null;
        }

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if ($allowed === null) {
            $allowed = [
                'jpg',
                'jpeg',
                'png',
                'gif',
                'webp',
                'bmp',
                'svg',
                'pdf',
                'doc',
                'docx',
                'xls',
                'xlsx',
                'ppt',
                'pptx',
                'zip',
                'rar',
                'txt',
                'csv'
            ];
        }

        if (!in_array($ext, $allowed, true)) {
            throw new Exception('Invalid file type.');
        }

        // Generate filename
        $filename = $prefix . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;

        // Base upload directory
        $baseDir = realpath(__DIR__ . '/../../public') . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'uploads';
        if ($baseDir === false) {
            $baseDir = __DIR__ . '/../../public/assets/uploads';
        }

        // Target directory with optional subdirectory
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

        // Return relative path
        $relativePath = '/assets/uploads/';
        if (!empty($subdir)) {
            $relativePath .= $subdir . '/';
        }
        return $relativePath . $filename;
    }

    /**
     * Specialized for images
     */
    public static function saveUploadedImage($file, $prefix = 'img_', $subdir = '')
    {
        return self::saveUploadedFile($file, $prefix, $subdir, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
    }

    /**
     * Infer type (image|file) from URL/path
     */
    public static function inferTypeFromUrl(string $url): string
    {
        $ext = strtolower(pathinfo(parse_url($url, PHP_URL_PATH) ?? $url, PATHINFO_EXTENSION));
        $img = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp', 'svg'];
        return in_array($ext, $img, true) ? 'image' : 'file';
    }
}
