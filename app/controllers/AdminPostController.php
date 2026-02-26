<?php
// app/controllers/AdminPostController.php

class AdminPostController
{

    // List all posts
    public static function index()
    {
        Auth::requirePermission('posts');

        $db = Db::getInstance()->pdo();

        // Lazy migration: Ensure user_id column exists
        try {
            $stmt = $db->prepare("SHOW COLUMNS FROM posts LIKE 'user_id'");
            $stmt->execute();
            if (!$stmt->fetch()) {
                $db->exec("ALTER TABLE posts ADD COLUMN user_id INT NULL AFTER id");
            }

            // SEO Columns
            $seoColumns = ['meta_title', 'meta_description', 'meta_keywords'];
            foreach ($seoColumns as $col) {
                $stmt = $db->prepare("SHOW COLUMNS FROM posts LIKE '$col'");
                $stmt->execute();
                if (!$stmt->fetch()) {
                    $db->exec("ALTER TABLE posts ADD COLUMN $col TEXT NULL");
                }
            }
            // Second category column
            $stmt = $db->prepare("SHOW COLUMNS FROM posts LIKE 'second_category_id'");
            $stmt->execute();
            if (!$stmt->fetch()) {
                $db->exec("ALTER TABLE posts ADD COLUMN second_category_id INT NULL AFTER category_id");
            }
        } catch (Exception $e) {
            // Ignore
        }

        // Pagination & Search Logic
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $categoryId = isset($_GET['category_id']) ? (int) $_GET['category_id'] : 0;
        $countryId = isset($_GET['country_id']) ? (int) $_GET['country_id'] : 0;
        $schoolId = isset($_GET['school_id']) ? (int) $_GET['school_id'] : 0;
        $tagId = isset($_GET['tag_id']) ? (int) $_GET['tag_id'] : 0;
        $date = isset($_GET['date']) ? trim($_GET['date']) : '';
        $dateUpdated = isset($_GET['date_updated']) ? trim($_GET['date_updated']) : '';

        $limit = 10;
        $offset = ($page - 1) * $limit;

        // Build query conditions
        $whereClause = "WHERE p.is_delete = 0";
        $params = [];

        if (!empty($keyword)) {
            $whereClause .= " AND (p.title LIKE ? OR p.slug LIKE ? OR c.name LIKE ? OR u.full_name LIKE ?)";
            $searchTerm = "%$keyword%";
            $params[] = $searchTerm;
            $params[] = $searchTerm;
            $params[] = $searchTerm;
            $params[] = $searchTerm;
        }

        if ($categoryId > 0) {
            $whereClause .= " AND p.category_id = ?";
            $params[] = $categoryId;
        }

        if ($countryId > 0) {
            $whereClause .= " AND p.country_id = ?";
            $params[] = $countryId;
        }

        if ($schoolId > 0) {
            $whereClause .= " AND p.school_id = ?";
            $params[] = $schoolId;
        }

        if ($tagId > 0) {
            $whereClause .= " AND p.tag_id = ?";
            $params[] = $tagId;
        }

        if (!empty($date)) {
            $whereClause .= " AND DATE(p.created_at) = ?";
            $params[] = $date;
        }

        if (!empty($dateUpdated)) {
            $whereClause .= " AND DATE(p.updated_at) = ?";
            $params[] = $dateUpdated;
        }

        // Fetch filter data
        $categories = $db->query("SELECT id, name FROM categories ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
        $countries = $db->query("SELECT id, name FROM countries ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
        $schools = $db->query("SELECT id, name FROM schools ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
        $tags = $db->query("SELECT id, name FROM tags ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

        // Count total records
        $countSql = "
            SELECT COUNT(*) 
            FROM posts p 
            LEFT JOIN categories c ON p.category_id = c.id 
            LEFT JOIN users u ON p.user_id = u.id
            $whereClause
        ";
        $countStmt = $db->prepare($countSql);
        $countStmt->execute($params);
        $totalRecords = $countStmt->fetchColumn();
        $totalPages = ceil($totalRecords / $limit);

        // Fetch records
        $sql = "
            SELECT p.*, c.name as category_name, c2.name as second_category_name, u.full_name as creator_name, ctry.name as country_name, s.name as school_name, t.name as tag_name, t.icon as tag_icon
            FROM posts p 
            LEFT JOIN categories c ON p.category_id = c.id 
            LEFT JOIN categories c2 ON p.second_category_id = c2.id
            LEFT JOIN users u ON p.user_id = u.id
            LEFT JOIN countries ctry ON p.country_id = ctry.id
            LEFT JOIN schools s ON p.school_id = s.id
            LEFT JOIN tags t ON p.tag_id = t.id
            $whereClause
            ORDER BY p.created_at DESC
            LIMIT $limit OFFSET $offset
        ";

        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        view('admin', 'admin/posts/index', [
            'posts' => $posts,
            'total_pages' => $totalPages,
            'current_page' => $page,
            'keyword' => $keyword,
            'current_category_id' => $categoryId,
            'current_country_id' => $countryId,
            'current_school_id' => $schoolId,
            'current_date' => $date,
            'current_date_updated' => $dateUpdated,
            'categories' => $categories,
            'countries' => $countries,
            'schools' => $schools,
            'tags' => $tags,
            'current_tag_id' => $tagId,
            'csrf' => Csrf::token()
        ]);
    }

    // Show create form
    public static function create()
    {
        Auth::requirePermission('posts');

        $selectedCategoryId = isset($_GET['category_id']) ? (int) $_GET['category_id'] : 0;

        $db = Db::getInstance()->pdo();
        $stmt = $db->query("SELECT * FROM categories ORDER BY name");
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $db->query("SELECT * FROM countries ORDER BY name");
        $countries = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $db->query("SELECT id, name FROM schools ORDER BY name");
        $schools = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $db->query("SELECT id, name FROM tags ORDER BY name");
        $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $referer = $_SERVER['HTTP_REFERER'] ?? '/admin/posts';
        // If referer is the same as create page (maybe after an error), keep the original redirect_to if passed
        $redirect_to = $_GET['redirect_to'] ?? $referer;

        view('admin', 'admin/posts/create', [
            'categories' => $categories,
            'countries' => $countries,
            'schools' => $schools,
            'tags' => $tags,
            'selected_category_id' => $selectedCategoryId,
            'redirect_to' => $redirect_to,
            'csrf' => Csrf::token()
        ]);
    }

    // Store new post
    public static function store()
    {
        Auth::requirePermission('posts');
        Csrf::verify($_POST['_csrf'] ?? '');

        $title = trim($_POST['title'] ?? '');
        $summary = $_POST['summary'] ?? '';
        $slug = self::generateSlug($_POST['slug'] ?? $title);
        $category_id = !empty($_POST['category_id']) ? (int) $_POST['category_id'] : null;
        $second_category_id = !empty($_POST['second_category_id']) ? (int) $_POST['second_category_id'] : null;
        $country_id = !empty($_POST['country_id']) ? (int) $_POST['country_id'] : null;
        $school_id = !empty($_POST['school_id']) ? (int) $_POST['school_id'] : null;
        $tag_id = !empty($_POST['tag_id']) ? (int) $_POST['tag_id'] : null;
        $is_hidden = isset($_POST['is_hidden']) ? 1 : 0;
        $content = $_POST['content'] ?? '';
        $created_at = !empty($_POST['created_at']) ? $_POST['created_at'] : date('Y-m-d H:i:s');
        $updated_at = !empty($_POST['updated_at']) ? $_POST['updated_at'] : date('Y-m-d H:i:s');

        $meta_title = trim($_POST['meta_title'] ?? '');
        $meta_description = trim($_POST['meta_description'] ?? '');
        $meta_keywords = trim($_POST['meta_keywords'] ?? '');

        $user = Auth::user();
        $user_id = $user ? $user['id'] : null;

        if (empty($title)) {
            Response::json(['error' => 'Title is required'], 400);
        }

        $featured_image = null;
        try {
            if (isset($_FILES['featured_image'])) {
                $featured_image = Upload::saveUploadedImage($_FILES['featured_image'], 'post_cover_', 'posts');
            }
        } catch (Exception $e) {
            Response::json(['error' => $e->getMessage()], 400);
            return;
        }

        $db = Db::getInstance()->pdo();

        // Validation: Kiểm tra duplicate category_id + country_id hoặc category_id + school_id
        // Chỉ kiểm tra khi có cả category_id và country_id, HOẶC cả category_id và school_id
        if ($category_id) {
            // Kiểm tra duplicate với country_id
            if ($country_id) {
                $checkStmt = $db->prepare("SELECT id FROM posts WHERE category_id = ? AND country_id = ? LIMIT 1");
                $checkStmt->execute([$category_id, $country_id]);
                if ($checkStmt->fetch()) {
                    Response::json(['error' => 'Đã tồn tại bài viết với cùng danh mục và quốc gia này. Vui lòng ẩn hoặc xóa bài viết cũ trước khi tạo mới.'], 400);
                    return;
                }
            }

            // Kiểm tra duplicate với school_id
            if ($school_id) {
                $checkStmt = $db->prepare("SELECT id FROM posts WHERE category_id = ? AND school_id = ? LIMIT 1");
                $checkStmt->execute([$category_id, $school_id]);
                if ($checkStmt->fetch()) {
                    Response::json(['error' => 'Đã tồn tại bài viết với cùng danh mục và trường học này. Vui lòng ẩn hoặc xóa bài viết cũ trước khi tạo mới.'], 400);
                    return;
                }
            }
        }

        // Check if slug exists
        $stmt = $db->prepare("SELECT id FROM posts WHERE slug = ?");
        $stmt->execute([$slug]);
        if ($stmt->fetch()) {
            $slug = $slug . '-' . time();
        }

        $stmt = $db->prepare("
            INSERT INTO posts (slug, title, summary, category_id, second_category_id, country_id, school_id, tag_id, is_hidden, content, user_id, featured_image, created_at, updated_at, meta_title, meta_description, meta_keywords) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        if ($stmt->execute([$slug, $title, $summary, $category_id, $second_category_id, $country_id, $school_id, $tag_id, $is_hidden, $content, $user_id, $featured_image, $created_at, $updated_at, $meta_title, $meta_description, $meta_keywords])) {
            $_SESSION['flash_success'] = 'Tạo bài viết mới thành công!';
            Response::json([
                'success' => true,
                'redirect_to' => $_POST['redirect_to'] ?? '/admin/posts'
            ]);
        } else {
            Response::json(['error' => 'Failed to create post'], 500);
        }
    }

    // Show edit form
    public static function edit($id)
    {
        Auth::requirePermission('posts');

        $db = Db::getInstance()->pdo();

        // Get post
        $stmt = $db->prepare("SELECT * FROM posts WHERE id = ? AND is_delete = 0");
        $stmt->execute([$id]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$post) {
            Response::notFound();
        }

        // Get categories
        $stmt = $db->query("SELECT * FROM categories ORDER BY name");
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $db->query("SELECT * FROM countries ORDER BY name");
        $countries = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $db->query("SELECT id, name FROM schools ORDER BY name");
        $schools = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $db->query("SELECT id, name FROM tags ORDER BY name");
        $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $referer = $_SERVER['HTTP_REFERER'] ?? '/admin/posts';
        $redirect_to = $_GET['redirect_to'] ?? $referer;

        view('admin', 'admin/posts/edit', [
            'post' => $post,
            'categories' => $categories,
            'countries' => $countries,
            'schools' => $schools,
            'tags' => $tags,
            'redirect_to' => $redirect_to,
            'csrf' => Csrf::token()
        ]);
    }

    // Update post
    public static function update($id)
    {
        Auth::requirePermission('posts');

        if (!Csrf::verify($_POST['_csrf'] ?? '')) {
            Response::json(['error' => 'Invalid CSRF token'], 403);
            return;
        }

        $title = trim($_POST['title'] ?? '');
        $summary = $_POST['summary'] ?? '';
        $slug = self::generateSlug($_POST['slug'] ?? $title);
        $category_id = !empty($_POST['category_id']) ? (int) $_POST['category_id'] : null;
        $second_category_id = !empty($_POST['second_category_id']) ? (int) $_POST['second_category_id'] : null;
        $country_id = !empty($_POST['country_id']) ? (int) $_POST['country_id'] : null;
        $school_id = !empty($_POST['school_id']) ? (int) $_POST['school_id'] : null;
        $tag_id = !empty($_POST['tag_id']) ? (int) $_POST['tag_id'] : null;
        $is_hidden = isset($_POST['is_hidden']) ? 1 : 0;
        $content = $_POST['content'] ?? '';
        $created_at = !empty($_POST['created_at']) ? $_POST['created_at'] : null;
        $updated_at = !empty($_POST['updated_at']) ? $_POST['updated_at'] : null;

        $meta_title = trim($_POST['meta_title'] ?? '');
        $meta_description = trim($_POST['meta_description'] ?? '');
        $meta_keywords = trim($_POST['meta_keywords'] ?? '');

        // ADMIN chỉnh tay view/share
        $count_view = isset($_POST['count_view']) ? (int) $_POST['count_view'] : 0;
        $count_share = isset($_POST['count_share']) ? (int) $_POST['count_share'] : 0;

        // chặn âm
        if ($count_view < 0)
            $count_view = 0;
        if ($count_share < 0)
            $count_share = 0;

        if (empty($title)) {
            Response::json(['error' => 'Title is required'], 400);
            return;
        }

        $db = Db::getInstance()->pdo();

        // lấy post cũ để biết ảnh cũ
        $stmt = $db->prepare("SELECT featured_image, created_at, updated_at FROM posts WHERE id = ? LIMIT 1");
        $stmt->execute([(int) $id]);
        $old = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$old) {
            Response::notFound();
            return;
        }

        if (!$created_at)
            $created_at = $old['created_at'];
        if (!$updated_at)
            $updated_at = $old['updated_at'];

        // Validation: Kiểm tra duplicate category_id + country_id hoặc category_id + school_id (trừ post hiện tại)
        // Chỉ kiểm tra khi có cả category_id và country_id, HOẶC cả category_id và school_id
        if ($category_id) {
            // Kiểm tra duplicate với country_id
            if ($country_id) {
                $checkStmt = $db->prepare("SELECT id FROM posts WHERE category_id = ? AND country_id = ? AND id != ? LIMIT 1");
                $checkStmt->execute([$category_id, $country_id, $id]);
                if ($checkStmt->fetch()) {
                    Response::json(['error' => 'Đã tồn tại bài viết khác với cùng danh mục và quốc gia này. Vui lòng ẩn hoặc xóa bài viết cũ trước khi cập nhật.'], 400);
                    return;
                }
            }

            // Kiểm tra duplicate với school_id
            if ($school_id) {
                $checkStmt = $db->prepare("SELECT id FROM posts WHERE category_id = ? AND school_id = ? AND id != ? LIMIT 1");
                $checkStmt->execute([$category_id, $school_id, $id]);
                if ($checkStmt->fetch()) {
                    Response::json(['error' => 'Đã tồn tại bài viết khác với cùng danh mục và trường học này. Vui lòng ẩn hoặc xóa bài viết cũ trước khi cập nhật.'], 400);
                    return;
                }
            }
        }

        // Check if slug exists (exclude current post)
        $stmt = $db->prepare("SELECT id FROM posts WHERE slug = ? AND id != ?");
        $stmt->execute([$slug, $id]);
        if ($stmt->fetch()) {
            $slug = $slug . '-' . time();
        }

        // upload ảnh mới nếu có
        $newFeatured = $old['featured_image'] ?? null;
        try {
            if (isset($_FILES['featured_image']) && ($_FILES['featured_image']['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE) {
                $newFeatured = Upload::saveUploadedImage($_FILES['featured_image'], 'post_cover_', 'posts');

                // (tuỳ chọn) xoá file cũ trên disk nếu thuộc uploads của mình
                if (!empty($old['featured_image']) && str_contains($old['featured_image'], '/assets/uploads/')) {
                    $path = __DIR__ . '/../../public' . parse_url($old['featured_image'], PHP_URL_PATH);
                    if (is_file($path))
                        @unlink($path);
                }
            }
        } catch (Exception $e) {
            Response::json(['error' => $e->getMessage()], 400);
            return;
        }

        $stmt = $db->prepare("
            UPDATE posts 
            SET slug = ?, title = ?, summary = ?, category_id = ?, second_category_id = ?, country_id = ?, school_id = ?, tag_id = ?, is_hidden = ?, content = ?, featured_image = ?, count_view = ?, count_share = ?, created_at = ?, updated_at = ?, meta_title = ?, meta_description = ?, meta_keywords = ?
            WHERE id = ?
        ");

        if ($stmt->execute([$slug, $title, $summary, $category_id, $second_category_id, $country_id, $school_id, $tag_id, $is_hidden, $content, $newFeatured, $count_view, $count_share, $created_at, $updated_at, $meta_title, $meta_description, $meta_keywords, $id])) {
            $_SESSION['flash_success'] = 'Cập nhật bài viết thành công!';
            Response::json([
                'success' => true,
                'redirect_to' => $_POST['redirect_to'] ?? '/admin/posts'
            ]);
        } else {
            Response::json(['error' => 'Failed to update post'], 500);
        }
    }


    // Delete post
    public static function delete($id)
    {
        Auth::requirePermission('posts');
        Csrf::verify($_POST['_csrf'] ?? '');

        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("UPDATE posts SET is_delete = 1 WHERE id = ?");

        if ($stmt->execute([$id])) {
            ob_clean();
            Response::json(['success' => true]);
            exit;
        } else {
            ob_clean();
            Response::json(['error' => 'Failed to delete post'], 500);
            exit;
        }
    }

    // /posts/{slug}
    // public static function show($slug)
    // {
    //     $db = Db::getInstance()->pdo();

    //     $stmt = $db->prepare("
    //         SELECT p.*, c.name AS category_name, u.full_name AS creator_name
    //         FROM posts p
    //         LEFT JOIN categories c ON p.category_id = c.id
    //         LEFT JOIN users u ON p.user_id = u.id
    //         WHERE p.slug = ?
    //         LIMIT 1
    //     ");
    //     $stmt->execute([$slug]);
    //     $post = $stmt->fetch(PDO::FETCH_ASSOC);

    //     if (!$post) {
    //         Response::notFound();
    //     }

    //     // Chống tăng view liên tục khi refresh: 1 session / 1 bài
    //     if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    //     $key = "viewed_post_" . $post['id'];
    //     if (empty($_SESSION[$key])) {
    //         $_SESSION[$key] = true;

    //         $up = $db->prepare("UPDATE posts SET count_view = count_view + 1 WHERE id = ?");
    //         $up->execute([$post['id']]);

    //         // cập nhật lại để view hiển thị đúng ngay trong lần render này
    //         $post['count_view'] = (int)$post['count_view'] + 1;
    //     }

    //     view('main', 'client/posts/show', [
    //         'post' => $post,
    //         'csrf' => Csrf::token()
    //     ]);
    // }

    // POST /posts/{id}/share
    public static function share($id)
    {
        // Share vẫn nên có CSRF để tránh bị spam từ site khác
        if (!Csrf::verify($_POST['_csrf'] ?? '')) {
            Response::json(['ok' => false, 'message' => 'Invalid CSRF token'], 403);
        }

        $id = (int) $id;
        if ($id <= 0)
            Response::json(['ok' => false, 'message' => 'Invalid post id'], 400);

        if (session_status() !== PHP_SESSION_ACTIVE)
            session_start();
        $key = "shared_post_" . $id;
        if (!empty($_SESSION[$key])) {
            // đã cộng rồi trong session này -> trả ok luôn (tránh spam)
            Response::json(['ok' => true, 'counted' => false]);
        }
        $_SESSION[$key] = true;

        $db = Db::getInstance()->pdo();
        $up = $db->prepare("UPDATE posts SET count_share = count_share + 1 WHERE id = ?");
        $up->execute([$id]);

        // lấy lại số share mới để trả về UI
        $stmt = $db->prepare("SELECT count_share FROM posts WHERE id = ? LIMIT 1");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        Response::json([
            'ok' => true,
            'counted' => true,
            'count_share' => (int) ($row['count_share'] ?? 0),
        ]);
    }




    // Generate slug from title
    private static function generateSlug($text)
    {
        // Convert Vietnamese characters
        $text = self::removeVietnameseTones($text);

        // Convert to lowercase
        $text = strtolower($text);

        // Remove special characters
        $text = preg_replace('/[^a-z0-9\s-]/', '', $text);

        // Replace spaces with hyphens
        $text = preg_replace('/[\s-]+/', '-', $text);

        // Trim hyphens from ends
        return trim($text, '-');
    }

    // Remove Vietnamese tones
    private static function removeVietnameseTones($str)
    {
        $vietnameseTones = [
            'à' => 'a',
            'á' => 'a',
            'ạ' => 'a',
            'ả' => 'a',
            'ã' => 'a',
            'â' => 'a',
            'ầ' => 'a',
            'ấ' => 'a',
            'ậ' => 'a',
            'ẩ' => 'a',
            'ẫ' => 'a',
            'ă' => 'a',
            'ằ' => 'a',
            'ắ' => 'a',
            'ặ' => 'a',
            'ẳ' => 'a',
            'ẵ' => 'a',
            'è' => 'e',
            'é' => 'e',
            'ẹ' => 'e',
            'ẻ' => 'e',
            'ẽ' => 'e',
            'ê' => 'e',
            'ề' => 'e',
            'ế' => 'e',
            'ệ' => 'e',
            'ể' => 'e',
            'ễ' => 'e',
            'ì' => 'i',
            'í' => 'i',
            'ị' => 'i',
            'ỉ' => 'i',
            'ĩ' => 'i',
            'ò' => 'o',
            'ó' => 'o',
            'ọ' => 'o',
            'ỏ' => 'o',
            'õ' => 'o',
            'ô' => 'o',
            'ồ' => 'o',
            'ố' => 'o',
            'ộ' => 'o',
            'ổ' => 'o',
            'ỗ' => 'o',
            'ơ' => 'o',
            'ờ' => 'o',
            'ớ' => 'o',
            'ợ' => 'o',
            'ở' => 'o',
            'ỡ' => 'o',
            'ù' => 'u',
            'ú' => 'u',
            'ụ' => 'u',
            'ủ' => 'u',
            'ũ' => 'u',
            'ư' => 'u',
            'ừ' => 'u',
            'ứ' => 'u',
            'ự' => 'u',
            'ử' => 'u',
            'ữ' => 'u',
            'ỳ' => 'y',
            'ý' => 'y',
            'ỵ' => 'y',
            'ỷ' => 'y',
            'ỹ' => 'y',
            'đ' => 'd',
            'À' => 'A',
            'Á' => 'A',
            'Ạ' => 'A',
            'Ả' => 'A',
            'Ã' => 'A',
            'Â' => 'A',
            'Ầ' => 'A',
            'Ấ' => 'A',
            'Ậ' => 'A',
            'Ẩ' => 'A',
            'Ẫ' => 'A',
            'Ă' => 'A',
            'Ằ' => 'A',
            'Ắ' => 'A',
            'Ặ' => 'A',
            'Ẳ' => 'A',
            'Ẵ' => 'A',
            'È' => 'E',
            'É' => 'E',
            'Ẹ' => 'E',
            'Ẻ' => 'E',
            'Ẽ' => 'E',
            'Ê' => 'E',
            'Ề' => 'E',
            'Ế' => 'E',
            'Ệ' => 'E',
            'Ể' => 'E',
            'Ễ' => 'E',
            'Ì' => 'I',
            'Í' => 'I',
            'Ị' => 'I',
            'Ỉ' => 'I',
            'Ĩ' => 'I',
            'Ò' => 'O',
            'Ó' => 'O',
            'Ọ' => 'O',
            'Ỏ' => 'O',
            'Õ' => 'O',
            'Ô' => 'O',
            'Ồ' => 'O',
            'Ố' => 'O',
            'Ộ' => 'O',
            'Ổ' => 'O',
            'Ỗ' => 'O',
            'Ơ' => 'O',
            'Ờ' => 'O',
            'Ớ' => 'O',
            'Ợ' => 'O',
            'Ở' => 'O',
            'Ỡ' => 'O',
            'Ù' => 'U',
            'Ú' => 'U',
            'Ụ' => 'U',
            'Ủ' => 'U',
            'Ũ' => 'U',
            'Ư' => 'U',
            'Ừ' => 'U',
            'Ứ' => 'U',
            'Ự' => 'U',
            'Ử' => 'U',
            'Ữ' => 'U',
            'Ỳ' => 'Y',
            'Ý' => 'Y',
            'Ỵ' => 'Y',
            'Ỷ' => 'Y',
            'Ỹ' => 'Y',
            'Đ' => 'D'
        ];

        return strtr($str, $vietnameseTones);
    }

    // Toggle hidden status
    public static function toggleHidden($id)
    {
        Auth::requirePermission('posts');

        if (!Csrf::verify($_POST['_csrf'] ?? '')) {
            Response::json(['error' => 'Invalid CSRF token'], 403);
            return;
        }

        $is_hidden = isset($_POST['is_hidden']) ? (int) $_POST['is_hidden'] : 0;
        $is_hidden = $is_hidden ? 1 : 0;

        $db = Db::getInstance()->pdo();
        $stmt = $db->prepare("UPDATE posts SET is_hidden = ? WHERE id = ?");

        if ($stmt->execute([$is_hidden, $id])) {
            $message = $is_hidden ? 'Đã ẩn bài viết thành công!' : 'Đã hiện bài viết thành công!';
            Response::json(['success' => true, 'message' => $message, 'is_hidden' => $is_hidden]);
        } else {
            Response::json(['error' => 'Failed to update post'], 500);
        }
    }

    // Upload image for CKEditor
    public static function uploadImage()
    {
        Auth::requirePermission('posts');

        if (!Csrf::verify($_POST['_csrf'] ?? '')) {
            if (ob_get_length())
                ob_clean();
            header('Content-Type: application/json; charset=utf-8');
            http_response_code(403);
            echo json_encode(['error' => 'Invalid CSRF token']);
            exit;
        }

        if (!isset($_FILES['upload'])) {
            if (ob_get_length())
                ob_clean();
            header('Content-Type: application/json; charset=utf-8');
            http_response_code(400);
            echo json_encode(['error' => 'No file uploaded']);
            exit;
        }

        if (($_FILES['upload']['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_OK) {
            if (ob_get_length())
                ob_clean();
            header('Content-Type: application/json; charset=utf-8');
            http_response_code(400);
            echo json_encode(['error' => 'Upload failed']);
            exit;
        }

        try {
            $url = Upload::saveUploadedImage($_FILES['upload'], 'post_', 'posts');

            if (!$url) {
                throw new Exception('Upload failed');
            }
            if (ob_get_length())
                ob_clean();
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode([
                'url' => $url,
            ]);
            exit;

        } catch (Exception $e) {
            header('Content-Type: application/json; charset=utf-8');
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
            exit;
        }
    }

}
