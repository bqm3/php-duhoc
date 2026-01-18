<?php

class HomeController
{
    public function index(): void
    {
        $pdo = Db::getInstance()->pdo();

        // an toàn hơn: dùng prepare + bind limit
        $sql = "SELECT id, title, slug, created_at
                FROM posts
                ORDER BY id DESC
                LIMIT :limit";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':limit', 20, PDO::PARAM_INT);
        $stmt->execute();

        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];

        view('main', 'layouts/pages/home/index', [
            'title'   => 'Trang chủ',
            'posts'   => $posts,
            'pageCss' => ['home.css'],
        ]);
    }
}
