<?php if (!isset($base))
  $base = ''; ?>

<section id="consult" class="vnpc-consult"
  style="background-image: url('<?= $base ?>/assets/img/client/img_home20.png');">
  <div class="container-xxl position-relative">
    <div class="row align-items-center">

      <!-- Left: Images -->
      <div class="col-lg-6">
        <div class="vnpc-consult-photos">
          <img class="c1" src="<?= $base ?>/assets/img/client/img_home21.png" alt="">
          <img class="c2" src="<?= $base ?>/assets/img/client/img_home22.png" alt="">
          <img class="c3" src="<?= $base ?>/assets/img/client/img_home23.png" alt="">
        </div>
      </div>

      <!-- Right: Form -->
      <div class="col-lg-6">
        <div class="vnpc-form" style="z-index: 2">
          <h3 class="vnpc-form-title mb-2">Bạn muốn đi du học</h3>
          <p class="vnpc-form-sub mb-4">Hãy trao đổi với chuyên gia tư vấn ngay hôm nay</p>

          <form id="consultation-form" method="post">
            <input type="text" name="full_name" class="form-control vnpc-input mb-3" placeholder="Họ Tên *" required>
            <input type="tel" name="phone" class="form-control vnpc-input mb-3" placeholder="Phone *" required>
            <input type="email" name="email" class="form-control vnpc-input mb-3" placeholder="E-mail *" required>
            <textarea name="message" class="form-control vnpc-input mb-4" rows="3"
              placeholder="Mong muốn của bạn"></textarea>

            <button type="submit"
              class="btn vnpc-btn-primary w-100 d-flex align-items-center justify-content-center gap-2">
              <span>Đăng ký ngay</span>
              <img src="<?= $base ?>/assets/svgs/clients/ic_home11.svg" width="12" height="11" alt="">
            </button>
          </form>

        </div>
  
        <img src="<?= $base ?>/assets/svgs/clients/ic_home10.svg" class="consult-deco" alt="">
      </div>
    </div>
  </div>
</section>