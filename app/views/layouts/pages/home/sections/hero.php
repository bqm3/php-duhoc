<?php if (!isset($base)) $base = ''; ?>

<section class="vnpc-hero-slider-section" aria-label="Hero slider">
  <div class="swiper heroSwiper">
    <div class="swiper-wrapper">
      <?php if (!empty($slides)): ?>
        <?php foreach ($slides as $slide): ?>
          <?php
            $href = trim($slide['link_href'] ?? '');
            $img  = $base . ($slide['image_url'] ?? '');
            $name = htmlspecialchars($slide['name'] ?? 'Banner', ENT_QUOTES, 'UTF-8');
            $isClickable = $href !== '';
          ?>
          <div class="swiper-slide">
            <?php if ($isClickable): ?>
              <a href="<?= htmlspecialchars($href, ENT_QUOTES, 'UTF-8') ?>" class="slide-link">
                <img src="<?= htmlspecialchars($img, ENT_QUOTES, 'UTF-8') ?>" alt="<?= $name ?>" class="hero-slide-img">
              </a>
            <?php else: ?>
              <div class="slide-link is-disabled" aria-disabled="true">
                <img src="<?= htmlspecialchars($img, ENT_QUOTES, 'UTF-8') ?>" alt="<?= $name ?>" class="hero-slide-img">
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="swiper-slide">
          <img src="<?= $base ?>/assets/img/client/img_banner.png" alt="Default Banner" class="hero-slide-img">
        </div>
      <?php endif; ?>
    </div>

    <!-- ✅ pagination riêng để không đụng slider khác -->
    <div class="swiper-pagination hero-swiper-pagination"></div>
  </div>

  <!-- ✅ Move nav OUTSIDE .heroSwiper để không bị overflow hidden cắt -->
  <div class="hero-swiper-prev" aria-label="Previous slide" role="button" tabindex="0"></div>
  <div class="hero-swiper-next" aria-label="Next slide" role="button" tabindex="0"></div>
</section>

<style>
  .vnpc-hero-slider-section {
    position: relative;
    width: 100%;
    margin-top: 0;
    /* Không dùng overflow hidden ở wrapper ngoài nếu muốn nút có thể thò ra */
  }

  .heroSwiper {
    width: 100%;
    position: relative;
    overflow: hidden; /* giữ slide không lòi */
    border-radius: 0;
  }

  .heroSwiper .swiper-slide {
    position: relative;
  }

  .slide-link {
    display: block;
    width: 100%;
  }

  .slide-link.is-disabled {
    pointer-events: none;
    cursor: default;
  }

  /* Ảnh banner: desktop full, mobile đẹp */
  .hero-slide-img {
    width: 100%;
    height: clamp(180px, 35vw, 520px);
    object-fit: cover;
    display: block;
  }

  /* ===== Pagination riêng ===== */
  .hero-swiper-pagination {
    position: absolute !important;
    left: 0;
    right: 0;
    bottom: 14px !important;
    display: flex;
    justify-content: center;
    gap: 6px;
    z-index: 5;
  }

  .hero-swiper-pagination .swiper-pagination-bullet {
    width: 8px;
    height: 8px;
    opacity: 1;
    background: rgba(255,255,255,.7);
  }

  .hero-swiper-pagination .swiper-pagination-bullet-active {
    width: 28px;
    height: 8px;
    border-radius: 999px;
    background: #1B99D4;
  }

  /* ===== Navigation Buttons (đặt ngoài swiper để không bị clip) ===== */
  .hero-swiper-next,
  .hero-swiper-prev {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 42px;
    height: 42px;
    background: rgba(27, 153, 212, 0.15);
    border-radius: 999px;
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.25s ease;
    cursor: pointer;

    /* Ẩn nhẹ, hover mới hiện rõ */
    opacity: 0.9;
  }

  /* Inner circle */
  .hero-swiper-next::before,
  .hero-swiper-prev::before {
    content: '';
    position: absolute;
    width: 34px;
    height: 34px;
    background: #31A5DE;
    border-radius: 999px;
    z-index: -1;
    transition: all 0.25s ease;
  }

  /* Icon */
  .hero-swiper-next::after,
  .hero-swiper-prev::after {
    font-family: "Font Awesome 6 Free", "Font Awesome 5 Free";
    font-weight: 900;
    font-size: 12px;
    color: #fff;
  }

  .hero-swiper-next::after { content: '\f054'; } /* chevron-right */
  .hero-swiper-prev::after { content: '\f053'; } /* chevron-left */

  .hero-swiper-next:hover::before,
  .hero-swiper-prev:hover::before {
    background: #1B99D4;
    transform: scale(1.08);
  }

  .hero-swiper-next { right: 14px; }
  .hero-swiper-prev { left: 14px; }

  /* Mobile */
  @media (max-width: 768px) {
    .hero-slide-img {
      height: clamp(170px, 52vw, 320px);
    }

    .hero-swiper-next,
    .hero-swiper-prev {
      width: 36px;
      height: 36px;
    }

    .hero-swiper-next::before,
    .hero-swiper-prev::before {
      width: 28px;
      height: 28px;
    }

    .hero-swiper-next { right: 10px; }
    .hero-swiper-prev { left: 10px; }

    .hero-swiper-pagination {
      bottom: 10px !important;
    }
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const el = document.querySelector('.heroSwiper');
    if (!el) return;

    new Swiper(el, {
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".hero-swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".hero-swiper-next",
        prevEl: ".hero-swiper-prev",
      },
      // tăng độ mượt
      speed: 600,
      // giúp tránh lỗi khi inside tab/hidden container
      observer: true,
      observeParents: true,
    });
  });
</script>
