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

        <a href="<?= $base ?>/hoc-bong-du-hoc" class="scholar-btn">
          <span>Xem Thêm</span>
          <span class="scholar-btn-ico">
            <img src="<?= $base ?>/assets/svgs/clients/ic_home3.svg" width="18" height="18" alt="">
          </span>
        </a>
      </div>

      <!-- CARDS -->
      <div class="row g-4">

        <!-- CARD -->
        <?php
        $cards = [
          [
            'title' => 'Sẵn sàng trở thành chủ nhân học bổng vùng Regional của Úc lên đến 15000 AUD',
            'link' => '/hoc-bong/hoc-bong-regional-uc-15000-aud',
            'img' => 'https://placehold.co/640x420'
          ],
          [
            'title' => 'Tham dự hội thảo du học: Cơ hội nhận học bổng 14.000 AUD/Năm tại La Trobe Sydney',
            'link' => '/hoc-bong/hoc-bong-la-trobe-sydney-14000-aud',
            'img' => 'https://placehold.co/640x420'
          ],
          [
            'title' => 'Các loại học bổng du học THPT Mỹ và điều kiện xin học bổng',
            'link' => '/hoc-bong/hoc-bong-thpt-my',
            'img' => 'https://placehold.co/640x420'
          ]
        ];
        foreach ($cards as $i => $c): ?>
          <article class="col-lg-4 col-md-6" itemprop="itemListElement">
            <div class="scholar-card">

              <div class="scholar-card-img">
                <img src="<?= $c['img'] ?>" alt="<?= htmlspecialchars($c['title']) ?>">
                <span class="scholar-badge">HOT</span>
              </div>

              <div class="scholar-card-body">

                <div class="scholar-rating">
                  <span class="scholar-rating-stars">★★★★★</span>
                  <span>(4.7)</span>
                </div>

                <h3 class="scholar-title scholar-clamp">
                  <a href="<?= $base . $c['link'] ?>">
                    <?= $c['title'] ?>
                  </a>
                </h3>

                <div class="scholar-meta">
                  <span>👁️ 10+</span>
                  <span>📅 30/12/2025</span>
                  <span>🔍 20+</span>
                </div>

              </div>
            </div>
          </article>
        <?php endforeach; ?>

      </div>
    </div>
  </section>
</section>