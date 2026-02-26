<style>
  .process-container {
    position: relative;
    width: 100%;
    max-width: 1240px;
    margin: 0 auto;
    height: 650px;
  }

  /* Desktop Styles */
  @media (min-width: 1200px) {
    .vnpc-step-item {
      position: absolute;
      top: 260px;
      width: 194px;
    }

    .loc-ico {
      left: calc(50% - 590px) !important;
      top: 204px !important;
    }

    .tar-ico {
      left: calc(50% + 540.5px) !important;
      top: 194.7px !important;
    }

    .vnpc-step-item {
      transition: all 0.3s ease;
    }

    .vnpc-step-item:hover {
      transform: translateY(-10px);
    }

    /* Vector 7 decorative line */
    .vector-7 {
      position: absolute;
      width: 1155.5px;
      height: 0px;
      left: calc(50% - 590px);
      top: 220px;
      border-top: 1px solid #FFFFFF;
      opacity: 0.8;
      z-index: 1;
    }

    .timeline-svg {
      top: 199px !important;
      /* Move back to original position to create separation */
    }

    .dotted-svg {
      top: 220px !important;
      height: 40px !important;
    }

    .step-ring-bg {
      box-shadow: 0 0 15px currentColor;
    }

    .p-h-main {
      font-family: Sora, sans-serif !important;
      font-weight: 700 !important;
    }

    .p-num-big {
      font-family: Sora, sans-serif !important;
      text-shadow: 0 4px 20px rgba(0, 0, 0, 0.4) !important;
    }

    .step-card-h {
      margin-top: 45px !important;
      font-family: Sora, sans-serif !important;
      font-size: 18px !important;
      font-weight: 700 !important;
      margin-bottom: 12px !important;
    }

    .step-card-p {
      margin-top: 0 !important;
      font-size: 14px !important;
      line-height: 1.5 !important;
      color: #4D5756 !important;
    }
  }

  .mobile-process-title h2 {
    font-weight: 800;
    font-family: Sora, sans-serif;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
  }

  @media (max-width: 1199px) {
    .process-container {
      height: auto;
      padding: 40px 15px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .p-h-sub,
    .p-num-big,
    .p-h-main,
    .p-h-img,
    .p-deco-1,
    .p-deco-2,
    .loc-ico,
    .tar-ico,
    .timeline-svg,
    .dotted-svg,
    .p-img-1,
    .p-img-2,
    .step-ring-bg,
    .step-ring-white {
      display: none !important;
    }

    .vnpc-step-item {
      position: static !important;
      width: 100% !important;
      max-width: 500px;
      margin-bottom: 30px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .step-card {
      width: 100% !important;
      position: static !important;
      padding: 20px !important;
    }

    .step-ring-inner {
      position: static !important;
      margin-top: -15px;
      margin-bottom: 20px;
      order: -1;
    }

    .vnpc-process {
      padding: 60px 0;
    }

    /* Add a visible title for mobile since we hid the decorative ones */
    .mobile-process-title {
      display: block !important;
      color: #fff;
      text-align: center;
      margin-bottom: 40px;
      z-index: 2;
      position: relative;
    }
  }

  @media (min-width: 1200px) {
    .mobile-process-title {
      display: none !important;
    }
  }
</style>

<section class="vnpc-process" style="background-image: url('<?= $base ?>/assets/img/client/img_home18.png');"
  aria-labelledby="process-title">
  <div class="vnpc-process-overlay" aria-hidden="true"></div>

  <div class="mobile-process-title">
    <h2 class="vnpc-h2 text-white">Hành trình 6 bước du học</h2>
  </div>

  <div class="process-container">
    <img src="<?= $base ?>/assets/img/client/img_home12.png" class="p-deco-1" alt="" aria-hidden="true" loading="lazy">
    <img src="<?= $base ?>/assets/svgs/clients/ic_home8.svg" class="p-deco-2" alt="" aria-hidden="true" loading="lazy">

    <div class="p-h-sub" aria-hidden="true">hành<br>trình</div>
    <div class="p-num-big" aria-hidden="true">6</div>
    <div class="p-h-main">Bước<br>du học cùng tôi</div>

    <img src="<?= $base ?>/assets/img/client/img_home16.png" class="p-h-img" alt="Minh họa hành trình du học 6 bước"
      loading="lazy">

    <img src="<?= $base ?>/assets/svgs/clients/ic_location_2.svg" class="loc-ico" alt="" aria-hidden="true"
      loading="lazy">
    <img src="<?= $base ?>/assets/svgs/clients/ic_home9.svg" class="tar-ico" alt="" aria-hidden="true" loading="lazy">

    <div class="vector-7" aria-hidden="true"></div>

    <svg class="timeline-svg" viewBox="0 0 1229 6" fill="none" aria-hidden="true">
      <defs>
        <linearGradient id="line-gradient" x1="0%" y1="0%" x2="100%" y2="0%">
          <stop offset="0%" stop-color="#2FC7A1" />
          <stop offset="100%" stop-color="#FE543D" />
        </linearGradient>
      </defs>
      <line x1="0" y1="3" x2="1229" y2="3" stroke="url(#line-gradient)" stroke-width="3" stroke-linecap="round" />
    </svg>

    <?php
    $steps = [
      ['id' => '01', 'left' => 'calc(50% - 639px)', 'dot' => 'calc(50% - 543px)', 'title' => 'Đăng ký<br>thông tin cơ bản', 'desc' => 'Điền thông tin cá nhân, tài chính, nguyện vọng và khả năng ngoại ngữ.', 'color' => '#2FC7A1'],
      ['id' => '02', 'left' => 'calc(50% - 422px)', 'dot' => 'calc(50% - 326px)', 'title' => 'Đăng ký mã<br>hồ sơ', 'desc' => 'Đăng ký mã hồ sơ du học để có tên trên hệ thống và nhận hỗ trợ.', 'color' => '#66CC88'],
      ['id' => '03', 'left' => 'calc(50% - 205px)', 'dot' => 'calc(50% - 109px)', 'title' => 'Tư vấn<br>chuyên sâu', 'desc' => 'Đánh giá hồ sơ, tư vấn trường, ngành, xin thư mời nhập học, xin học bổng.', 'color' => '#A3D16B'],
      ['id' => '04', 'left' => 'calc(50% + 12px)', 'dot' => 'calc(50% + 108px)', 'title' => 'Xin Visa', 'desc' => 'Hoàn thiện hồ sơ, luyện phỏng vấn xin visa, học bổng và hướng dẫn đóng phí.', 'color' => '#E0D64F'],
      ['id' => '05', 'left' => 'calc(50% + 229px)', 'dot' => 'calc(50% + 325px)', 'title' => 'Nhận Visa', 'desc' => 'Hướng dẫn trước bay, thanh lý hợp đồng du học, nhận visa và chụp ảnh lưu niệm.', 'color' => '#FFA833'],
      ['id' => '06', 'left' => 'calc(50% + 446px)', 'dot' => 'calc(50% + 542px)', 'title' => 'Hỗ trợ<br>quá trình học', 'desc' => 'Hỗ trợ trong suốt quá trình học: định hướng, hòa nhập, xử lý tình huống và kết nối nhà trường.', 'color' => '#FE543D'],
    ];

    foreach ($steps as $s): ?>
      <svg class="dotted-svg" style="left: <?= $s['dot'] ?>;" viewBox="0 0 2 40" aria-hidden="true">
        <line x1="1" y1="0" x2="1" y2="40" stroke="<?= $s['color'] ?>" stroke-width="2" stroke-dasharray="4 4" />
      </svg>

      <div class="vnpc-step-item" style="left: <?= $s['left'] ?>;">
        <div class="step-ring-bg" style="background: <?= $s['color'] ?>; box-shadow: 0 0 15px <?= $s['color'] ?>55;"
          aria-hidden="true"></div>
        <div class="step-card" style="border-bottom-color: <?= $s['color'] ?>;">
          <div class="step-card-h"><?= $s['title'] ?></div>
          <div class="step-card-p"><?= htmlspecialchars($s['desc']) ?></div>
        </div>
        <div class="step-ring-white" aria-hidden="true"></div>
        <div class="step-ring-inner" style="color: <?= $s['color'] ?>;" aria-hidden="true">
          <?= htmlspecialchars($s['id']) ?>
        </div>
      </div>
    <?php endforeach; ?>

    <img src="<?= $base ?>/assets/img/client/img_home17.png" class="p-img-1" alt="" aria-hidden="true" loading="lazy">
    <img src="<?= $base ?>/assets/img/client/img_home19.png" class="p-img-2" alt="" aria-hidden="true" loading="lazy">
  </div>
</section>