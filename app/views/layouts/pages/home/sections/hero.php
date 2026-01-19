<?php if (!isset($base))
  $base = ''; ?>

<section class="vnpc-hero" style="background-image:url('<?= $base ?>/assets/img/client/img_banner.png')">
  <div class="container-xxl">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <h1 class="vnpc-hero-title animate-fade-in-up">
          Tư vấn miễn phí,<br>
          cơ hội du học các trường<br>
          hàng đầu thế giới
        </h1>
        <p class="vnpc-hero-sub animate-fade-in-up" style="animation-delay: 0.2s;">Nhận học bổng, nhiều chương trình khác</p>

        <div class="vnpc-hero-search animate-fade-in-up" style="animation-delay: 0.4s;">
          <input class="form-control vnpc-input" placeholder="Nhập tên trường, thành phố bạn muốn đến">
          <button class="btn vnpc-btn-primary" type="button">
            <img src="<?= $base ?>/assets/svgs/clients/ic_search.svg" width="18" height="18" alt="">
          </button>
        </div>

        <a class="btn vnpc-btn-orange mt-4 animate-fade-in-up" style="animation-delay: 0.6s;" href="#consult">Đăng ký du học ngay</a>
      </div>

      <div class="col-lg-5 position-relative">
        <div class="vnpc-hero-photos">
          <img class="p1 animate-fade-in" style="animation-delay: 0.3s;" src="<?= $base ?>/assets/img/client/img_home4.png" alt="">
          <img class="p2 animate-fade-in" style="animation-delay: 0.4s;" src="<?= $base ?>/assets/img/client/img_home2.png" alt="">
          <img class="p3 animate-fade-in" style="animation-delay: 0.5s;" src="<?= $base ?>/assets/img/client/img_home5.png" alt="">
          <img class="p4 animate-fade-in" style="animation-delay: 0.6s;" src="<?= $base ?>/assets/img/client/img_home3.png" alt="">

          <!-- Decorative accent images -->
          <img class="p5 animate-float" src="<?= $base ?>/assets/img/client/img_home6.png" alt="">
          <img class="p6 animate-float" style="animation-delay: 0.5s;" src="<?= $base ?>/assets/img/client/img_home7.png" alt="">
          <img class="p7 animate-float" style="animation-delay: 1s;" src="<?= $base ?>/assets/img/client/img_home7.png" alt="">

          <div class="vnpc-pill vnpc-pill-left animate-slide-in-left" style="animation-delay: 0.8s;">
            <div class="d-flex flex-column">
              <div class="pill-num">+5.000</div>
              <div class="pill-text">VISA du học</div>
            </div>
            <img src="<?= $base ?>/assets/img/client/img_home1.png" alt="">
          </div>

          <div class="vnpc-pill vnpc-pill-right animate-slide-in-right" style="animation-delay: 1s;">
            <div class="pill-num blue">+2.500</div>
            <div class="pill-text dark">Đối tác</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>