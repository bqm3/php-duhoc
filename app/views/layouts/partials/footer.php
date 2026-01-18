<?php if (!isset($base)) $base = ''; ?>
<footer class="vnpc-footer mt-5">
  <div class="container-xxl py-5">
    <div class="row g-4">
      <div class="col-lg-4">
        <img src="<?= $base ?>/assets/svgs/clients/ic_traidat.svg" width="52" height="36" alt="">
        <p class="mt-3 mb-0 text-secondary">
          Công ty tư vấn du học – thông tin, học bổng, visa...
        </p>
      </div>

      <div class="col-lg-4">
        <div class="fw-semibold mb-2">Liên hệ</div>
        <div class="text-secondary">Hotline: 090x xxx xxx</div>
        <div class="text-secondary">Email: contact@domain.com</div>
      </div>

      <div class="col-lg-4">
        <div class="fw-semibold mb-2">Theo dõi</div>
        <div class="d-flex align-items-center gap-2">
          <img src="<?= $base ?>/assets/svgs/clients/ic_facebook.svg" width="18" height="18" alt="">
          <img src="<?= $base ?>/assets/svgs/clients/ic_youtube.svg" width="18" height="18" alt="">
          <img src="<?= $base ?>/assets/svgs/clients/ic_linkedin.svg" width="18" height="18" alt="">
        </div>
      </div>
    </div>

    <hr class="my-4">

    <div class="d-flex flex-wrap justify-content-between gap-2 text-secondary">
      <div>© <?= date('Y') ?> MySite. All rights reserved.</div>
      <div>Điều khoản • Bảo mật</div>
    </div>
  </div>
</footer>
