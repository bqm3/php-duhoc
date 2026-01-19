<?php

class StudyAbroadController
{
  public function index($slug = null)
  {
    $db = Db::getInstance()->pdo();

    // 1) Lấy category gốc "du-hoc" (bạn nhớ tạo category này trong DB)
    $rootStmt = $db->prepare("SELECT id, name, slug FROM categories WHERE slug = ? LIMIT 1");
    $rootStmt->execute(['du-hoc']);
    $root = $rootStmt->fetch(PDO::FETCH_ASSOC);

    if (!$root) {
      Response::notFound();
      return;
    }

    // 2) Nếu có slug (vd: viet-nam, uc...) -> tìm category con thuộc du-hoc
    $currentCategory = null;
    if (!empty($slug)) {
      $catStmt = $db->prepare("
        SELECT id, name, slug, parent_id
        FROM categories
        WHERE slug = ?
        LIMIT 1
      ");
      $catStmt->execute([$slug]);
      $currentCategory = $catStmt->fetch(PDO::FETCH_ASSOC);

      if (!$currentCategory) {
        Response::notFound();
        return;
      }

      // category này phải thuộc nhánh du-hoc
      if (!isset($currentCategory['parent_id']) || (int)$currentCategory['parent_id'] !== (int)$root['id']) {
        Response::notFound();
        return;
      }
    }

    // 3) Pagination
    $page  = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
    $limit = 9;
    $offset = ($page - 1) * $limit;

    // 4) Build điều kiện lọc posts theo category
    $where = "WHERE 1=1";
    $params = [];

    if ($currentCategory) {
      // Lọc theo đúng category đang xem
      $where .= " AND p.category_id = ?";
      $params[] = (int)$currentCategory['id'];
    } else {
      $childStmt = $db->prepare("SELECT id FROM categories WHERE parent_id = ? ORDER BY name");
      $childStmt->execute([(int)$root['id']]);
      $childIds = array_map(fn($r) => (int)$r['id'], $childStmt->fetchAll(PDO::FETCH_ASSOC));

      if (count($childIds) > 0) {
        $in = implode(',', array_fill(0, count($childIds), '?'));
        $where .= " AND p.category_id IN ($in)";
        $params = array_merge($params, $childIds);
      } else {
        $where .= " AND 1=0";
      }
    }

    // 5) Count total
    $countSql = "SELECT COUNT(*) FROM posts p $where";
    $countStmt = $db->prepare($countSql);
    $countStmt->execute($params);
    $total = (int)$countStmt->fetchColumn();
    $totalPages = (int)ceil($total / $limit);

    // 6) Fetch posts
    $sql = "
      SELECT p.*, c.name AS category_name
      FROM posts p
      LEFT JOIN categories c ON p.category_id = c.id
      $where
      ORDER BY p.created_at DESC
      LIMIT $limit OFFSET $offset
    ";
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 7) Render view
    view('main', 'client/duhoc/index', [
      'root' => $root,
      'currentCategory' => $currentCategory,
      'posts' => $posts,
      'current_page' => $page,
      'total_pages' => $totalPages,
      'total' => $total,
    ]);
  }

  public function detail(string $slug)
  {
    $pdo = Db::getInstance()->pdo();

    $stmt = $pdo->prepare("
      SELECT p.*, c.name AS country_name, ct.name AS continent_name
      FROM posts p
      JOIN countries c ON c.id = p.country_id
      JOIN continents ct ON ct.id = c.continent_id
      WHERE p.slug = ?
      LIMIT 1
    ");
    $stmt->execute([$slug]);
    $post = $stmt->fetch();

    if (!$post) {
      Response::notFound();
      return;
    }

    view('main', 'layouts/pages/duhoc/index', ['post' => $post]);

  }
}
