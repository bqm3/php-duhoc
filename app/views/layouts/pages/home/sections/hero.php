<?php if (!isset($base)) $base = ''; ?>

<section class="vnpc-hero" style="background-image:url('<?= $base ?>/assets/img/client/img_banner.png')">
  <div class="container-xxl">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <h1 class="vnpc-hero-title">
          Tư vấn miễn phí,<br>
          cơ hội du học các trường<br>
          hàng đầu thế giới
        </h1>
        <p class="vnpc-hero-sub">Nhận học bổng, nhiều chương trình khác</p>

        <div class="vnpc-hero-search">
          <input class="form-control vnpc-input" placeholder="Nhập tên trường, thành phố bạn muốn đến">
          <button class="btn vnpc-btn-primary" type="button">
            <img src="<?= $base ?>/assets/svgs/clients/ic_search.svg" width="18" height="18" alt="">
          </button>
        </div>

        <a class="btn vnpc-btn-orange mt-4" href="#consult">Đăng ký du học ngay</a>
      </div>

      <div class="col-lg-5 position-relative">
        <div class="vnpc-hero-photos">
          <img class="p1" src="<?= $base ?>/assets/img/client/img_home2.png" alt="">
          <img class="p2" src="<?= $base ?>/assets/img/client/img_home3.png" alt="">
          <img class="p3" src="<?= $base ?>/assets/img/client/img_home4.png" alt="">
          <img class="p4" src="<?= $base ?>/assets/img/client/img_home5.png" alt="">

          <div class="vnpc-pill vnpc-pill-left">
            <div class="pill-num">+5.000</div>
            <div class="pill-text">VISA du học</div>
            <img src="<?= $base ?>/assets/img/client/img_home1.png" alt="">
          </div>

          <div class="vnpc-pill vnpc-pill-right">
            <div class="pill-num blue">+2.500</div>
            <div class="pill-text dark">Đối tác</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
