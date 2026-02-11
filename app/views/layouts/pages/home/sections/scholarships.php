<style>
  /* =========================================================
   SCHOLARSHIP SECTION (ISOLATED – NO CONFLICT)
========================================================= */

  .scholar-section {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 64px 0;
  }

  /* ===== Header ===== */
  .scholar-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 24px;
  }

  .scholar-header h2 {
    font-size: 32px;
    font-weight: 800;
    color: #0e2a46;
    margin-bottom: 6px;
  }

  .scholar-header p {
    font-size: 15px;
    color: #5b6b7a;
    margin: 0;
  }

  /* ===== View more button ===== */
  .scholar-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: #1d76d3;
    color: #fff;
    padding: 10px 16px 10px 18px;
    border-radius: 999px;
    font-weight: 700;
    text-decoration: none;
    box-shadow: 0 10px 20px rgba(29, 118, 211, .25);
    transition: all .2s ease;
  }

  .scholar-btn:hover {
    background: #1663b6;
    transform: translateY(-1px);
  }

  /* ===== Card ===== */
  .scholar-card {
    background: #fff;
    border-radius: 16px;
    height: 100%;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    box-shadow: 0 12px 28px rgba(15, 23, 42, .12);
  }

  /* Mobile Adjustments */
  @media (max-width: 991px) {
    .scholar-header {
      flex-direction: column;
      align-items: center;
      text-align: center;
      gap: 16px;
    }

    .scholar-header h2 {
      font-size: 24px;
    }

    .scholar-header p {
      font-size: 14px;
    }

    .scholar-btn {
      padding: 8px 16px;
      font-size: 14px;
      gap: 8px;
    }
  }

  .scholar-swiper {
    padding-top: 10px !important;
    padding-bottom: 50px !important;
    overflow: hidden;
    height: 880px;
    /* Approximate height for 2 rows of cards + pagination */
  }

  /* Mobile height */
  @media (max-width: 767px) {
    .scholar-swiper {
      height: 950px;
      /* Cards might be taller on mobile */
    }
  }

  .scholar-swiper .swiper-slide {
    height: calc((100% - 24px) / 2) !important;
    /* Specific for 2 rows with gap */
    margin-top: 0 !important;
    margin-bottom: 24px;
  }

  /* Clip wrapper for swiper bleed if needed, but for grid we might want hidden */
  .scholar-section .container-xxl {
    /* overflow: hidden; */
  }

  .scholar-swiper .swiper-pagination {
    bottom: 0 !important;
    display: flex;
    justify-content: center;
    gap: 4px;
  }

  .scholar-swiper .swiper-pagination-bullet {
    width: 8px;
    height: 8px;
    background: #6E6E6E;
    opacity: 1;
    margin: 0 !important;
  }

  .scholar-swiper .swiper-pagination-bullet-active {
    width: 33px;
    height: 8px;
    background: #1B99D4;
    border-radius: 4px;
  }

  /* Desktop Adjustments */
  @media (min-width: 992px) {
    .scholar-swiper {
      padding-left: 2px;
      padding-right: 2px;
    }
  }

  /* Swiper Grid specifically needs these for 2 rows */
  .scholar-swiper .swiper-wrapper {
    flex-wrap: wrap;
    /* Only for older versions, actually Swiper 11 handles it usually */
  }
</style>

<section class="vnpc-section" aria-labelledby="scholarships-title">
  <section class="scholar-section" style="background-image:url('<?= $base ?>/assets/img/client/img_home13.png');"
    itemscope itemtype="https://schema.org/ItemList">

    <div class="container-xxl">

      <!-- HEADER -->
      <div class="scholar-header">
        <div>
          <h2 itemprop="name">Học Bổng Du Học</h2>
          <p itemprop="description">Cập nhật thông tin học bổng du học hấp dẫn, chính xác nhất</p>
        </div>

        <a href="<?= $base ?>/hoc-bong" class="scholar-btn">
          <span>Xem Thêm</span>
        </a>
      </div>

      <!-- SWIPER -->
      <div class="swiper scholar-swiper">
        <div class="swiper-wrapper">

          <?php if (!empty($scholarshipPosts)): ?>
            <?php foreach ($scholarshipPosts as $c): ?>
              <article class="swiper-slide" itemprop="itemListElement">
                <?php partial('layouts/partials/post_card', ['post' => $c, 'base' => $base]); ?>
              </article>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="swiper-slide text-center py-5">
              <p class="text-secondary">Đang cập nhật các chương trình học bổng mới nhất...</p>
            </div>
          <?php endif; ?>

        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const scholarSwiper = new Swiper(".scholar-swiper", {
      slidesPerView: 1,
      grid: {
        rows: 2,
        fill: 'row'
      },
      spaceBetween: 16,
      // Loop does not work with multi-row grid layout in Swiper
      loop: false,
      autoplay: {
        delay: 6000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
          grid: {
            rows: 2,
            fill: 'row'
          }
        },
        1200: {
          slidesPerView: 3,
          spaceBetween: 24,
          grid: {
            rows: 2,
            fill: 'row'
          }
        }
      },
      observer: true,
      observeParents: true,
      observeSlideChildren: true,
    });
  });
</script>