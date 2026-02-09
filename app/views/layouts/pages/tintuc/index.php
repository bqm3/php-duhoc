<?php
// app/views/layouts/pages/tintuc/index.php
$base_url = $base ?? '';
?>

<style>
    .news-card {
        transition: all 0.3s ease;
        height: 100%;
        border: none;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .news-img {
        height: 220px;
        object-fit: cover;
        width: 100%;
    }

    .news-title {
        font-size: 1.1rem;
        font-weight: 700;
        line-height: 1.5;
        color: #2c3e50;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 3.3rem;
    }

    .news-summary {
        font-size: 0.9rem;
        color: #6c757d;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 4rem;
    }

    .pagination .page-link {
        color: #2c3e50;
        border-radius: 8px;
        margin: 0 3px;
    }

    .pagination .page-item.active .page-link {
        background-color: #ff5e00;
        border-color: #ff5e00;
        color: #fff;
    }
</style>

<?php partial('layouts/pages/base/base_hero', [
    'title' => $title ?? 'Tin tức',
    'breadcrumbs' => [
        ['label' => 'Tin tức', 'url' => '']
    ]
]) ?>

<div class="container py-5">
    <?php if (!empty($newsPosts)): ?>
        <div class="row g-4">
            <?php foreach ($newsPosts as $post): ?>
                <div class="col-lg-4 col-md-6">
                    <?php partial('layouts/partials/post_card', ['post' => $post, 'base' => $base]); ?>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <?php partial('layouts/partials/pagination', [
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'baseUrl' => $base_url . '/tin-tuc'
        ]); ?>
<?php else: ?>
        <div class="text-center py-5 shadow-sm rounded-4 bg-light">
            <i class="fa fa-newspaper-o fa-4x text-muted mb-3"></i>
            <h3>Chưa có bài viết nào</h3>
            <p class="text-muted">Chúng tôi sẽ sớm cập nhật những tin tức mới nhất.</p>
        </div>
    <?php endif; ?>
</div>