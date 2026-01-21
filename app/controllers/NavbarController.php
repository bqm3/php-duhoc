<?php

class NavbarController
{
  public function getStudyAbroadMenu()
  {
    if (ob_get_length())
      ob_clean();
    header('Content-Type: application/json; charset=utf-8');

    try {
      $db = Db::getInstance()->pdo();

      // 1) lấy category du-hoc
      $stmt = $db->prepare("SELECT id FROM categories WHERE slug = ? LIMIT 1");
      $stmt->execute(['du-hoc']);
      $catId = (int) $stmt->fetchColumn();

      if (!$catId) {
        echo json_encode(['ok' => true, 'items' => []], JSON_UNESCAPED_UNICODE);
        exit;
      }

      // 2) lấy posts thuộc category du-hoc, join theo country -> continent
      // mỗi country chỉ có 1 post du học theo country đó
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
        WHERE p.category_id = ?
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

        $postSlug = $r['post_slug']; // vd: du-hoc-viet-nam
        $map[$contId]['countries'][] = [
          'id' => (int) $r['country_id2'],
          'name' => $r['country_name'],
          'slug' => $r['country_slug'],
          'post' => [
            'id' => (int) $r['post_id'],
            'title' => $r['post_title'],
            'slug' => $postSlug,
            'href' => '/' . $postSlug, // <<< LINK ĐÚNG theo yêu cầu
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

}
