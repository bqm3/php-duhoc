<?php if (!isset($base))
    $base = ''; ?>

<!-- Hero / Breadcrumb Section -->
<section class="vnpc-about-hero" style="background-image: url('<?= $base ?>/assets/img/client/img_background1.png')">
    <!-- Decorative images -->
    <img src="<?= $base ?>/assets/img/client/img_home25.png" class="hero-deco h-deco-1" alt="">
    <img src="<?= $base ?>/assets/img/client/img_home28.png" class="hero-deco h-deco-2" alt="">
    <img src="<?= $base ?>/assets/img/client/img_home26.png" class="hero-deco h-deco-3" alt="">
    <img src="<?= $base ?>/assets/img/client/img_home27.png" class="hero-deco h-deco-4" alt="">

    <div class="container vnpc-about-hero-content">
        <h1 class="vnpc-about-hero-title animate-fade-in-up"><?= $title ?? 'Giới Thiệu' ?></h1>
        <div class="vnpc-breadcrumb animate-fade-in-up" style="animation-delay: 0.2s;">
            <a href="<?= $base ?>/">Trang chủ</a>
            <span class="sep">//</span>
            <span><?= $title ?? 'Giới thiệu' ?></span>
        </div>
    </div>
</section>