<?php
// app/views/layouts/pages/hocbong/index.php (LIST)
$title = $category['title'] ?? 'Học bổng du học';
?>

<?php
$breadcrumbs = [
    ['label' => 'Học bổng du học', 'url' => '/hoc-bong']
];
partial('layouts/pages/base/base_hero', [
    'title' => $title,
    'showSearch' => $showSearch ?? false,
    'breadcrumbs' => $breadcrumbs
]) ?>

<style>
    .scholarship-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        overflow: hidden;
    }

    .scholarship-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    }

    .card-img-wrapper {
        position: relative;
        overflow: hidden;
        padding-top: 60%;
        /* Aspect ratio */
    }

    .card-img-wrapper img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .badge-hot {
        position: absolute;
        top: 10px;
        left: 10px;
        background: #ff5e5e;
        color: white;
        padding: 3px 12px;
        border-radius: 5px;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        z-index: 2;
    }

    .rating-section {
        color: #ffc107;
        font-size: 0.85rem;
        margin-bottom: 10px;
    }

    .rating-section .score {
        color: #6c757d;
        margin-left: 5px;
    }

    .scholarship-title {
        font-size: 1.05rem;
        font-weight: 700;
        line-height: 1.4;
        color: #2c3e50;
        margin-bottom: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 2.8rem;
    }

    .card-meta {
        font-size: 0.75rem;
        color: #6c757d;
        border-top: 1px solid #f0f0f0;
        padding-top: 12px;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .meta-item i {
        font-size: 0.85rem;
    }

    /* Pagination styling */
    .pagination .page-link {
        border-radius: 50%;
        margin: 0 5px;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #007bff;
        border: 1px solid #e0e0e0;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }
</style>

<div class="container py-5">
    <div class="row g-4">
        <?php if (empty($posts)): ?>
            <div class="col-12 text-center py-5">
                <h4 class="text-muted">Chưa có bài viết học bổng nào.</h4>
            </div>
        <?php else: ?>
            <?php foreach ($posts as $post): ?>
                <div class="col-md-6 col-lg-4">
                    <?php partial('layouts/partials/post_card', ['post' => $post, 'base' => $base]); ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <?php partial('layouts/partials/pagination', [
        'currentPage' => $current_page,
        'totalPages' => $total_pages,
        'baseUrl' => $base . '/hoc-bong'
    ]); ?>
</div>