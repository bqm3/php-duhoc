<?php
/**
 * Post Card Component
 * @param array $post The post data
 * @param string $base The base URL
 */
$base_url = $base ?? '';
$img = !empty($post['featured_image']) ? $post['featured_image'] : '/assets/img/client/placeholder.png';
if (strpos($img, 'http') !== 0 && strpos($img, '/') !== 0)
    $img = '/' . $img;

$tag_name = $post['tag_name'] ?? '';
$title = $post['title'] ?? '';
$slug = $post['slug'] ?? '';
$views = $post['count_view'] ?? 0;
$date = isset($post['created_at']) ? date('d/m/Y', strtotime($post['created_at'])) : '';
$rating = $post['rating'] ?? '4.7';
$search_count = $post['search_count'] ?? '20+';
$link = $base_url . '/' . $slug;
// Ensure no double slashes except protocol
if (strpos($link, '//') === 0) {
    $link = '/' . ltrim($link, '/');
}
?>

<div class="vnpc-post-card">
    <a href="<?= $link ?>" class="card-image-wrapper">
        <img src="<?= $base_url . $img ?>" alt="<?= htmlspecialchars($title) ?>" class="card-main-img">
        <?php if (!empty($tag_name)):
            $tag_icon = $post['tag_icon'] ?? '';
            $tag_color_class = '';
            if (strpos($tag_icon, 'text-danger') !== false || strtolower($tag_name) == 'hot')
                $tag_color_class = 'tag-danger';
            elseif (strpos($tag_icon, 'text-warning') !== false || strtolower($tag_name) == 'new')
                $tag_color_class = 'tag-warning';
            elseif (strpos($tag_icon, 'text-success') !== false)
                $tag_color_class = 'tag-success';
            elseif (strpos($tag_icon, 'text-info') !== false)
                $tag_color_class = 'tag-info';
            elseif (strpos($tag_icon, 'text-primary') !== false)
                $tag_color_class = 'tag-primary';
            ?>
            <div class="card-tag <?= $tag_color_class ?>">
                <?php if ($tag_icon): ?>
                    <i class="<?= htmlspecialchars($tag_icon) ?> me-1"></i>
                <?php endif; ?>
                <?= htmlspecialchars($tag_name) ?>
            </div>
        <?php endif; ?>
    </a>

    <div class="card-content">
        <!-- <div class="card-rating">
            <span class="stars">★★★★★</span>
            <span class="rating-val">(
                <?= $rating ?>)
            </span>
        </div> -->

        <h3 class="card-title">
            <a href="<?= $link ?>" class="stretched-link">
                <?= htmlspecialchars($title) ?>
            </a>
        </h3>

        <!-- <div class="card-footer-stats">
            <div class="stat-item">
                <i class="fa fa-eye"></i>
                <span>Người xem:
                    <?= $views ?>+
                </span>
            </div>
            <div class="stat-item">
                <i class="fa fa-calendar"></i>
                <span>
                    <?= $date ?>
                </span>
            </div>
            <div class="stat-item">
                <i class="fa fa-search"></i>
                <span>Tìm kiếm
                    <?= $search_count ?>
                </span>
            </div>
        </div> -->
    </div>
</div>

<style>
    .vnpc-post-card {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 16px;
        gap: 20px;
        background: #FFFFFF;
        box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.25);
        border-radius: 12px;
        height: 100%;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .vnpc-post-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.15);
    }

    .card-image-wrapper {
        position: relative;
        width: 100%;
        height: 260px;
        border-radius: 8px;
        overflow: hidden;
    }

    .card-main-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
    }

    .card-tag {
        position: absolute;
        top: 16px;
        left: 16px;
        background: #FE543D;
        color: #FFFFFF;
        border-radius: 4px;
        padding: 0px 10px;
        height: 32px;
        display: flex;
        align-items: center;
        font-family: 'Inter';
        font-weight: 400;
        font-size: 14px;
        text-transform: uppercase;
        z-index: 2;
        gap: 5px;
    }

    .card-tag i {
        color: #FFFFFF !important;
    }

    .card-tag.tag-warning {
        background: #FFD25D;
        color: #0E2A46;
    }

    .card-tag.tag-warning i {
        color: #0E2A46 !important;
    }

    .card-tag.tag-danger {
        background: #FE543D;
    }

    .card-tag.tag-success {
        background: #28a745;
    }

    .card-tag.tag-info {
        background: #17a2b8;
    }

    .card-tag.tag-primary {
        background: #1B99D4;
    }

    .card-content {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 0px;
        gap: 8px;
        width: 100%;
        flex: 1;
    }

    .card-rating {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 2px;
        height: 24px;
    }

    .card-rating .stars {
        color: #FFD25D;
        font-size: 14px;
    }

    .card-rating .rating-val {
        color: #4D5756;
        font-family: 'Inter';
        font-weight: 500;
        font-size: 14px;
    }

    .card-title {
        font-family: 'Farro', sans-serif;
        font-weight: 700;
        font-size: 20px;
        line-height: 30px;
        letter-spacing: 0.05em;
        text-transform: capitalize;
        color: #0E2A46;
        margin: 0;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex: 1;
    }

    .card-title a {
        color: inherit;
        text-decoration: none;
    }

    .card-footer-stats {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 12px;
        border-top: 1px solid #f0f0f0;
        margin-top: auto;
    }

    .stat-item {
        display: flex;
        align-items: center;
        gap: 5px;
        color: #4D5756;
        font-family: 'Inter';
        font-size: 12px;
    }

    .stat-item i {
        color: #0E2A46;
        font-size: 14px;
    }

    @media (max-width: 576px) {
        .card-footer-stats {
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }
    }
</style>