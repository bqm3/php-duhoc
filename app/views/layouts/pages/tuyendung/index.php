<?php
// app/views/layouts/pages/tuyendung/index.php
$base_url = $base ?? '';
?>

<?php partial('layouts/pages/base/base_hero', [
    'title' => $title ?? 'Tuyển dụng',
    'breadcrumbs' => [
        ['label' => 'Tuyển dụng', 'url' => '']
    ]
]) ?>

<div class="container py-5">
    <?php if (!empty($careerPosts)): ?>
        <div class="row g-4">
            <?php foreach ($careerPosts as $post): ?>
                <div class="col-12">
                    <?php partial('layouts/pages/tuyendung/career_card', ['post' => $post, 'base' => $base]); ?>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <?php if ($totalPages > 1): ?>
            <div class="mt-5">
                <?php partial('layouts/pages/tuyendung/pagination', [
                    'currentPage' => $currentPage,
                    'totalPages' => $totalPages,
                    'baseUrl' => $base_url . '/tuyen-dung'
                ]); ?>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="text-center py-5 shadow-sm rounded-4 bg-light">
            <i class="fa fa-briefcase fa-4x text-muted mb-3"></i>
            <h3 class="mb-3">Chưa có tin tuyển dụng nào</h3>
            <p class="text-muted mb-0">Chúng tôi sẽ sớm cập nhật các vị trí tuyển dụng mới nhất.</p>
        </div>
    <?php endif; ?>
</div>

<style>
    /* Custom styles for career listing page (VNPC Style) */
    .career-card {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        margin-bottom: 30px;
        border: 1px solid #f0f0f0;
    }

    .career-card:hover {
        box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.12);
        transform: translateY(-5px);
        border-color: #2777C4;
    }

    .career-card-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .career-card:hover .career-card-image {
        transform: scale(1.05);
    }

    .career-card-body {
        padding: 24px;
        display: flex;
        flex-direction: column;
    }

    .career-card-title {
        font-family: 'Farro', sans-serif;
        font-size: 22px;
        font-weight: 700;
        color: #0E2A46;
        margin-bottom: 12px;
        line-height: 1.4;
    }

    .career-card-title a {
        color: inherit;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .career-card-title a:hover {
        color: #2777C4;
    }

    .career-card-meta {
        display: flex;
        gap: 20px;
        margin-bottom: 15px;
        font-size: 14px;
        color: #666;
    }

    .career-card-date,
    .career-card-category {
        display: flex;
        align-items: center;
    }

    .career-card-meta i {
        color: #2777C4;
    }

    .career-card-excerpt {
        font-family: 'Inter', sans-serif;
        font-size: 16px;
        color: #4D5756;
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    @media (min-width: 992px) {
        .career-card {
            display: flex;
            flex-direction: row;
        }

        .career-card-image-wrapper {
            flex: 0 0 350px;
            max-width: 350px;
            overflow: hidden;
        }

        .career-card-image {
            height: 100%;
            min-height: 280px;
        }

        .career-card-body {
            flex: 1;
            padding: 30px 40px;
        }
    }
</style>