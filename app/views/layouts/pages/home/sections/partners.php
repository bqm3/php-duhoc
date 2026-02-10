<style>
  .partner-logo {
    height: 85px;
    width: auto;
    object-fit: contain;
    transition: transform .25s ease;
    will-change: transform;
  }

  .partner-logo:hover {
    transform: scale(1.06);
  }

  .partner-swiper {
    padding: 20px 0;
  }

  .partner-item {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  @media (max-width: 768px) {
    .partner-logo {
      height: 55px;
    }
  }

  .visually-hidden {
    position: absolute !important;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
  }
</style>

<section class="vnpc-section" aria-labelledby="partners-title">
  <div class="container-xxl text-center">
    <header>
      <h2 id="partners-title" class="vnpc-h2 mb-2">Đối tác tiêu biểu của VNPC</h2>
      <p class="vnpc-p mb-5">
        Danh sách các trường đại học uy tín tại Mỹ, Úc, Canada, Anh, châu Âu, Nhật Bản, Hàn Quốc và nhiều quốc gia khác.
      </p>
    </header>

    <?php if (empty($partners)): ?>
      <!-- No partners found -->
    <?php else: ?>
      <?php $orgName = 'VNPC'; ?>
      <div itemscope itemtype="https://schema.org/Organization" class="visually-hidden">
        <meta itemprop="name" content="<?= htmlspecialchars($orgName) ?>">
        <?php foreach ($partners as $p): ?>
          <div itemprop="brand" itemscope itemtype="https://schema.org/Brand">
            <meta itemprop="name" content="<?= htmlspecialchars($p['name']) ?>">
            <meta itemprop="logo" content="<?= htmlspecialchars($base . $p['image_url']) ?>">
          </div>
        <?php endforeach; ?>
      </div>

      <div class="swiper partner-swiper">
        <div class="swiper-wrapper" role="list" aria-label="Logo đối tác tiêu biểu">
          <?php foreach ($partners as $p): ?>
            <div class="swiper-slide partner-item" role="listitem">
              <a href="<?= htmlspecialchars($p['link_href'] ?: '#') ?>" target="_blank" rel="noopener">
                <img src="<?= $base . htmlspecialchars($p['image_url']) ?>" alt="Logo <?= htmlspecialchars($p['name']) ?>"
                  title="<?= htmlspecialchars($p['name']) ?>" class="partner-logo" width="160" height="60" loading="lazy"
                  decoding="async" />
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <script>
        document.addEventListener('DOMContentLoaded', function () {
          new Swiper(".partner-swiper", {
            slidesPerView: 2,
            spaceBetween: 30,
            loop: true,
            autoplay: {
              delay: 3000,
              disableOnInteraction: false,
            },
            breakpoints: {
              576: {
                slidesPerView: 3,
                spaceBetween: 30,
              },
              768: {
                slidesPerView: 4,
                spaceBetween: 40,
              },
              1024: {
                slidesPerView: 5,
                spaceBetween: 50,
              },
              1200: {
                slidesPerView: 7,
                spaceBetween: 50,
              },
            },
          });
        });
      </script>
    <?php endif; ?>
  </div>
</section>