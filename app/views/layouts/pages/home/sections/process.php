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
  }

  /* Mobile/Tablet Styles */
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

    <svg class="timeline-svg" viewBox="0 0 1229 6" fill="none" aria-hidden="true">
      <line x1="0" y1="3" x2="1229" y2="3" stroke="#2FC7A1" stroke-width="3" stroke-linecap="round" />
    </svg>

    <?php
    $steps = [
      ['id' => '01', 'left' => 'calc(50% - 639px)', 'dot' => 'calc(50% - 543px)', 'title' => 'Đăng ký<br>thông tin cơ bản', 'desc' => 'Điền thông tin cá nhân, tài chính, nguyện vọng và khả năng ngoại ngữ.'],
      ['id' => '02', 'left' => 'calc(50% - 422px)', 'dot' => 'calc(50% - 326px)', 'title' => 'Đăng ký mã<br>hồ sơ', 'desc' => 'Đăng ký mã hồ sơ du học để có tên trên hệ thống và nhận hỗ trợ.'],
      ['id' => '03', 'left' => 'calc(50% - 205px)', 'dot' => 'calc(50% - 109px)', 'title' => 'Tư vấn<br>chuyên sâu', 'desc' => 'Đánh giá hồ sơ, tư vấn trường, ngành, xin thư mời nhập học, xin học bổng.'],
      ['id' => '04', 'left' => 'calc(50% + 12px)', 'dot' => 'calc(50% + 108px)', 'title' => 'Xin Visa', 'desc' => 'Hoàn thiện hồ sơ, luyện phỏng vấn xin visa, học bổng và hướng dẫn đóng phí.'],
      ['id' => '05', 'left' => 'calc(50% + 229px)', 'dot' => 'calc(50% + 325px)', 'title' => 'Nhận Visa', 'desc' => 'Hướng dẫn trước bay, thanh lý hợp đồng du học, nhận visa và chụp ảnh lưu niệm.'],
      ['id' => '06', 'left' => 'calc(50% + 446px)', 'dot' => 'calc(50% + 542px)', 'title' => 'Hỗ trợ<br>quá trình học', 'desc' => 'Hỗ trợ trong suốt quá trình học: định hướng, hòa nhập, xử lý tình huống và kết nối nhà trường.'],
    ];

    foreach ($steps as $s): ?>
      <svg class="dotted-svg" style="left: <?= $s['dot'] ?>;" viewBox="0 0 2 65" aria-hidden="true">
        <line x1="1" y1="0" x2="1" y2="65" stroke="#2FC7A1" stroke-width="2" stroke-dasharray="4 4" />
      </svg>

      <div class="vnpc-step-item" style="left: <?= $s['left'] ?>;">
        <div class="step-ring-bg" aria-hidden="true"></div>
        <div class="step-card">
          <div class="step-card-h"><?= $s['title'] ?></div>
          <div class="step-card-p"><?= htmlspecialchars($s['desc']) ?></div>
        </div>
        <div class="step-ring-white" aria-hidden="true"></div>
        <div class="step-ring-inner" aria-hidden="true"><?= htmlspecialchars($s['id']) ?></div>
      </div>
    <?php endforeach; ?>

    <img src="<?= $base ?>/assets/img/client/img_home17.png" class="p-img-1" alt="" aria-hidden="true" loading="lazy">
    <img src="<?= $base ?>/assets/img/client/img_home19.png" class="p-img-2" alt="" aria-hidden="true" loading="lazy">
  </div>
</section>