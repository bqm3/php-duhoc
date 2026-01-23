<?php if (!isset($base)) $base = ''; ?>

<section
  class="vnpc-testimonials"
  style="background-image: url('<?= $base ?>/assets/img/client/img_home24.png');"
  aria-labelledby="testimonials-title"
>
  <div class="container-xxl">
    <header class="text-center mb-4">
      <h2 id="testimonials-title" class="vnpc-h2 mb-1">
        Ý kiến khách hàng về VNPC
      </h2>
      <p class="vnpc-p mb-0">
        Chia sẻ thực tế từ học viên và phụ huynh sau khi tư vấn – hỗ trợ hồ sơ du học.
      </p>
    </header>

    <?php
      // Nên dùng ảnh thật (webp/jpg) thay vì placeholder để tăng trust + SEO
      $testimonials = [
        [
          'name' => 'Minh Khoa',
          'img' => 'https://placehold.co/56x56',
          'role' => 'Học viên du học Úc',
          'rating' => 5,
          'content' => 'Em vô tình biết đến VNPC qua Facebook, bản thân lại không tin tưởng mấy trung tâm tư vấn lắm nhưng vẫn liều tới thử xem sao. Nhưng thật sự, em đã bị thuyết phục bởi sự tận tâm, nhiệt tình, tính minh bạch và tốc độ xử lý hồ sơ của trung tâm. Cảm ơn trung tâm đã giúp em sớm thực hiện được giấc mơ du học Úc.'
        ],
        [
          'name' => 'Hải Yến',
          'img' => 'https://placehold.co/56x56',
          'role' => 'Phụ huynh',
          'rating' => 5,
          'content' => 'Tôi có đưa con trai đến VNPC nhận tư vấn du học Úc và thấy khá hài lòng với cách tư vấn nhiệt tình, chuyên nghiệp của công ty. Công ty còn xử lý hồ sơ rất nhanh, minh bạch mọi khoản chi phí và rất có trách nhiệm.'
        ],
        [
          'name' => 'Hoàng Quân',
          'img' => 'https://placehold.co/56x56',
          'role' => 'Khách hàng',
          'rating' => 5,
          'content' => 'Luôn ủng hộ VNPC, các bạn rất tận tình và có tâm trong công việc. Mình được bạn thân giới thiệu đến VNPC và vô cùng ấn tượng với phong cách làm việc chuyên nghiệp tại đây. Từ không gian văn phòng, thái độ nhân viên đến quy trình làm việc đều rất tốt. Chúc VNPC ngày càng phát triển hơn nữa trong tương lai.'
        ],
      ];

      // AggregateRating (có thể lấy từ DB sau này)
      $avg = 0;
      foreach ($testimonials as $t) $avg += (int)($t['rating'] ?? 5);
      $avg = count($testimonials) ? round($avg / count($testimonials), 1) : 5.0;
      $count = count($testimonials);
    ?>

    <!-- Schema.org: AggregateRating cho toàn bộ khối testimonial -->
    <div itemscope itemtype="https://schema.org/Organization">
      <meta itemprop="name" content="VNPC">
      <div itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
        <meta itemprop="ratingValue" content="<?= htmlspecialchars((string)$avg) ?>">
        <meta itemprop="reviewCount" content="<?= htmlspecialchars((string)$count) ?>">
        <meta itemprop="bestRating" content="5">
        <meta itemprop="worstRating" content="1">
      </div>
    </div>

    <div class="row g-4" role="list" aria-label="Danh sách đánh giá khách hàng">
      <?php foreach ($testimonials as $i => $t): ?>
        <?php
          $name = $t['name'] ?? 'Khách hàng';
          $role = $t['role'] ?? 'Khách hàng';
          $content = $t['content'] ?? '';
          $img = $t['img'] ?? '';
          $rating = (int)($t['rating'] ?? 5);

          // Tạo id để aria-describedby
          $cardId = 'review-' . ($i + 1);
        ?>

        <article
          class="col-lg-4 col-md-6"
          role="listitem"
          itemscope
          itemtype="https://schema.org/Review"
          aria-labelledby="<?= $cardId ?>-title"
          aria-describedby="<?= $cardId ?>-body"
        >
          <div class="vnpc-quote-card">
            <img
              class="quote-icon"
              src="<?= $base ?>/assets/svgs/clients/ic_home12.svg"
              alt="Trích dẫn đánh giá"
              width="24"
              height="24"
              loading="lazy"
              decoding="async"
            />

            <!-- Rating (schema) -->
            <div itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating">
              <meta itemprop="ratingValue" content="<?= htmlspecialchars((string)$rating) ?>">
              <meta itemprop="bestRating" content="5">
              <meta itemprop="worstRating" content="1">
            </div>

            <p
              id="<?= $cardId ?>-body"
              class="vnpc-quote"
              itemprop="reviewBody"
            >
              <?= htmlspecialchars($content) ?>
            </p>

            <footer class="vnpc-quote-user">
              <img
                src="<?= htmlspecialchars($img) ?>"
                alt="Ảnh <?= htmlspecialchars($name) ?> - <?= htmlspecialchars($role) ?>"
                title="<?= htmlspecialchars($name) ?> (<?= htmlspecialchars($role) ?>)"
                width="56"
                height="56"
                loading="lazy"
                decoding="async"
                itemprop="image"
              />

              <div class="vnpc-quote-user-meta">
                <strong
                  id="<?= $cardId ?>-title"
                  class="vnpc-quote-user-name"
                  itemprop="author"
                  itemscope
                  itemtype="https://schema.org/Person"
                >
                  <span itemprop="name"><?= htmlspecialchars($name) ?></span>
                </strong>
                <div class="vnpc-quote-user-role"><?= htmlspecialchars($role) ?></div>
              </div>
            </footer>

            <!-- Optional: itemReviewed -->
            <meta itemprop="itemReviewed" content="Dịch vụ tư vấn du học VNPC">
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
