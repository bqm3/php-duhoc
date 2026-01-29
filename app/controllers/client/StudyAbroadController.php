<?php

class StudyAbroadController
{
  public function detail(string $slug)
  {
    $pdo = Db::getInstance()->pdo();

    $stmt = $pdo->prepare("
      SELECT p.*, c.name AS category_name, c.slug AS category_slug, u.full_name AS creator_name, ctry.name AS country_name, t.name AS tag_name, t.icon AS tag_icon
      FROM posts p
      LEFT JOIN categories c ON p.category_id = c.id
      LEFT JOIN users u ON p.user_id = u.id
      LEFT JOIN countries ctry ON p.country_id = ctry.id
      LEFT JOIN tags t ON p.tag_id = t.id
      WHERE p.slug = ?
      LIMIT 1
    ");
    $stmt->execute([$slug]);
    $post = $stmt->fetch();

    if (!$post) {
      Response::notFound();
      return;
    }

    // Chống tăng view liên tục
    $key = "viewed_post_" . $post['id'];
    if (empty($_SESSION[$key])) {
      $_SESSION[$key] = true;
      try {
        $up = $pdo->prepare("UPDATE posts SET count_view = count_view + 1 WHERE id = ?");
        $up->execute([$post['id']]);
        $post['count_view'] = (int) $post['count_view'] + 1;
      } catch (Exception $e) {
        // Ignore
      }
    }

    view('main', 'layouts/pages/detail/index', [
      'post' => $post,
      'title' => $post['title'] ?? 'Chi tiết',
      'pageCss' => ['about.css']
    ]);

  }
}
