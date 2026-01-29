<!-- <?php if (!isset($base))
  $base = ''; ?> -->

<style>
  .vnpc-countries {
    padding: 72px 0;
  }

  .countries-grid {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    gap: 12px;
    grid-auto-rows: 200px;
    align-items: stretch;
  }

  .country-card {
    position: relative;
    display: block;
    overflow: hidden;
    border-radius: 10px;
    background: #0b0b0b;
    height: 100%;
  }

  .country-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .25s ease;
  }

  .country-card::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(0, 0, 0, .10), rgba(0, 0, 0, .55));
    pointer-events: none;
  }

  .country-card:hover img {
    transform: scale(1.03);
  }

  .country-label {
    position: absolute;
    left: 10px;
    top: 10px;
    z-index: 2;
    font-size: 13px;
    font-weight: 600;
    color: #fff;
    background: rgba(14, 63, 110, .85);
    padding: 6px 10px;
    border-radius: 8px;
  }

  .span-4 {
    grid-column: span 4;
  }

  .span-6 {
    grid-column: span 6;
  }

  .span-8 {
    grid-column: span 8;
  }

  @media (max-width: 992px) {
    .countries-grid {
      grid-template-columns: repeat(6, 1fr);
      grid-auto-rows: 88px;
    }

    .span-8,
    .span-6 {
      grid-column: span 6;
    }

    .span-4 {
      grid-column: span 3;
    }
  }

  @media (max-width: 576px) {
    .countries-grid {
      grid-template-columns: repeat(2, 1fr);
      grid-auto-rows: 84px;
    }

    .span-8,
    .span-6,
    .span-4 {
      grid-column: span 2;
    }
  }
</style>

<section class="vnpc-section vnpc-countries" aria-labelledby="study-abroad-countries">
  <div class="container-xxl">

    <header class="text-center mb-4">
      <h2 id="study-abroad-countries" class="vnpc-h2 mb-1">
        Du Học Quốc Tế – Các Quốc Gia Hàng Đầu
      </h2>
      <p class="vnpc-p mb-0">
        Tư vấn du học, xử lý hồ sơ &amp; visa tại Châu Âu, Châu Úc, Châu Mỹ và Châu Á
      </p>
    </header>

    <nav id="countries-grid" class="countries-grid" aria-label="Danh sách quốc gia du học">

      <?php
      $spans = ['span-6', 'span-6', 'span-4', 'span-4', 'span-4', 'span-4', 'span-8', 'span-4', 'span-4', 'span-4', 'span-8', 'span-4'];
      $idx = 0;
      foreach ($popularCountries as $c):
        $currentSpan = $spans[$idx % count($spans)];
        $hiddenClass = $idx >= 10 ? 'extra-country d-none' : '';
        $idx++;
        $imgUrl = !empty($c['image_url']) ? $c['image_url'] : '/assets/img/client/countries/default_country.png';
        if (!empty($imgUrl) && strpos($imgUrl, '/') !== 0) {
          $imgUrl = '/' . $imgUrl;
        }
        $targetSlug = !empty($c['post_slug']) ? $c['post_slug'] : $c['country_slug'];
        ?>
        <a class="country-card <?= $currentSpan ?> <?= $hiddenClass ?>"
          href="<?= $base ?>/<?= htmlspecialchars($targetSlug) ?>" title="Du Học <?= htmlspecialchars($c['name']) ?>">
          <img src="<?= $base ?><?= $imgUrl ?>" alt="Du Học <?= htmlspecialchars($c['name']) ?> – Tư vấn hồ sơ & visa"
            loading="lazy">
          <span class="country-label">Du Học <?= htmlspecialchars($c['name']) ?></span>
        </a>
      <?php endforeach; ?>

    </nav>

    <?php if (count($popularCountries) > 10): ?>
      <div class="text-center mt-4">
        <button id="toggle-countries" class="btn vnpc-btn-primary btn-sm px-4"
          title="Xem toàn bộ chương trình du học quốc tế">
          Xem tất cả quốc gia du học
        </button>
      </div>

      <script>
        document.getElementById('toggle-countries').addEventListener('click', function () {
          const extraItems = document.querySelectorAll('.extra-country');
          const isHidden = extraItems[0].classList.contains('d-none');

          if (isHidden) {
            extraItems.forEach(item => item.classList.remove('d-none'));
            this.innerText = 'Thu gọn';
          } else {
            extraItems.forEach(item => item.classList.add('d-none'));
            this.innerText = 'Xem tất cả quốc gia du học';
            // Optional: scroll back to grid top
            document.getElementById('countries-grid').scrollIntoView({ behavior: 'smooth' });
          }
        });
      </script>
    <?php endif; ?>

  </div>
</section>