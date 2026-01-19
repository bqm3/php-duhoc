<?php if (!isset($base))
  $base = ''; ?>

<section class="vnpc-testimonials" style="background-image: url('<?= $base ?>/assets/img/client/img_home24.png');">
  <div class="container-xxl">
    <div class="text-center mb-4">
      <h2 class="vnpc-h2 mb-1">Ý KIẾN KHÁCH HÀNG</h2>
      <p class="vnpc-p mb-0">Cùng xem khách hàng nói gì về chúng tôi sau những trải nghiệm thú vị.</p>
    </div>
    <div class="row g-4">

      <?php
      $testimonials = [
        ['name' => 'Minh Khoa', 'img' => 'https://placehold.co/56x56', 'content' => 'Em vô tình biết đến VNPC qua Facebook, bản thân lại không tin tưởng mấy trung tâm tư vấn lắm nhưng vẫn liều tới thử xem sao. Nhưng thật sự, em đã bị thuyết phục bởi sự tận tâm, nhiệt tình, tính minh bạch và tốc độ xử lý hồ sơ của trung tâm. Cảm ơn trung tâm đã giúp em sớm thực hiện được giấc mơ du học Úc.'],
        ['name' => 'Hải Yến', 'img' => 'https://placehold.co/56x56', 'content' => 'Tôi có đưa con trai trai đến VNPC nhận tư vấn du học Úc và thấy khá hài lòng với cách tư vấn nhiệt tình, chuyên nghiệp của công ty. Công ty còn xử lý hồ sơ rất nhanh, minh bạch mọi khoản chi phí và rất có trách nhiệm.'],
        ['name' => 'Hoàng Quân', 'img' => 'https://placehold.co/56x56', 'content' => 'Luôn ủng hộ VNPC, các bạn rất tận tình và có tâm trong công việc. Mình được bạn thân giới thiệu đến VNPC và vô cùng ấn tượng với phong cách làm việc chuyên nghiệp tại đây. Từ không gian văn phòng, thái độ nhân viên đến quy trình làm việc đều rất tốt. Chúc VNPC ngày càng phát triển hơn nữa trong tương lai.'],
      ];

      foreach ($testimonials as $t): ?>
        <div class="col-lg-4 col-md-6">
          <div class="vnpc-quote-card">
            <!-- Quote icon -->
            <!-- <div class="quote-icon">
              <span></span>
              <span></span>
            </div> -->
            <img class="quote-icon" src="<?= $base ?>/assets/svgs/clients/ic_home12.svg" alt=""></img>

            <p class="vnpc-quote"><?= htmlspecialchars($t['content']) ?></p>

            <div class="vnpc-quote-user">
              <img src="<?= $t['img'] ?>" alt="<?= htmlspecialchars($t['name']) ?>">
              <span class="vnpc-quote-user-name"><?= htmlspecialchars($t['name']) ?></span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>