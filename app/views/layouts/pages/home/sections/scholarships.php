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

  /* Swiper Mobile Styles */
  @media (max-width: 991px) {
    .scholar-swiper {
      padding-bottom: 40px !important;
      overflow: hidden;
    }

    .scholar-swiper .swiper-slide {
      width: 100%;
      height: auto;
    }

    .scholar-swiper .swiper-pagination-bullet-active {
      background: #1d76d3;
    }
  }

  /* Desktop Grid simulation since we removed Bootstrap classes to avoid Swiper conflict */
  @media (min-width: 992px) {
    .scholar-swiper {
      overflow: visible;
    }

    .scholar-swiper .swiper-wrapper {
      display: grid !important;
      grid-template-columns: repeat(3, 1fr);
      gap: 24px;
      transform: none !important;
    }

    .scholar-swiper .swiper-pagination {
      display: none !important;
    }
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
    let scholarSwiper;

    function initScholarSwiper() {
      if (window.innerWidth < 992) {
        if (!scholarSwiper) {
          scholarSwiper = new Swiper(".scholar-swiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            pagination: {
              el: ".swiper-pagination",
              clickable: true,
            },
          });
        }
      } else {
        if (scholarSwiper) {
          scholarSwiper.destroy(true, true);
          scholarSwiper = undefined;
        }
      }
    }

    initScholarSwiper();
    window.addEventListener('resize', initScholarSwiper);
  });
</script>