<?php

class ScholarshipController
{
    public function index()
    {
        $db = Db::getInstance()->pdo();

        // 1) Lấy category "hoc-bong"
        $catStmt = $db->prepare("SELECT id, name, slug FROM categories WHERE slug = ? OR id = ? LIMIT 1");
        $catStmt->execute(['hoc-bong', 4]);
        $category = $catStmt->fetch(PDO::FETCH_ASSOC);

        if (!$category) {
            Response::notFound();
            return;
        }

        // 2) Pagination & Search
        $page = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $limit = 9;
        $offset = ($page - 1) * $limit;

        // 3) Build sql
        $where = "WHERE p.category_id = ?";
        $params = [(int) $category['id']];

        if (!empty($keyword)) {
            $where .= " AND (p.title LIKE ? OR p.summary LIKE ? OR p.content LIKE ?)";
            $searchTerm = "%$keyword%";
            $params[] = $searchTerm;
            $params[] = $searchTerm;
            $params[] = $searchTerm;
        }

        // Count total
        $countSql = "SELECT COUNT(*) FROM posts p $where";
        $countStmt = $db->prepare($countSql);
        $countStmt->execute($params);
        $total = (int) $countStmt->fetchColumn();
        $totalPages = (int) ceil($total / $limit);

        // Fetch posts
        $sql = "
      SELECT p.*, u.full_name AS creator_name
      FROM posts p
      LEFT JOIN users u ON p.user_id = u.id
      $where
      ORDER BY p.created_at DESC
      LIMIT $limit OFFSET $offset
    ";
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 4) Render view
        view('main', 'layouts/pages/hocbong/index', [
            'category' => $category,
            'posts' => $posts,
            'current_page' => $page,
            'total_pages' => $totalPages,
            'total' => $total,
            'title' => 'Học bổng du học',
            'showSearch' => true,
            'pageCss' => ['about.css']
        ]);
    }
}
