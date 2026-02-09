<?php

class CareerController
{
    public function index()
    {
        $pdo = Db::getInstance()->pdo();

        // 1. Get Category ID for "tuyen-dung"
        $stmt = $pdo->prepare("SELECT id, name FROM categories WHERE slug = 'tuyen-dung' LIMIT 1");
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$category) {
            Response::notFound();
            return;
        }

        $categoryId = $category['id'];

        // Pagination Logic
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        if ($page < 1)
            $page = 1;
        $limit = 3; // Requested limit
        $offset = ($page - 1) * $limit;

        // Count total posts
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM posts WHERE category_id = ? AND is_hidden = 0");
        $stmt->execute([$categoryId]);
        $totalPosts = (int) $stmt->fetchColumn();
        $totalPages = ceil($totalPosts / $limit);

        // Get list of posts
        $stmt = $pdo->prepare("
      SELECT p.*, c.name AS category_name, u.full_name AS creator_name, t.name AS tag_name, t.icon AS tag_icon
      FROM posts p
      LEFT JOIN categories c ON p.category_id = c.id
      LEFT JOIN users u ON p.user_id = u.id
      LEFT JOIN tags t ON p.tag_id = t.id
      WHERE p.category_id = ? AND p.is_hidden = 0
      ORDER BY p.created_at DESC, p.id DESC
      LIMIT ? OFFSET ?
    ");
        $stmt->bindValue(1, $categoryId, PDO::PARAM_INT);
        $stmt->bindValue(2, $limit, PDO::PARAM_INT);
        $stmt->bindValue(3, $offset, PDO::PARAM_INT);
        $stmt->execute();
        $careerPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        view('main', 'layouts/pages/tuyendung/index', [
            'title' => $category['name'],
            'careerPosts' => $careerPosts,
            'totalPages' => $totalPages,
            'currentPage' => $page,
            'pageCss' => ['home.css', 'about.css']
        ]);
    }
}
