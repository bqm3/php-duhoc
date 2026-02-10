<style>
  .why-container {
    position: relative;
    width: 100%;
    max-width: 1200px;
    margin: -50px auto 0;
    height: 800px;
  }

  /* Desktop absolute positioning */
  @media (min-width: 992px) {
    .vnpc-feature {
      position: absolute;
      width: 300px;
    }

    .why-title-group {
      position: relative;
      z-index: 1;
    }

    .why-small-img {
      position: absolute !important;
      top: 60px !important;
      left: calc(50% + 418px) !important;
      z-index: 2;
    }

    .why-main-img {
      position: absolute !important;
      top: 146px !important;
      left: calc(50% + 80px) !important;
      z-index: 3;
    }

    .vnpc-why-accent {
      position: absolute !important;
      z-index: 1;
    }

    .vnpc-why-accent.a {
      left: calc(50% + 283px) !important;
      top: 491px !important;
    }

    .vnpc-why-accent.b {
      left: calc(50% + 406px) !important;
      top: 421px !important;
    }
  }

  /* Mobile/Tablet layout */
  @media (max-width: 991px) {
    .why-container {
      height: auto;
      padding: 40px 15px;
    }

    .why-title-group {
      text-align: center;
      margin-bottom: 40px;
      position: relative !important;
      z-index: auto !important;
    }

    .why-title {
      margin-bottom: 0 !important;
    }

    .vnpc-feature-list {
      display: grid !important;
      grid-template-columns: repeat(2, 1fr);
      gap: 24px;
      margin: 0 !important;
      position: relative !important;
    }

    .vnpc-feature {
      position: static !important;
      width: 100% !important;
      top: auto !important;
      left: auto !important;
      transform: none !important;
    }

    /* Ẩn tất cả ảnh và decoration trên mobile */
    .why-main-img,
    .why-small-img,
    .vnpc-why-accent,
    .why-icon-top,
    .vnpc-big-q {
      display: none !important;
    }
  }

  /* Mobile nhỏ - 1 cột */
  @media (max-width: 576px) {
    .why-container {
      padding: 30px 15px;
    }

    .why-title-group {
      margin-bottom: 30px;
    }

    .why-title br {
      display: none;
    }

    .vnpc-feature-list {
      grid-template-columns: 1fr;
      gap: 20px;
    }

    .vnpc-feature-h {
      margin-bottom: 8px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .vnpc-feature-title {
      font-size: 16px !important;
      line-height: 1.4 !important;
    }

    .vnpc-feature-p {
      font-size: 14px !important;
      line-height: 1.6 !important;
      margin: 0 !important;
    }
  }
</style>

<section class="vnpc-why" aria-labelledby="why-title" itemscope itemtype="https://schema.org/Organization">
  <div class="why-container">
    <div class="why-icon-top" aria-hidden="true"></div>

    <?php
    $features = [
      ['title' => 'Kinh Nghiệm', 'desc' => 'Gần 20 năm kinh nghiệm trong lĩnh vực du học, đối tác đáng tin cậy của 1.000+ trường trên thế giới.', 'top' => '291.53px', 'left' => '320px'],
      ['title' => 'Tư Vấn 24/7', 'desc' => 'Đội ngũ chuyên viên tư vấn chuyên môn cao, xây dựng lộ trình giáo dục tốt nhất, tận tình giải đáp 24/7', 'top' => '443.53px', 'left' => '320px'],
      ['title' => 'Đào Tạo Chuyên Sâu', 'desc' => 'Đào tạo ngoại ngữ, kiểm tra trình độ miễn phí, luyện thi chứng chỉ tiếng Anh đạt chuẩn đầu vào', 'top' => '595.53px', 'left' => '320px'],
      ['title' => 'Chuyên Nghiệp, Minh Bạch', 'desc' => 'Quy trình làm việc minh bạch, luôn tôn trọng và đặt lợi ích của khách hàng lên hàng đầu.', 'top' => '291.53px', 'left' => '646px'],
      ['title' => 'Hướng Dẫn Nhiệt Tình', 'desc' => 'Hướng dẫn làm hồ sơ chứng minh tài chính, xin visa với tỷ lệ đạt cao, săn học bổng giá trị lên đến 100%', 'top' => '443.53px', 'left' => '646px'],
      ['title' => 'Luôn Kết Nối', 'desc' => 'Giữ kết nối, chăm sóc và hỗ trợ học sinh trước khi bay, trong khi bay và sau khi bay', 'top' => '595.53px', 'left' => '646px'],
    ];
    ?>

    <div class="why-title-group">
      <h2 class="why-title" id="why-title" itemprop="slogan">
        Tại sao nên chọn <br /> du học tại chúng tôi
      </h2>
      <div class="vnpc-big-q" aria-hidden="true">?</div>
    </div>

    <ul class="vnpc-feature-list" style="list-style: none; padding: 0; margin: 0;">
      <?php foreach ($features as $f): ?>
        <li class="vnpc-feature" style="top: <?= $f['top'] ?>; left: <?= $f['left'] ?>;">
          <div class="vnpc-feature-h">
            <img src="<?= $base ?>/assets/svgs/clients/ic_home7.svg" width="17" height="17" alt="" aria-hidden="true"
              loading="lazy" decoding="async">
            <h3 class="vnpc-feature-title" style="margin:0;">
              <?= htmlspecialchars($f['title']) ?>
            </h3>
          </div>
          <p class="vnpc-feature-p">
            <?= htmlspecialchars($f['desc']) ?>
          </p>
        </li>
      <?php endforeach; ?>
    </ul>

    <img class="why-small-img" src="<?= $base ?>/assets/img/client/img_home14.png" alt="Học viên nhận tư vấn du học"
      title="Tư vấn du học và hỗ trợ hồ sơ" loading="lazy" decoding="async" width="320" height="320">

    <div class="vnpc-why-accent a" aria-hidden="true"></div>
    <div class="vnpc-why-accent b" aria-hidden="true"></div>

    <img class="why-main-img" src="<?= $base ?>/assets/img/client/img_home15.png"
      alt="Đội ngũ tư vấn du học đồng hành cùng học viên" title="Vì sao chọn trung tâm tư vấn du học" loading="lazy"
      decoding="async" width="720" height="720" itemprop="image">
  </div>
</section>