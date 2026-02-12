<?php
// app/controllers/client/SearchController.php

class SearchController
{
    public function index()
    {
        $q = trim($_GET['q'] ?? '');
        $posts = [];
        $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        if ($currentPage < 1)
            $currentPage = 1;

        $limit = 12;
        $offset = ($currentPage - 1) * $limit;
        $totalPosts = 0;
        $totalPages = 0;

        if (!empty($q)) {
            $db = Db::getInstance()->pdo();

            // Count total matching posts for pagination
            $countStmt = $db->prepare("
                SELECT COUNT(*) 
                FROM posts 
                WHERE title LIKE ? AND is_hidden = 0 AND is_delete = 0
            ");
            $countStmt->execute(['%' . $q . '%']);
            $totalPosts = (int) $countStmt->fetchColumn();
            $totalPages = ceil($totalPosts / $limit);

            // Fetch matched posts with limit and offset
            $stmt = $db->prepare("
                SELECT p.*, c.name as category_name 
                FROM posts p
                LEFT JOIN categories c ON p.category_id = c.id
                WHERE p.title LIKE ? AND p.is_hidden = 0 AND p.is_delete = 0 
                ORDER BY p.created_at DESC
                LIMIT ? OFFSET ?
            ");

            $stmt->bindValue(1, '%' . $q . '%', PDO::PARAM_STR);
            $stmt->bindValue(2, $limit, PDO::PARAM_INT);
            $stmt->bindValue(3, $offset, PDO::PARAM_INT);
            $stmt->execute();
            $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        view('main', 'layouts/pages/search/index', [
            'title' => 'Tìm kiếm: ' . $q,
            'q' => $q,
            'posts' => $posts,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'totalPosts' => $totalPosts,
            'pageCss' => ['home.css', 'about.css']
        ]);
    }
}
