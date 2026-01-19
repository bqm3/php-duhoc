<?php if (!isset($base))
  $base = ''; ?>

<!-- Newsletter Section (Only show on homepage) -->
<?php if ($relative_path === '/'): ?>
  <section class="vnpc-newsletter" style="position: relative; z-index: 10; margin-bottom: -100px; padding: 0 20px;">
    <div class="container-xxl">
      <div class="newsletter-section"
        style="position: relative; z-index: 10; width: 100%; display: flex; justify-content: center; margin-bottom: -100px; padding: 0 20px;">
        <div class="newsletter-box"
          style="width: 90%; max-width: 1000px; background-color: #FC6441; background-image: url(<?= $base ?>/assets/img/client/img_main7.png); background-size: cover; border-radius: 100px; padding: 40px 20px; box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2); text-align: center;">
          <h2 class="text-white mb-2" style="font-size: 32px; font-weight: 700;">
            Đăng Ký Nhận Thông Tin
          </h2>
          <p class="text-white mb-4" style="font-size: 16px; font-weight: 500; opacity: 0.95;">
            Nhập E-mail để đăng ký nhận thông tin học bổng du học mới nhất từ chúng tôi.
          </p>

          <form action="" method="POST" class="d-flex justify-content-center align-items-center gap-3 flex-wrap">
            <input type="email" class="form-control" placeholder="Nhập E-mail của bạn" required
              style="max-width: 450px; height: 50px; border-radius: 30px; border: 1px solid rgba(255,255,255,0.3); background: rgba(255,255,255,0.95); padding: 0 24px; font-size: 16px;">
            <button type="submit" class="btn vnpc-btn-primary"
              style="height: 50px; padding: 0 40px; border-radius: 30px; font-size: 16px; font-weight: 600; background: #2777C4; border: none;">
              Đăng Ký
            </button>
          </form>
        </div>
      </div>
  </section>
<?php endif; ?>

<!-- Footer -->
<footer class="vnpc-footer"
  style="width: 100%; background: #0C4073; color: white; padding-top: <?= ($relative_path === '/') ? '140px' : '60px' ?>; padding-bottom: 40px;">
  <div class="container-xxl">
    <div class="row g-4 mb-5">

      <!-- Office Info -->
      <div class="col-lg-4 col-md-6">
        <h4 class="mb-4" style="font-size: 20px; font-weight: 600;">Văn Phòng Tư Vấn Du Học</h4>

        <div class="d-flex align-items-center gap-2 mb-3">
          <img src="<?= $base ?>/assets/svgs/clients/ic_phone_white.svg" width="20" height="20" alt=""
            onerror="this.style.display='none'">
          <span>0979 111 222 | 0902 888 999</span>
        </div>

        <div class="mb-3">
          <strong class="d-block mb-2">Văn Phòng Tại Hà Nội</strong>
          <div class="d-flex gap-2">
            <img src="<?= $base ?>/assets/svgs/clients/ic_location_white.svg" width="16" height="20" alt=""
              onerror="this.style.display='none'">
            <span style="font-size: 14px; opacity: 0.9;">
              Số 85 Vũ Tông Phan, Phường Khương Trung, Quận Thanh Xuân, Hà Nội
            </span>
          </div>
        </div>

        <div>
          <strong class="d-block mb-2">Văn Phòng Tại TPHCM</strong>
          <div class="d-flex gap-2">
            <img src="<?= $base ?>/assets/svgs/clients/ic_location_white.svg" width="16" height="20" alt=""
              onerror="this.style.display='none'">
            <span style="font-size: 14px; opacity: 0.9;">
              Số 454 Nguyễn Thị Minh Khai, Phường 5, Quận 3, TP HCM
            </span>
          </div>
        </div>
      </div>

      <!-- Featured Links -->
      <div class="col-lg-2 col-md-6">
        <h4 class="mb-4" style="font-size: 20px; font-weight: 600;">Nổi bật</h4>
        <div class="d-flex flex-column gap-2" style="font-size: 15px; opacity: 0.9;">
          <a href="#" class="text-white text-decoration-none">Du học Úc</a>
          <a href="#" class="text-white text-decoration-none">Du học Canada</a>
          <a href="#" class="text-white text-decoration-none">Du học Thụy Sĩ</a>
          <a href="#" class="text-white text-decoration-none">Du học Mỹ</a>
        </div>
      </div>

      <!-- Scholarships -->
      <div class="col-lg-2 col-md-6">
        <h4 class="mb-4" style="font-size: 20px; font-weight: 600;">Học bổng</h4>
        <div class="d-flex flex-column gap-2" style="font-size: 15px; opacity: 0.9;">
          <a href="#" class="text-white text-decoration-none">Học bổng Úc</a>
          <a href="#" class="text-white text-decoration-none">Học bổng Canada</a>
          <a href="#" class="text-white text-decoration-none">Học bổng Thụy Sĩ</a>
          <a href="#" class="text-white text-decoration-none">Học bổng New Zealand</a>
        </div>
      </div>

      <!-- Map & Social -->
      <div class="col-lg-4 col-md-6">
        <h4 class="mb-4" style="font-size: 20px; font-weight: 600;">Bản đồ</h4>
        <div class="mb-4" style="border-radius: 8px; overflow: hidden; height: 150px;">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.344777231509!2d105.80651331153805!3d21.01888628803555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab66e64391b5%3A0xbab8be00cf4f44b7!2zNTcgSHXhu7NuaCBUaMO6YyBLaMOhbmcsIEzDoG5nIEjhuqEsIMSQ4buRbmcgxJBhLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1768300180245!5m2!1svi!2s"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>

        <h5 class="mb-3" style="font-size: 16px;">Kết nối với chúng tôi</h5>
        <div class="d-flex gap-2">
          <a href="#" class="d-flex align-items-center justify-content-center"
            style="width: 36px; height: 36px; background: rgba(255,255,255,0.1); border-radius: 50%; color: white; text-decoration: none; transition: background 0.3s;"
            onmouseover="this.style.background='rgba(255,255,255,0.2)'"
            onmouseout="this.style.background='rgba(255,255,255,0.1)'">
            <span style="font-family: sans-serif; font-weight: 600;">f</span>
          </a>
          <a href="#" class="d-flex align-items-center justify-content-center"
            style="width: 36px; height: 36px; background: rgba(255,255,255,0.1); border-radius: 50%; color: white; text-decoration: none; transition: background 0.3s;"
            onmouseover="this.style.background='rgba(255,255,255,0.2)'"
            onmouseout="this.style.background='rgba(255,255,255,0.1)'">
            <span style="font-family: sans-serif; font-weight: 600; font-size: 12px;">in</span>
          </a>
          <a href="#" class="d-flex align-items-center justify-content-center"
            style="width: 36px; height: 36px; background: rgba(255,255,255,0.1); border-radius: 50%; color: white; text-decoration: none; transition: background 0.3s;"
            onmouseover="this.style.background='rgba(255,255,255,0.2)'"
            onmouseout="this.style.background='rgba(255,255,255,0.1)'">
            <span style="font-family: sans-serif; font-weight: 600; font-size: 12px;">yt</span>
          </a>
        </div>
      </div>
    </div>

    <!-- Copyright -->
    <div class="text-center pt-4" style="border-top: 1px solid rgba(255,255,255,0.1); font-size: 14px; opacity: 0.7;">
      © <?= date('Y') ?> Bản quyền thuộc về Văn Phòng Tư Vấn Du Học
    </div>
  </div>
</footer>