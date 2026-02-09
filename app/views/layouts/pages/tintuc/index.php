<?php
// app/views/layouts/pages/tintuc/index.php
$base_url = $base ?? '';
?>


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