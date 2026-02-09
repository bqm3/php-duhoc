<?php if (!isset($base)) $base = ''; ?>

<section class="vnpc-hero-slider-section">
    <div class="swiper heroSwiper">
        <div class="swiper-wrapper">
            <?php if (!empty($slides)): ?>
                <?php foreach ($slides as $slide): ?>
                    <div class="swiper-slide">
                        <a href="<?= htmlspecialchars($slide['link_href'] ?? 'javascript:void(0)') ?>" class="slide-link">
                            <img src="<?= $base . $slide['image_url'] ?>" alt="<?= htmlspecialchars($slide['name']) ?>" class="hero-slide-img">
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Fallback if no slides -->
                <div class="swiper-slide">
                    <img src="<?= $base ?>/assets/img/client/img_banner.png" alt="Default Banner" class="hero-slide-img">
                </div>
            <?php endif; ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Navigation -->
        <div class="swiper-button-next hero-swiper-next"></div>
        <div class="swiper-button-prev hero-swiper-prev"></div>
    </div>
</section>

<style>
.vnpc-hero-slider-section {
    position: relative;
    width: 100%;
    margin-top: 0;
    overflow: hidden;
}

.heroSwiper {
    width: 100%;
    height: auto;
}

.hero-slide-img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: cover;
}

.hero-swiper-next, .hero-swiper-prev {
    color: #fff;
    background: rgba(0,0,0,0.2);
    width: 44px;
    height: 44px;
    border-radius: 50%;
}

.hero-swiper-next:after, .hero-swiper-prev:after {
    font-size: 18px;
    font-weight: bold;
}

.swiper-pagination-bullet-active {
    background: #ff5e00;
}

@media (max-width: 768px) {
    .hero-swiper-next, .hero-swiper-prev {
        display: none;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    new Swiper(".heroSwiper", {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
});
</script>
