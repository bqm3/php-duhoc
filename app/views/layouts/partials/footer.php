<?php if (!isset($base)) $base = ''; ?>

<?php
  // Chuẩn hoá thông tin doanh nghiệp để dùng cho schema + hiển thị
  $orgName = 'VNPC - Văn Phòng Tư Vấn Du Học';
  $phones = ['0979111222', '0902888999']; // số dạng digits để dùng tel:
  $phoneText = '0979 111 222 | 0902 888 999';

  $addrHN = 'Số 85 Vũ Tông Phan, Phường Khương Trung, Quận Thanh Xuân, Hà Nội';
  $addrHCM = 'Số 454 Nguyễn Thị Minh Khai, Phường 5, Quận 3, TP HCM';

  // NÊN: thay bằng URL thật của bạn
  $siteUrl = $base ?: '';
?>

<!-- Newsletter Section (Only show on homepage) -->
<?php if ($relative_path === '/'): ?>
  <section class="vnpc-newsletter" aria-labelledby="newsletter-title"
    style="position: relative; z-index: 10; margin-bottom: -100px; padding: 0 20px;">
    <div class="container-xxl">
      <div class="newsletter-section"
        style="position: relative; z-index: 10; width: 100%; display: flex; justify-content: center; margin-bottom: -100px; padding: 0 20px;">
        <div class="newsletter-box"
          style="width: 90%; max-width: 1000px; background-color: #FC6441; background-image: url('<?= $base ?>/assets/img/client/img_main7.png'); background-size: cover; border-radius: 100px; padding: 40px 20px; box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2); text-align: center;"
          role="region"
          aria-label="Đăng ký nhận thông tin học bổng"
        >
          <h2 id="newsletter-title" class="text-white mb-2" style="font-size: 32px; font-weight: 700;">
            Đăng ký nhận thông tin học bổng du học
          </h2>
          <p class="text-white mb-4" style="font-size: 16px; font-weight: 500; opacity: 0.95;">
            Nhập email để nhận tin học bổng, sự kiện và cập nhật mới nhất từ VNPC.
          </p>

          <form action="" method="POST"
            class="d-flex justify-content-center align-items-center gap-3 flex-wrap"
            aria-label="Form đăng ký nhận bản tin"
          >
            <label class="visually-hidden" for="newsletter-email">Email của bạn</label>
            <input
              id="newsletter-email"
              name="email"
              type="email"
              class="form-control"
              placeholder="Nhập email của bạn"
              required
              autocomplete="email"
              inputmode="email"
              aria-required="true"
              style="max-width: 450px; height: 50px; border-radius: 30px; border: 1px solid rgba(255,255,255,0.3); background: rgba(255,255,255,0.95); padding: 0 24px; font-size: 16px;"
            />
            <button type="submit" class="btn vnpc-btn-primary"
              style="height: 50px; padding: 0 40px; border-radius: 30px; font-size: 16px; font-weight: 600; background: #2777C4; border: none;">
              Đăng ký
            </button>

            <!-- Optional (nice-to-have): consent text -->
            <p class="text-white mb-0" style="font-size: 12px; opacity: .9; width: 100%;">
              Bằng việc đăng ký, bạn đồng ý nhận email từ VNPC. Bạn có thể hủy đăng ký bất cứ lúc nào.
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<!-- Footer -->
<footer class="vnpc-footer"
  style="width: 100%; background: #0C4073; color: white; padding-top: <?= ($relative_path === '/') ? '140px' : '60px' ?>; padding-bottom: 40px;"
  aria-labelledby="footer-title"
>
  <div class="container-xxl">

    <!-- Schema.org: LocalBusiness (SEO local + Knowledge Panel) -->
    <div class="visually-hidden" itemscope itemtype="https://schema.org/LocalBusiness">
      <meta itemprop="name" content="<?= htmlspecialchars($orgName) ?>">
      <meta itemprop="url" content="<?= htmlspecialchars($siteUrl ?: '/') ?>">
      <meta itemprop="telephone" content="<?= htmlspecialchars($phones[0]) ?>">
      <meta itemprop="telephone" content="<?= htmlspecialchars($phones[1]) ?>">
      <div itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
        <meta itemprop="streetAddress" content="<?= htmlspecialchars($addrHN) ?>">
        <meta itemprop="addressLocality" content="Hà Nội">
        <meta itemprop="addressCountry" content="VN">
      </div>
      <div itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
        <meta itemprop="streetAddress" content="<?= htmlspecialchars($addrHCM) ?>">
        <meta itemprop="addressLocality" content="TP Hồ Chí Minh">
        <meta itemprop="addressCountry" content="VN">
      </div>
    </div>

    <h2 id="footer-title" class="visually-hidden">Thông tin liên hệ và liên kết nhanh</h2>

    <div class="row g-4 mb-5">

      <!-- Office Info -->
      <div class="col-lg-4 col-md-6">
        <h3 class="mb-4" style="font-size: 20px; font-weight: 600;">Văn phòng tư vấn du học</h3>

        <div class="d-flex align-items-center gap-2 mb-3">
          <img src="<?= $base ?>/assets/svgs/clients/ic_phone_white.svg" width="20" height="20"
            alt="Điện thoại" onerror="this.style.display='none'" loading="lazy" decoding="async">
          <span>
            <a class="text-white text-decoration-none" href="tel:<?= $phones[0] ?>"><?= htmlspecialchars(substr($phoneText, 0, 12)) ?></a>
            <span style="opacity:.7;"> | </span>
            <a class="text-white text-decoration-none" href="tel:<?= $phones[1] ?>"><?= htmlspecialchars(substr($phoneText, 15)) ?></a>
          </span>
        </div>

        <address class="mb-3" style="font-style: normal;">
          <strong class="d-block mb-2">Văn phòng tại Hà Nội</strong>
          <div class="d-flex gap-2">
            <img src="<?= $base ?>/assets/svgs/clients/ic_location_white.svg" width="16" height="20"
              alt="Địa chỉ" onerror="this.style.display='none'" loading="lazy" decoding="async">
            <span style="font-size: 14px; opacity: 0.9;">
              <?= htmlspecialchars($addrHN) ?>
            </span>
          </div>
        </address>

        <address style="font-style: normal;">
          <strong class="d-block mb-2">Văn phòng tại TP.HCM</strong>
          <div class="d-flex gap-2">
            <img src="<?= $base ?>/assets/svgs/clients/ic_location_white.svg" width="16" height="20"
              alt="Địa chỉ" onerror="this.style.display='none'" loading="lazy" decoding="async">
            <span style="font-size: 14px; opacity: 0.9;">
              <?= htmlspecialchars($addrHCM) ?>
            </span>
          </div>
        </address>
      </div>

      <!-- Featured Links -->
      <nav class="col-lg-2 col-md-6" aria-label="Liên kết nổi bật">
        <h3 class="mb-4" style="font-size: 20px; font-weight: 600;">Nổi bật</h3>
        <div class="d-flex flex-column gap-2" style="font-size: 15px; opacity: 0.9;">
          <!-- NÊN: thay href bằng link thật -->
          <a href="<?= $base ?>/du-hoc-uc" class="text-white text-decoration-none">Du học Úc</a>
          <a href="<?= $base ?>/du-hoc-canada" class="text-white text-decoration-none">Du học Canada</a>
          <a href="<?= $base ?>/du-hoc-thuy-si" class="text-white text-decoration-none">Du học Thụy Sĩ</a>
          <a href="<?= $base ?>/du-hoc-my" class="text-white text-decoration-none">Du học Mỹ</a>
        </div>
      </nav>

      <!-- Scholarships -->
      <nav class="col-lg-2 col-md-6" aria-label="Liên kết học bổng">
        <h3 class="mb-4" style="font-size: 20px; font-weight: 600;">Học bổng</h3>
        <div class="d-flex flex-column gap-2" style="font-size: 15px; opacity: 0.9;">
          <!-- NÊN: thay href bằng link thật -->
          <a href="<?= $base ?>/hoc-bong-uc" class="text-white text-decoration-none">Học bổng Úc</a>
          <a href="<?= $base ?>/hoc-bong-canada" class="text-white text-decoration-none">Học bổng Canada</a>
          <a href="<?= $base ?>/hoc-bong-thuy-si" class="text-white text-decoration-none">Học bổng Thụy Sĩ</a>
          <a href="<?= $base ?>/hoc-bong-new-zealand" class="text-white text-decoration-none">Học bổng New Zealand</a>
        </div>
      </nav>

      <!-- Map & Social -->
      <div class="col-lg-4 col-md-6">
        <h3 class="mb-4" style="font-size: 20px; font-weight: 600;">Bản đồ</h3>

        <div class="mb-4" style="border-radius: 8px; overflow: hidden; height: 150px;">
          <iframe
            title="Bản đồ văn phòng VNPC"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.344777231509!2d105.80651331153805!3d21.01888628803555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab66e64391b5%3A0xbab8be00cf4f44b7!2zNTcgSHXhu7NuaCBUaMO6YyBLaMOhbmcsIEzDoG5nIEjhuqEsIMSQ4buRbmcgxJBhLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1768300180245!5m2!1svi!2s"
            width="100%" height="100%" style="border:0;"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>

        <h4 class="mb-3" style="font-size: 16px;">Kết nối với chúng tôi</h4>

        <div class="d-flex gap-2" aria-label="Mạng xã hội">
          <!-- NÊN: thay href link thật -->
          <a href="https://facebook.com/" target="_blank" rel="nofollow noopener"
            class="social-btn" aria-label="Facebook">
            <span style="font-family: sans-serif; font-weight: 700;">f</span>
          </a>

          <a href="https://www.linkedin.com/" target="_blank" rel="nofollow noopener"
            class="social-btn" aria-label="LinkedIn">
            <span style="font-family: sans-serif; font-weight: 700; font-size: 12px;">in</span>
          </a>

          <a href="https://www.youtube.com/" target="_blank" rel="nofollow noopener"
            class="social-btn" aria-label="YouTube">
            <span style="font-family: sans-serif; font-weight: 700; font-size: 12px;">yt</span>
          </a>
        </div>
      </div>
    </div>

    <div class="text-center pt-4"
      style="border-top: 1px solid rgba(255,255,255,0.1); font-size: 14px; opacity: 0.7;">
      © <?= date('Y') ?> Bản quyền thuộc về <?= htmlspecialchars($orgName) ?>.
    </div>
  </div>
</footer>

<style>
/* nếu project bạn đã có sẵn visually-hidden thì bỏ đoạn này */
.visually-hidden{
  position:absolute !important;
  width:1px; height:1px;
  padding:0; margin:-1px;
  overflow:hidden; clip:rect(0,0,0,0);
  white-space:nowrap; border:0;
}

.social-btn{
  width:36px; height:36px;
  display:flex; align-items:center; justify-content:center;
  background:rgba(255,255,255,0.1);
  border-radius:50%;
  color:#fff;
  text-decoration:none;
  transition:background .25s ease, transform .25s ease;
}
.social-btn:hover{ background:rgba(255,255,255,0.2); transform:translateY(-1px); }
.social-btn:focus{ outline:2px solid rgba(255,255,255,.55); outline-offset:3px; }
</style>
