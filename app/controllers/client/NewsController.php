<?php

class NewsController
{
  public function index()
  {
    $pdo = Db::getInstance()->pdo();

    // 1. Get Category ID for "tin-tuc"
    $stmt = $pdo->prepare("SELECT id, name FROM categories WHERE slug = 'tin-tuc' LIMIT 1");
    $stmt->execute();
    $category = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$category) {
      Response::notFound();
      return;
    }

    $categoryId = $category['id'];

    // 2. Get the most recent post in this category
    $stmt = $pdo->prepare("
      SELECT p.*, c.name AS category_name, u.full_name AS creator_name, t.name AS tag_name, t.icon AS tag_icon
      FROM posts p
      LEFT JOIN categories c ON p.category_id = c.id
      LEFT JOIN users u ON p.user_id = u.id
      LEFT JOIN tags t ON p.tag_id = t.id
      WHERE p.category_id = ? AND p.is_hidden = 0
      ORDER BY p.created_at DESC, p.id DESC
      LIMIT 1
    ");
    $stmt->execute([$categoryId]);
    $latestPost = $stmt->fetch(PDO::FETCH_ASSOC);

    // 3. Get list of 3 most recent posts (vertical sidebar)
    $stmt = $pdo->prepare("
      SELECT p.*, c.name AS category_name
      FROM posts p
      LEFT JOIN categories c ON p.category_id = c.id
      WHERE p.category_id = ? AND p.is_hidden = 0
      ORDER BY p.created_at DESC, p.id DESC
      LIMIT 3
    ");
    $stmt->execute([$categoryId]);
    $sidebarPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 4. Get all news posts for the circular loop slider
    $stmt = $pdo->prepare("
      SELECT p.*, c.name AS category_name
      FROM posts p
      LEFT JOIN categories c ON p.category_id = c.id
      WHERE p.category_id = ? AND p.is_hidden = 0
      ORDER BY p.created_at DESC, p.id DESC
    ");
    $stmt->execute([$categoryId]);
    $randomPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    view('main', 'layouts/pages/tintuc/index', [
      'title' => $category['name'],
      'latestPost' => $latestPost,
      'sidebarPosts' => $sidebarPosts,
      'randomPosts' => $randomPosts,
      'pageCss' => ['about.css'] // Using about.css for consistent base styles if needed
    ]);
  }
}
