<?php
// app/views/layouts/pages/tuyendung/career_card.php
$post_url = ($base ?? '') . '/' . ($post['slug'] ?? ''); // Details use root slug
$post_title = $post['title'] ?? 'Tiêu đề bài viết';
$post_date = isset($post['created_at']) ? date('d/m/Y', strtotime($post['created_at'])) : '';
$post_excerpt = $post['summary'] ?? '';
$post_image = !empty($post['featured_image']) ? $post['featured_image'] : '';

// Handle image path
if (empty($post_image)) {
    $post_image = '/assets/img/client/placeholder.png';
}
if (strpos($post_image, 'http') !== 0 && strpos($post_image, '/') !== 0) {
    $post_image = '/' . $post_image;
}
?>

<div class="career-card position-relative">
    <div class="career-card-image-wrapper">
        <img src="<?php echo ($base ?? '') . htmlspecialchars($post_image); ?>"
            alt="<?php echo htmlspecialchars($post_title); ?>" class="career-card-image">
    </div>
    <div class="career-card-body">
        <h3 class="career-card-title">
            <a href="<?php echo htmlspecialchars($post_url); ?>" class="stretched-link">
                <?php echo htmlspecialchars($post_title); ?>
            </a>
        </h3>

        <div class="career-card-meta">
            <?php if ($post_date): ?>
                <div class="career-card-date">
                    <i class="fa-regular fa-calendar me-1"></i>
                    <?php echo htmlspecialchars($post_date); ?>
                </div>
            <?php endif; ?>
            <div class="career-card-category">
                <i class="fa-solid fa-briefcase me-1"></i>
                Tuyển dụng
            </div>
        </div>

        <?php if ($post_excerpt): ?>
            <div class="career-card-excerpt">
                <?= $post_excerpt ?>
            </div>
        <?php endif; ?>
    </div>
</div>