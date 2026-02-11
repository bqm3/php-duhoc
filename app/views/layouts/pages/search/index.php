<?php
// app/views/layouts/pages/search/index.php
$base_url = $base ?? '';
?>

<?php partial('layouts/pages/base/base_hero', [
    'title' => 'Tìm kiếm',
    'breadcrumbs' => [
        ['label' => 'Tìm kiếm', 'url' => '']
    ]
]) ?>

<div class="container py-5">
    <div class="mb-4">
        <h4>Kết quả tìm kiếm cho: <span class="text-primary">"<?= htmlspecialchars($q) ?>"</span></h4>
        <p class="text-muted">Tìm thấy <?= $totalPosts ?> bài viết phù hợp.</p>
    </div>

    <?php if (!empty($posts)): ?>
        <div class="row g-4 mb-5">
            <?php foreach ($posts as $post): ?>
                <div class="col-lg-4 col-md-6">
                    <?php partial('layouts/partials/post_card', ['post' => $post, 'base' => $base]); ?>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <?php partial('layouts/partials/pagination', [
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'baseUrl' => $base . '/tim-kiem?q=' . urlencode($q)
        ]); ?>
    <?php else: ?>
        <div class="text-center py-5 shadow-sm rounded-4 bg-light">
            <i class="fa fa-search fa-4x text-muted mb-3"></i>
            <h3>Không tìm thấy kết quả nào</h3>
            <p class="text-muted">Thử tìm kiếm với từ khóa khác hoặc kiểm tra lại chính tả.</p>
            <div class="mt-4" style="max-width: 500px; margin: 0 auto;">
                <form action="<?= $base ?>/tim-kiem" method="GET" class="search-form-page">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control form-control-lg rounded-pill-start"
                            placeholder="Nhập từ khóa mới..." value="<?= htmlspecialchars($q) ?>">
                        <button class="btn btn-primary btn-lg rounded-pill-end" type="submit">
                            <i class="fa fa-search"></i> Tìm lại
                        </button>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>

<style>
    .rounded-pill-start {
        border-top-left-radius: 50px !important;
        border-bottom-left-radius: 50px !important;
        padding-left: 25px !important;
    }

    .rounded-pill-end {
        border-top-right-radius: 50px !important;
        border-bottom-right-radius: 50px !important;
        padding-right: 25px !important;
    }

    .search-form-page .input-group {
        filter: drop-shadow(0px 4px 10px rgba(0, 0, 0, 0.1));
    }
</style>