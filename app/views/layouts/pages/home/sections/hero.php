<?php if (!isset($base))
    $base = ''; ?>

<section class="vnpc-hero-slider-section">
    <div class="swiper heroSwiper">
        <div class="swiper-wrapper">
            <?php if (!empty($slides)): ?>
                <?php foreach ($slides as $slide): ?>
                    <div class="swiper-slide">
                        <a href="<?= htmlspecialchars($slide['link_href'] ?? 'javascript:void(0)') ?>" class="slide-link">
                            <img src="<?= $base . $slide['image_url'] ?>" alt="<?= htmlspecialchars($slide['name']) ?>"
                                class="hero-slide-img">
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

    .hero-swiper-next,
    .hero-swiper-prev {
        width: 40px !important;
        height: 40px !important;
        background: rgba(27, 153, 212, 0.15) !important;
        border-radius: 30px !important;
        display: flex !important;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    /* Inner circle layer */
    .hero-swiper-next::before,
    .hero-swiper-prev::before {
        content: '';
        position: absolute;
        width: 33.33px;
        height: 33.33px;
        background: #31A5DE;
        border-radius: 30px;
        transition: all 0.3s ease;
        z-index: 0;
    }

    /* Icon layer */
    .hero-swiper-next::after,
    .hero-swiper-prev::after {
        font-family: "Font Awesome 6 Free", "Font Awesome 5 Free";
        font-weight: 900;
        font-size: 14px !important;
        color: #FFFFFF !important;
        z-index: 1;
    }

    .hero-swiper-next::after {
        content: '\f054' !important;
        /* fa-chevron-right */
    }

    .hero-swiper-prev::after {
        content: '\f053' !important;
        /* fa-chevron-left */
    }

    .hero-swiper-next:hover::before,
    .hero-swiper-prev:hover::before {
        background: #1B99D4;
    }

    .heroSwiper:hover .hero-swiper-next,
    .heroSwiper:hover .hero-swiper-prev {
        opacity: 1;
    }

    .hero-swiper-next {
        right: 20px !important;
    }

    .hero-swiper-prev {
        left: 20px !important;
    }

    .swiper-pagination-bullet-active {
        background: #1B99D4;
    }

    @media (max-width: 768px) {

        .hero-swiper-next,
        .hero-swiper-prev {
            width: 35px !important;
            height: 35px !important;
        }

        .hero-swiper-next::before,
        .hero-swiper-prev::before {
            width: 28px;
            height: 28px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
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