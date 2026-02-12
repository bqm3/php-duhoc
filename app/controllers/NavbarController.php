<?php

class NavbarController
{
  public function getCategoryMenu($slug = 'du-hoc')
  {
    if (ob_get_length())
      ob_clean();
    header('Content-Type: application/json; charset=utf-8');

    try {
      $db = Db::getInstance()->pdo();

      // 1) lấy category theo slug
      $stmt = $db->prepare("SELECT id FROM categories WHERE slug = ? AND is_delete = 0 LIMIT 1");
      $stmt->execute([$slug]);
      $catId = (int) $stmt->fetchColumn();

      if (!$catId) {
        echo json_encode(['ok' => true, 'items' => []], JSON_UNESCAPED_UNICODE);
        exit;
      }

      // 2) lấy posts thuộc category, join theo country -> continent
      $sql = "
        SELECT
          p.id   AS post_id,
          p.title AS post_title,
          p.slug AS post_slug,
          p.country_id,

          co.id AS country_id2,
          co.name AS country_name,
          co.slug AS country_slug,
          co.continent_id,

          ct.id AS continent_id2,
          ct.name AS continent_name,
          ct.slug AS continent_slug,
          ct.display_order AS continent_order,

          co.display_order AS country_order
        FROM posts p
        JOIN countries co   ON co.id = p.country_id
        JOIN continents ct  ON ct.id = co.continent_id
        WHERE p.category_id = ? AND p.is_hidden = 0 AND p.is_delete = 0 AND co.is_delete = 0 AND ct.is_delete = 0
        ORDER BY ct.display_order ASC, co.display_order ASC, co.name ASC
      ";
      $stmt = $db->prepare($sql);
      $stmt->execute([$catId]);
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

      // 3) group theo continent
      $map = [];
      foreach ($rows as $r) {
        $contId = (int) $r['continent_id'];

        if (!isset($map[$contId])) {
          $map[$contId] = [
            'id' => $contId,
            'name' => $r['continent_name'],
            'slug' => $r['continent_slug'],
            'countries' => []
          ];
        }

        $postSlug = $r['post_slug'];
        $map[$contId]['countries'][] = [
          'id' => (int) $r['country_id2'],
          'name' => $r['country_name'],
          'slug' => $r['country_slug'],
          'post' => [
            'id' => (int) $r['post_id'],
            'title' => $r['post_title'],
            'slug' => $postSlug,
            'href' => '/' . $postSlug,
          ]
        ];
      }

      echo json_encode([
        'ok' => true,
        'items' => array_values($map),
      ], JSON_UNESCAPED_UNICODE);

      exit;
    } catch (Throwable $e) {
      http_response_code(500);
      echo json_encode(['ok' => false, 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
      exit;
    }
  }

  public static function getNavItems($base, $relative_path)
  {
    $service_href = $base . '/dich-vu';
    $is_service_active = strpos($relative_path, '/dich-vu') === 0;

    try {
      $db = Db::getInstance()->pdo();
      $svc_stmt = $db->prepare("
        SELECT slug FROM posts 
        WHERE category_id = (SELECT id FROM categories WHERE slug = 'dich-vu' AND is_delete = 0 LIMIT 1)
        AND is_hidden = 0 AND is_delete = 0
        ORDER BY updated_at DESC, created_at DESC 
        LIMIT 1
      ");
      $svc_stmt->execute();
      $latest_svc_slug = $svc_stmt->fetchColumn();

      if ($latest_svc_slug) {
        $service_href = $base . '/' . $latest_svc_slug;
        if ($relative_path === '/' . $latest_svc_slug) {
          $is_service_active = true;
        }
      }
    } catch (Throwable $e) {
    }

    return [
      ['Trang chủ', $base . '/', $relative_path === '/', 'home'],
      ['Giới thiệu', $base . '/gioi-thieu', $relative_path === '/gioi-thieu', 'about'],
      ['Du học', $base . '/du-hoc', strpos($relative_path, '/du-hoc') === 0, 'study'],
      ['Học bổng', $base . '/hoc-bong', strpos($relative_path, '/hoc-bong') === 0, 'scholarship'],
      ['Chi phí', $base . '/chi-phi', strpos($relative_path, '/chi-phi') === 0, 'cost'],
      ['Dịch vụ', $service_href, $is_service_active, 'service'],
      ['Ngoại ngữ du học', $base . '/ngoai-ngu-du-hoc', strpos($relative_path, '/ngoai-ngu-du-hoc') === 0, 'language'],
      ['Tin tức', $base . '/tin-tuc', strpos($relative_path, '/tin-tuc') === 0, 'news'],
      // Mobile only items (from topbar)
      ['Sự kiện', $base . '/su-kien', $relative_path === '/su-kien', 'event', true],
      ['Tìm trường', $base . '/tim-truong', strpos($relative_path, '/tim-truong') === 0, 'school', true],
      ['Đăng ký', $base . '/dang-ky', $relative_path === '/dang-ky', 'register', true],
      ['Tuyển dụng', $base . '/tuyen-dung', $relative_path === '/tuyen-dung', 'career', true],
      ['Liên hệ', $base . '/lien-he', $relative_path === '/lien-he', 'contact', true],
    ];
  }
}
