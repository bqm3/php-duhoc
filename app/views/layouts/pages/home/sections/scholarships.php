<?php if (!isset($base))
  $base = ''; ?>

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

  .scholar-btn-ico {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: rgba(255, 255, 255, .2);
    display: flex;
    align-items: center;
    justify-content: center;
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

  /* image */
  .scholar-card-img {
    position: relative;
  }

  .scholar-card-img img {
    width: 100%;
    height: 230px;
    object-fit: cover;
    display: block;
  }

  /* badge */
  .scholar-badge {
    position: absolute;
    top: 14px;
    left: 14px;
    background: #ff4d3d;
    color: #fff;
    font-size: 12px;
    font-weight: 800;
    padding: 6px 10px;
    border-radius: 8px;
  }

  /* body */
  .scholar-card-body {
    padding: 16px 18px;
    display: flex;
    flex-direction: column;
    flex: 1;
    gap: 10px;
  }

  /* rating */
  .scholar-rating {
    font-size: 13px;
    color: #64748b;
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .scholar-rating-stars {
    color: #f5b301;
    letter-spacing: 1px;
  }

  /* title */
  .scholar-title {
    font-size: 18px;
    font-weight: 800;
    line-height: 1.35;
    color: #0e2a46;
    margin: 0;
  }

  .scholar-title a {
    color: inherit;
    text-decoration: none;
  }

  .scholar-title a:hover {
    text-decoration: underline;
  }

  /* clamp */
  .scholar-clamp {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  /* meta */
  .scholar-meta {
    margin-top: auto;
    padding-top: 12px;
    border-top: 1px solid #eef2f7;
    display: flex;
    gap: 16px;
    font-size: 12px;
    color: #64748b;
    flex-wrap: wrap;
  }

  .scholar-meta span {
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }

  /* Horizontal scroll on mobile */
  @media (max-width: 991px) {
    .scholar-row-scroll {
      display: flex;
      flex-wrap: nowrap;
      overflow-x: auto;
      padding-bottom: 20px;
      -webkit-overflow-scrolling: touch;
      margin-left: -12px;
      margin-right: -12px;
      padding-left: 12px;
      padding-right: 12px;
      scrollbar-width: thin;
    }

    .scholar-row-scroll>[class*="col-"] {
      flex: 0 0 85%;
      max-width: 85%;
    }

    .scholar-row-scroll::-webkit-scrollbar {
      height: 4px;
    }

    .scholar-row-scroll::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 4px;
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
          <span class="scholar-btn-ico">
            <img src="<?= $base ?>/assets/svgs/clients/ic_home3.svg" width="18" height="18" alt="">
          </span>
        </a>
      </div>

      <!-- CARDS -->
      <div class="row g-4 scholar-row-scroll">

        <?php if (!empty($scholarshipPosts)): ?>
          <?php foreach ($scholarshipPosts as $c): ?>
            <article class="col-lg-4 col-md-6" itemprop="itemListElement">
              <?php partial('layouts/partials/post_card', ['post' => $c, 'base' => $base]); ?>
            </article>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12 text-center py-5">
            <p class="text-secondary">Đang cập nhật các chương trình học bổng mới nhất...</p>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </section>
</section>