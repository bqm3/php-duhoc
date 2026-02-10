<?php

class SchoolController
{
    public function index()
    {
        $pdo = Db::getInstance()->pdo();

        // 1. Get filter parameters
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $countryId = isset($_GET['country_id']) ? (int) $_GET['country_id'] : 0;
        $cityId = isset($_GET['city_id']) ? (int) $_GET['city_id'] : 0;
        $eduLevelId = isset($_GET['edu_level_id']) ? (int) $_GET['edu_level_id'] : 0;

        // 2. Pagination Logic
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        if ($page < 1)
            $page = 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;

        // 3. Build WHERE clause
        $where = ["s.is_delete = 0"];
        $params = [];

        if ($keyword !== '') {
            $where[] = "s.name LIKE ?";
            $params[] = "%$keyword%";
        }
        if ($countryId > 0) {
            $where[] = "s.country_id = ?";
            $params[] = $countryId;
        }
        if ($cityId > 0) {
            $where[] = "s.city_id = ?";
            $params[] = $cityId;
        }
        if ($eduLevelId > 0) {
            $where[] = "s.education_level_id = ?";
            $params[] = $eduLevelId;
        }

        $whereClause = implode(" AND ", $where);

        // 4. Count total schools
        $countSql = "SELECT COUNT(*) FROM schools s WHERE $whereClause";
        $stmt = $pdo->prepare($countSql);
        $stmt->execute($params);
        $totalSchools = (int) $stmt->fetchColumn();
        $totalPages = ceil($totalSchools / $limit);

        // 5. Fetch schools with relations
        $sql = "
            SELECT 
                s.*, 
                co.name as country_name, 
                ci.name as city_name, 
                el.name as education_level_name
            FROM schools s
            LEFT JOIN countries co ON s.country_id = co.id
            LEFT JOIN cities ci ON s.city_id = ci.id
            LEFT JOIN education_levels el ON s.education_level_id = el.id
            WHERE $whereClause
            ORDER BY s.created_at DESC
            LIMIT ? OFFSET ?
        ";

        $executionParams = array_merge($params, [$limit, $offset]);
        $stmt = $pdo->prepare($sql);
        $stmt->execute($executionParams);
        $schools = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 6. Fetch filter data
        $countries = $pdo->query("SELECT id, name FROM countries WHERE is_delete = 0 ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);
        $cities = $countryId > 0
            ? $pdo->prepare("SELECT id, name FROM cities WHERE country_id = ? AND is_delete = 0 ORDER BY name ASC")
            : null;
        if ($cities)
            $cities->execute([$countryId]);
        $citiesList = $cities ? $cities->fetchAll(PDO::FETCH_ASSOC) : [];

        $eduLevels = $pdo->query("SELECT id, name FROM education_levels WHERE is_delete = 0 ORDER BY display_order ASC")->fetchAll(PDO::FETCH_ASSOC);

        view('main', 'layouts/pages/schools/index', [
            'title' => 'Tìm trường',
            'schools' => $schools,
            'totalPages' => $totalPages,
            'currentPage' => $page,
            'pageCss' => ['schools.css', 'about.css'],
            'filters' => [
                'keyword' => $keyword,
                'country_id' => $countryId,
                'city_id' => $cityId,
                'edu_level_id' => $eduLevelId
            ],
            'filterData' => [
                'countries' => $countries,
                'cities' => $citiesList,
                'eduLevels' => $eduLevels
            ]
        ]);
    }

    public function detail(string $slug)
    {
        $pdo = Db::getInstance()->pdo();

        // 1. Fetch school details
        $stmt = $pdo->prepare("
            SELECT s.*, co.name as country_name, ci.name as city_name, el.name as education_level_name
            FROM schools s
            LEFT JOIN countries co ON s.country_id = co.id
            LEFT JOIN cities ci ON s.city_id = ci.id
            LEFT JOIN education_levels el ON s.education_level_id = el.id
            WHERE s.slug = ? AND s.is_delete = 0
            LIMIT 1
        ");
        $stmt->execute([$slug]);
        $school = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$school) {
            Response::notFound();
            return;
        }

        // 2. Fetch related category posts for the school buttons
        $schoolLinks = [];
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
                SELECT p.slug, p.title, p.content
                FROM posts p 
                JOIN categories c ON p.category_id = c.id 
                WHERE p.school_id = ? AND c.slug = ? AND p.is_hidden = 0 AND p.is_delete = 0
                LIMIT 1
            ");
            $stmt->execute([$school['id'], $catSlug]);
            $linkPost = $stmt->fetch();
            $schoolLinks[] = [
                'label' => $label,
                'slug' => $linkPost ? $linkPost['slug'] : null,
                'title' => $linkPost ? $linkPost['title'] : null,
                'content' => $linkPost ? $linkPost['content'] : null,
                'cat_slug' => $catSlug
            ];
        }

        view('main', 'layouts/pages/schools/detail', [
            'school' => $school,
            'schoolLinks' => $schoolLinks,
            'title' => $school['name'] ?? 'Chi tiết trường',
            'pageCss' => ['about.css']
        ]);
    }
}
