<?php if (!isset($base)) $base = ''; ?>
<div class="vnpc-topbar" itemscope itemtype="https://schema.org/Organization">
  <meta itemprop="name" content="VNPC">
  <meta itemprop="url" content="<?= $base ?>/">
  <meta itemprop="logo" content="<?= $base ?>/assets/images/logo.png">

  <div class="container-xxl">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 py-2">

      <div class="d-flex flex-wrap align-items-center gap-4">
        <div class="d-flex align-items-center gap-2" itemprop="openingHoursSpecification" itemscope itemtype="https://schema.org/OpeningHoursSpecification">
          <img src="<?= $base ?>/assets/svgs/clients/ic_clock.svg" width="18" height="18" alt="Giờ làm việc">
          <span>
            <time itemprop="dayOfWeek" datetime="Mo-Sa">Thứ 2 - Thứ 7</time> /
            <time itemprop="opens" datetime="08:30">8:30</time> -
            <time itemprop="closes" datetime="17:30">17:30</time>
          </span>
        </div>

        <div class="d-flex align-items-center gap-2" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
          <img src="<?= $base ?>/assets/svgs/clients/ic_location.svg" width="18" height="18" alt="Địa chỉ">
          <span itemprop="streetAddress">Số 85 Vũ Tông Phan, Phường Khương Trung, Quận Thanh Xuân, Hà Nội</span>
        </div>
      </div>

      <div class="d-flex flex-wrap align-items-center gap-3">
        <div class="d-flex align-items-center gap-2">
          <img src="<?= $base ?>/assets/svgs/clients/ic_person.svg" width="18" height="18" alt="Tài khoản">
          <a
  href="<?= $base ?>/login"
  title="Đăng nhập hoặc đăng ký"
  class="vnpc-link-auth"
>
  Đăng nhập / Đăng ký
</a>
        </div>

        <span class="vnpc-divider"></span>

        <div class="d-flex align-items-center gap-2">
          <a href="https://www.instagram.com/" target="_blank" rel="nofollow noopener" itemprop="sameAs">
            <img src="<?= $base ?>/assets/svgs/clients/ic_instagram.svg" width="18" height="18" alt="Instagram">
          </a>
          <a href="https://www.facebook.com/" target="_blank" rel="nofollow noopener" itemprop="sameAs">
            <img src="<?= $base ?>/assets/svgs/clients/ic_facebook.svg" width="18" height="18" alt="Facebook">
          </a>
          <a href="https://www.linkedin.com/" target="_blank" rel="nofollow noopener" itemprop="sameAs">
            <img src="<?= $base ?>/assets/svgs/clients/ic_linkedin.svg" width="18" height="18" alt="LinkedIn">
          </a>
          <a href="https://www.youtube.com/" target="_blank" rel="nofollow noopener" itemprop="sameAs">
            <img src="<?= $base ?>/assets/svgs/clients/ic_youtube.svg" width="18" height="18" alt="YouTube">
          </a>
        </div>
      </div>

    </div>
  </div>
</div>


<style>
.vnpc-link-auth{
  text-decoration: none;
  color: #fff;            /* xám đậm, sang hơn xanh mặc định */
  font-weight: 500;
  line-height: 1;
  transition: color .2s ease, opacity .2s ease;
}

.vnpc-link-auth:hover{
  color: #2563eb;            /* xanh brand khi hover */
  text-decoration: none;
}

.vnpc-link-auth:focus{
  outline: none;
  box-shadow: 0 0 0 2px rgba(37,99,235,.25);
  border-radius: 4px;
}

.vnpc-link-auth:active{
  opacity: .8;
}
</style>