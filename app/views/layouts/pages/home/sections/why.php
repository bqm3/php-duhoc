<?php if (!isset($base))
  $base = ''; ?>

<section class="vnpc-why">
  <div class="why-container">
    <div class="why-icon-top"></div>

    <?php
    $features = [
      ['title' => 'Kinh Nghiệm', 'desc' => 'Gần 20 năm kinh nghiệm trong lĩnh vực du học, đối tác đáng tin cậy của 1.000 + trường trên thế giới.', 'top' => '291.53px', 'left' => '320px'],
      ['title' => 'Tư vấn 24/7', 'desc' => 'Đội ngũ chuyên viên tư vấn chuyên môn cao, xây dựng lộ trình giáo dục tốt nhất, tận tình giải đáp 24/7', 'top' => '443.53px', 'left' => '320px'],
      ['title' => 'Đào tạo Chuyên Sâu', 'desc' => 'Đào tạo ngoại ngữ, kiểm tra trình độ miễn phí, luyện thi chứng chỉ tiếng Anh đạt chuẩn đầu vào', 'top' => '595.53px', 'left' => '320px'],
      ['title' => 'Chuyên Nghiệp, Minh Bạch', 'desc' => 'Quy trình làm việc minh bạch, luôn tôn trọng và đặt lợi ích của khách hàng lên hàng đầu.', 'top' => '291.53px', 'left' => '646px'],
      ['title' => 'Hướng dẫn nhiệt Tình', 'desc' => 'Hướng dẫn làm hồ sơ chứng minh tài chính, xin visa với tỷ lệ đạt cao, săn học bổng giá trị lên đến 100%', 'top' => '443.53px', 'left' => '646px'],
      ['title' => 'Luôn Kết Nối', 'desc' => 'Giữ kết nối, chăm sóc và hỗ trợ học sinh trước khi bay, trong khi bay và sau khi bay', 'top' => '595.53px', 'left' => '646px'],
    ];

    foreach ($features as $f): ?>
      <div class="vnpc-feature" style="top: <?= $f['top'] ?>; left: <?= $f['left'] ?>;">
        <div class="vnpc-feature-h">
          <img src="<?= $base ?>/assets/svgs/clients/ic_home7.svg" width="17" height="17" alt="">
          <div class="vnpc-feature-title"><?= htmlspecialchars($f['title']) ?></div>
        </div>
        <div class="vnpc-feature-p"><?= htmlspecialchars($f['desc']) ?></div>
      </div>
    <?php endforeach; ?>

    <img class="why-small-img" src="<?= $base ?>/assets/img/client/img_home14.png" alt="">

    <div class="why-title-group">
      <div class="why-title">
        Tại sao nên chọn <br/> du học tại chúng tôi
      </div>
      <div class="vnpc-big-q">?</div>
    </div>

    <div class="vnpc-why-accent a"></div>
    <div class="vnpc-why-accent b"></div>
    <img class="why-main-img" src="<?= $base ?>/assets/img/client/img_home15.png" alt="">
  </div>
</section>