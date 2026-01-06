<?php
// app/controllers/AdminPostController.php

class AdminPostController {
    
    // List all posts
    public static function index() {
        Auth::requireAdmin();
        
        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("
            SELECT p.*, c.name as category_name 
            FROM posts p 
            LEFT JOIN categories c ON p.category_id = c.id 
            ORDER BY p.created_at DESC
        ");
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        view('admin', 'admin/posts/index', ['posts' => $posts]);
    }
    
    // Show create form
    public static function create() {
        Auth::requireAdmin();
        
        $db = Db::getInstance()->pdo();
        $stmt = $db->query("SELECT * FROM categories ORDER BY name");
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        view('admin', 'admin/posts/create', [
            'categories' => $categories,
            'csrf' => Csrf::token()
        ]);
    }
    
    // Store new post
    public static function store() {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');
        
        $title = trim($_POST['title'] ?? '');
        $slug = self::generateSlug($_POST['slug'] ?? $title);
        $category_id = (int)($_POST['category_id'] ?? 0);
        $content = $_POST['content'] ?? '';
        
        if (empty($title)) {
            Response::json(['error' => 'Title is required'], 400);
        }
        
        $db = Db::getInstance()->pdo();
        
        // Check if slug exists
        $stmt = $db->prepare("SELECT id FROM posts WHERE slug = ?");
        $stmt->execute([$slug]);
        if ($stmt->fetch()) {
            $slug = $slug . '-' . time();
        }
        
        $stmt = $db->prepare("
            INSERT INTO posts (slug, title, category_id, content) 
            VALUES (?, ?, ?, ?)
        ");
        
        if ($stmt->execute([$slug, $title, $category_id, $content])) {
            Response::redirect('/admin/posts');
        } else {
            Response::json(['error' => 'Failed to create post'], 500);
        }
    }
    
    // Show edit form
    public static function edit($id) {
        Auth::requireAdmin();
        
        $db = Db::getInstance()->pdo();
        
        // Get post
        $stmt = $db->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$post) {
            Response::notFound();
        }
        
        // Get categories
        $stmt = $db->query("SELECT * FROM categories ORDER BY name");
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        view('admin', 'admin/posts/edit', [
            'post' => $post,
            'categories' => $categories,
            'csrf' => Csrf::token()
        ]);
    }
    
    // Update post
    public static function update($id) {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');
        
        $title = trim($_POST['title'] ?? '');
        $slug = self::generateSlug($_POST['slug'] ?? $title);
        $category_id = (int)($_POST['category_id'] ?? 0);
        $content = $_POST['content'] ?? '';
        
        if (empty($title)) {
            Response::json(['error' => 'Title is required'], 400);
        }
        
        $db = Db::getInstance()->pdo();
        
        // Check if slug exists (exclude current post)
        $stmt = $db->prepare("SELECT id FROM posts WHERE slug = ? AND id != ?");
        $stmt->execute([$slug, $id]);
        if ($stmt->fetch()) {
            $slug = $slug . '-' . time();
        }
        
        $stmt = $db->prepare("
            UPDATE posts 
            SET slug = ?, title = ?, category_id = ?, content = ?
            WHERE id = ?
        ");
        
        if ($stmt->execute([$slug, $title, $category_id, $content, $id])) {
            Response::redirect('/admin/posts');
        } else {
            Response::json(['error' => 'Failed to update post'], 500);
        }
    }
    
    // Delete post
    public static function delete($id) {
        Auth::requireAdmin();
        Csrf::verify($_POST['_csrf'] ?? '');
        
        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("DELETE FROM posts WHERE id = ?");
        
        if ($stmt->execute([$id])) {
            Response::json(['success' => true]);
        } else {
            Response::json(['error' => 'Failed to delete post'], 500);
        }
    }
    
    // Generate slug from title
    private static function generateSlug($text) {
        // Convert Vietnamese characters
        $text = self::removeVietnameseTones($text);
        
        // Convert to lowercase
        $text = strtolower($text);
        
        // Remove special characters
        $text = preg_replace('/[^a-z0-9\s-]/', '', $text);
        
        // Replace spaces with hyphens
        $text = preg_replace('/[\s-]+/', '-', $text);
        
        // Trim hyphens from ends
        return trim($text, '-');
    }
    
    // Remove Vietnamese tones
    private static function removeVietnameseTones($str) {
        $vietnameseTones = [
            'à' => 'a', 'á' => 'a', 'ạ' => 'a', 'ả' => 'a', 'ã' => 'a',
            'â' => 'a', 'ầ' => 'a', 'ấ' => 'a', 'ậ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a',
            'ă' => 'a', 'ằ' => 'a', 'ắ' => 'a', 'ặ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a',
            'è' => 'e', 'é' => 'e', 'ẹ' => 'e', 'ẻ' => 'e', 'ẽ' => 'e',
            'ê' => 'e', 'ề' => 'e', 'ế' => 'e', 'ệ' => 'e', 'ể' => 'e', 'ễ' => 'e',
            'ì' => 'i', 'í' => 'i', 'ị' => 'i', 'ỉ' => 'i', 'ĩ' => 'i',
            'ò' => 'o', 'ó' => 'o', 'ọ' => 'o', 'ỏ' => 'o', 'õ' => 'o',
            'ô' => 'o', 'ồ' => 'o', 'ố' => 'o', 'ộ' => 'o', 'ổ' => 'o', 'ỗ' => 'o',
            'ơ' => 'o', 'ờ' => 'o', 'ớ' => 'o', 'ợ' => 'o', 'ở' => 'o', 'ỡ' => 'o',
            'ù' => 'u', 'ú' => 'u', 'ụ' => 'u', 'ủ' => 'u', 'ũ' => 'u',
            'ư' => 'u', 'ừ' => 'u', 'ứ' => 'u', 'ự' => 'u', 'ử' => 'u', 'ữ' => 'u',
            'ỳ' => 'y', 'ý' => 'y', 'ỵ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y',
            'đ' => 'd',
            'À' => 'A', 'Á' => 'A', 'Ạ' => 'A', 'Ả' => 'A', 'Ã' => 'A',
            'Â' => 'A', 'Ầ' => 'A', 'Ấ' => 'A', 'Ậ' => 'A', 'Ẩ' => 'A', 'Ẫ' => 'A',
            'Ă' => 'A', 'Ằ' => 'A', 'Ắ' => 'A', 'Ặ' => 'A', 'Ẳ' => 'A', 'Ẵ' => 'A',
            'È' => 'E', 'É' => 'E', 'Ẹ' => 'E', 'Ẻ' => 'E', 'Ẽ' => 'E',
            'Ê' => 'E', 'Ề' => 'E', 'Ế' => 'E', 'Ệ' => 'E', 'Ể' => 'E', 'Ễ' => 'E',
            'Ì' => 'I', 'Í' => 'I', 'Ị' => 'I', 'Ỉ' => 'I', 'Ĩ' => 'I',
            'Ò' => 'O', 'Ó' => 'O', 'Ọ' => 'O', 'Ỏ' => 'O', 'Õ' => 'O',
            'Ô' => 'O', 'Ồ' => 'O', 'Ố' => 'O', 'Ộ' => 'O', 'Ổ' => 'O', 'Ỗ' => 'O',
            'Ơ' => 'O', 'Ờ' => 'O', 'Ớ' => 'O', 'Ợ' => 'O', 'Ở' => 'O', 'Ỡ' => 'O',
            'Ù' => 'U', 'Ú' => 'U', 'Ụ' => 'U', 'Ủ' => 'U', 'Ũ' => 'U',
            'Ư' => 'U', 'Ừ' => 'U', 'Ứ' => 'U', 'Ự' => 'U', 'Ử' => 'U', 'Ữ' => 'U',
            'Ỳ' => 'Y', 'Ý' => 'Y', 'Ỵ' => 'Y', 'Ỷ' => 'Y', 'Ỹ' => 'Y',
            'Đ' => 'D'
        ];
        
        return strtr($str, $vietnameseTones);
    }
}