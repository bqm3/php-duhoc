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