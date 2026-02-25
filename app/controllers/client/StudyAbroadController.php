<?php

class StudyAbroadController
{
  public function detail(string $slug)
  {
    $pdo = Db::getInstance()->pdo();

    $stmt = $pdo->prepare("
      SELECT p.*, c.name AS category_name, c.slug AS category_slug, u.full_name AS creator_name, 
             ctry.name AS country_name, ctry.flag_url AS country_flag, ctry.id AS country_id,
             t.name AS tag_name, t.icon AS tag_icon
      FROM posts p
      LEFT JOIN categories c ON p.category_id = c.id
      LEFT JOIN users u ON p.user_id = u.id
      LEFT JOIN countries ctry ON p.country_id = ctry.id
      LEFT JOIN tags t ON p.tag_id = t.id
      WHERE p.slug = ? AND p.is_delete = 0
      LIMIT 1
    ");
    $stmt->execute([$slug]);
    $post = $stmt->fetch();

    if (!$post) {
      Response::notFound();
      return;
    }

    // Fetch related category posts for the country buttons
    $countryLinks = [];
    if (!empty($post['country_id'])) {
      $categoriesMap = [
        'tong-quan' => 'Tổng quan',
        'chi-phi' => 'Chi phí',
        'hoc-bong' => 'Học bổng',
        'bao-hiem-va-phuc-loi' => 'Bảo hiểm & Phúc lợi',
        'nganh-hoc-noi-tieng' => 'Ngành học nổi tiếng',
        'visa' => 'Visa'
      ];

      foreach ($categoriesMap as $catSlug => $label) {
        $stmt = $pdo->prepare("
                SELECT p.slug 
                FROM posts p 
                JOIN categories c ON p.category_id = c.id 
                WHERE p.country_id = ? AND c.slug = ? AND p.is_hidden = 0 AND p.is_delete = 0
                LIMIT 1
            ");
        $stmt->execute([$post['country_id'], $catSlug]);
        $linkPost = $stmt->fetch();
        $countryLinks[] = [
          'label' => $label,
          'slug' => $linkPost ? $linkPost['slug'] : null,
          'cat_slug' => $catSlug
        ];
      }
    }

    // ... (rest of the increase view logic)
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

    $sidebarPosts = [];
    $randomPosts = [];
    if (($post['category_slug'] ?? '') === 'tin-tuc') {
      // Get list of 3 most recent news posts (vertical sidebar)
      $stmt = $pdo->prepare("
        SELECT p.*, c.name AS category_name
        FROM posts p
        LEFT JOIN categories c ON p.category_id = c.id
        WHERE c.slug = 'tin-tuc' AND p.is_hidden = 0 AND p.is_delete = 0
        ORDER BY p.created_at DESC, p.id DESC
        LIMIT 3
      ");
      $stmt->execute();
      $sidebarPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

      // Get all news posts for the circular loop slider
      $stmt = $pdo->prepare("
        SELECT p.*, c.name AS category_name, t.name AS tag_name, t.icon AS tag_icon
        FROM posts p
        LEFT JOIN categories c ON p.category_id = c.id
        LEFT JOIN tags t ON p.tag_id = t.id
        WHERE c.slug = 'tin-tuc' AND p.is_hidden = 0 AND p.is_delete = 0
        ORDER BY p.created_at DESC, p.id DESC
      ");
      $stmt->execute();
      $randomPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    $viewPath = (($post['category_slug'] ?? '') === 'tin-tuc')
      ? 'layouts/pages/tintuc/show'
      : 'layouts/pages/detail/index';

    view('main', $viewPath, [
      'post' => $post,
      'sidebarPosts' => $sidebarPosts,
      'randomPosts' => $randomPosts,
      'countryLinks' => $countryLinks,
      'title' => $post['title'] ?? 'Chi tiết',
      'meta_title' => $post['meta_title'] ?? null,
      'meta_description' => $post['meta_description'] ?? null,
      'meta_keywords' => $post['meta_keywords'] ?? null,
      'pageCss' => ['about.css']
    ]);

  }
}
