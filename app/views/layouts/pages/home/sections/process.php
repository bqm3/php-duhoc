<?php if (!isset($base)) $base = ''; ?>

<section
  class="vnpc-process"
  style="background-image: url('<?= $base ?>/assets/img/client/img_home18.png');"
  aria-labelledby="process-title"
>
  <div class="vnpc-process-overlay" aria-hidden="true"></div>

  <!-- SEO hidden heading/desc (không ảnh hưởng layout, không cần CSS) -->
  <h2 id="process-title" style="position:absolute;left:-9999px;top:auto;width:1px;height:1px;overflow:hidden;">
    Hành trình 6 bước du học cùng tôi
  </h2>
  <p style="position:absolute;left:-9999px;top:auto;width:1px;height:1px;overflow:hidden;">
    Quy trình 6 bước hỗ trợ du học: đăng ký thông tin, đăng ký mã hồ sơ, tư vấn chuyên sâu, xin visa, nhận visa và hỗ trợ trong suốt quá trình học.
  </p>

  <div class="process-container">
    <!-- Decoration top right (decorative) -->
    <img src="<?= $base ?>/assets/img/client/img_home12.png" class="p-deco-1" alt="" aria-hidden="true" loading="lazy" decoding="async">
    <img src="<?= $base ?>/assets/svgs/clients/ic_home8.svg" class="p-deco-2" alt="" aria-hidden="true" loading="lazy" decoding="async">

    <!-- Title group (GIỮ NGUYÊN CLASS để không vỡ CSS) -->
    <div class="p-h-sub" aria-hidden="true">hành<br>trình</div>
    <div class="p-num-big" aria-hidden="true">6</div>
    <div class="p-h-main">Bước<br>du học cùng tôi</div>

    <img
      src="<?= $base ?>/assets/img/client/img_home16.png"
      class="p-h-img"
      alt="Minh họa hành trình du học 6 bước"
      loading="lazy"
      decoding="async"
    >

    <!-- Timeline Graphics (decorative) -->
    <img src="<?= $base ?>/assets/svgs/clients/ic_location_2.svg" class="loc-ico" alt="" aria-hidden="true" loading="lazy" decoding="async">
    <img src="<?= $base ?>/assets/svgs/clients/ic_home9.svg" class="tar-ico" alt="" aria-hidden="true" loading="lazy" decoding="async">

    <!-- Main connecting line (decorative) -->
    <svg class="timeline-svg" viewBox="0 0 1229 6" fill="none" aria-hidden="true" focusable="false">
      <line x1="0" y1="3" x2="1229" y2="3" stroke="#2FC7A1" stroke-width="3" stroke-linecap="round" />
      <circle cx="0" cy="3" r="5" fill="white" stroke="#2FC7A1" stroke-width="2" />
      <circle cx="47" cy="3" r="5" fill="white" stroke="#2FC7A1" stroke-width="2" />
      <circle cx="264" cy="3" r="5" fill="white" stroke="#2FC7A1" stroke-width="2" />
      <circle cx="481" cy="3" r="5" fill="white" stroke="#2FC7A1" stroke-width="2" />
      <circle cx="698" cy="3" r="5" fill="white" stroke="#2FC7A1" stroke-width="2" />
      <circle cx="915" cy="3" r="5" fill="white" stroke="#2FC7A1" stroke-width="2" />
      <circle cx="1132" cy="3" r="5" fill="white" stroke="#2FC7A1" stroke-width="2" />
      <circle cx="1229" cy="3" r="5" fill="white" stroke="#2FC7A1" stroke-width="2" />
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
      <!-- Dotted vertical line (GIỮ NGUYÊN vị trí/selector) -->
      <svg class="dotted-svg" style="left: <?= $s['dot'] ?>;" viewBox="0 0 2 65" aria-hidden="true" focusable="false">
        <line x1="1" y1="0" x2="1" y2="65" stroke="#2FC7A1" stroke-width="2" stroke-dasharray="4 4" />
      </svg>

      <div class="vnpc-step-item" style="left: <?= $s['left'] ?>;">
        <div class="step-ring-bg" aria-hidden="true"></div>

        <div class="step-card" role="group" aria-label="Bước <?= htmlspecialchars($s['id']) ?>">
          <!-- GIỮ NGUYÊN class; chỉ thêm role/aria -->
          <div class="step-card-h"><?= $s['title'] ?></div>
          <div class="step-card-p"><?= htmlspecialchars($s['desc']) ?></div>
        </div>

        <div class="step-ring-white" aria-hidden="true"></div>
        <div class="step-ring-inner" aria-hidden="true"><?= htmlspecialchars($s['id']) ?></div>
      </div>
    <?php endforeach; ?>

    <!-- Bottom/Side decoration images (decorative) -->
    <img src="<?= $base ?>/assets/img/client/img_home17.png" class="p-img-1" alt="" aria-hidden="true" loading="lazy" decoding="async">
    <img src="<?= $base ?>/assets/img/client/img_home19.png" class="p-img-2" alt="" aria-hidden="true" loading="lazy" decoding="async">
  </div>
</section>
