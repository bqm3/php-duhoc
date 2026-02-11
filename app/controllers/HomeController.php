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

        // Fetch slides
        $slides = [];
        try {
            $stmt = $pdo->prepare("SELECT * FROM slides WHERE is_hidden = 0 AND is_delete = 0 ORDER BY stt ASC, created_at DESC");
            $stmt->execute();
            $slides = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
        }

        // Fetch countries for consult form
        $countries = [];
        try {
            $countries = $pdo->query("SELECT id, name FROM countries ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
        }

        // Fetch popular countries for the grid
        $popularCountries = [];
        try {
            // Get category ID for 'du-hoc'
            $stmt = $pdo->prepare("SELECT id FROM categories WHERE slug = ? LIMIT 1");
            $stmt->execute(['du-hoc']);
            $catId = (int) $stmt->fetchColumn();

            if ($catId) {
                // Fetch countries and their related post slug in 'du-hoc' category
                $sql = "SELECT c.name, c.slug as country_slug, c.image_url, p.slug as post_slug 
                        FROM countries c 
                        LEFT JOIN posts p ON p.country_id = c.id AND p.category_id = ? AND p.is_hidden = 0
                        WHERE c.is_popular = 1 
                        ORDER BY c.display_order ASC, c.name ASC 
                        LIMIT 24";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$catId]);
                $popularCountries = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                // Fallback if category not found
                $popularCountries = $pdo->query("SELECT name, slug as country_slug, image_url FROM countries WHERE is_popular = 1 ORDER BY display_order ASC, name ASC LIMIT 12")->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
        }

        // Fetch random scholarships
        $scholarshipPosts = [];
        try {
            $stmt = $pdo->prepare("SELECT id FROM categories WHERE slug = ? LIMIT 1");
            $stmt->execute(['hoc-bong']);
            $scholarshipCatId = (int) $stmt->fetchColumn();

            if ($scholarshipCatId) {
                $sql = "SELECT p.title, p.slug, p.featured_image, p.created_at, p.count_view, t.name as tag_name 
                        FROM posts p 
                        LEFT JOIN tags t ON p.tag_id = t.id
                        WHERE p.category_id = ? AND p.is_hidden = 0 
                        ORDER BY RAND() LIMIT 3";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$scholarshipCatId]);
                $scholarshipPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
        }

        // Fetch 4 random international info posts (cat: du-hoc)
        $internationalInfoPosts = [];
        try {
            $stmt = $pdo->prepare("SELECT id FROM categories WHERE slug = ? LIMIT 1");
            $stmt->execute(['du-hoc']);
            $duhocCatId = (int) $stmt->fetchColumn();

            if ($duhocCatId) {
                $sql = "SELECT p.title, p.slug, p.featured_image, p.summary, p.created_at, p.count_view, t.name as tag_name 
                        FROM posts p 
                        LEFT JOIN tags t ON p.tag_id = t.id
                        WHERE p.category_id = ? AND p.is_hidden = 0 
                        ORDER BY RAND() LIMIT 4";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$duhocCatId]);
                $internationalInfoPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
        }

        // Fetch active partners
        $partners = [];
        try {
            $stmt = $pdo->prepare("SELECT * FROM partners WHERE is_hidden = 0 AND is_delete = 0 ORDER BY stt ASC, created_at DESC");
            $stmt->execute();
            $partners = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
        }

        // Fetch testimonials
        $testimonials = [];
        try {
            $stmt = $pdo->prepare("SELECT * FROM testimonials WHERE is_hidden = 0 AND is_delete = 0 ORDER BY display_order ASC, created_at DESC");
            $stmt->execute();
            $testimonials = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
        }

        view('main', 'layouts/pages/home/index', [
            'title' => 'Trang chủ',
            'posts' => $posts,
            'countries' => $countries,
            'popularCountries' => $popularCountries,
            'scholarshipPosts' => $scholarshipPosts,
            'internationalInfoPosts' => $internationalInfoPosts,
            'slides' => $slides,
            'partners' => $partners,
            'testimonials' => $testimonials,
            'pageCss' => ['home.css'],
        ]);
    }
}
