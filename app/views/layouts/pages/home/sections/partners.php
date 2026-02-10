<style>
  .partner-logo {
    height: 60px;
    width: auto;
    object-fit: contain;
    transition: transform .25s ease, opacity .25s ease;
    will-change: transform;
  }

  .partner-logo:hover {
    transform: scale(1.06);
    opacity: .85;
  }

  .partner-logo:focus {
    outline: 2px solid rgba(99, 102, 241, .7);
    outline-offset: 4px;
  }

  @media (max-width: 768px) {
    .partner-row-scroll {
      display: flex !important;
      flex-wrap: nowrap !important;
      overflow-x: auto !important;
      padding-bottom: 20px;
      gap: 30px !important;
      justify-content: flex-start !important;
      -webkit-overflow-scrolling: touch;
    }

    .partner-item {
      flex: 0 0 auto;
    }

    .partner-logo {
      height: 40px;
    }

    .vnpc-section {
      padding: 40px 0;
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

    <?php
    $partners = [
      ['file' => 'img_main1.png', 'name' => 'Đối tác đại học tại Úc', 'country' => 'Úc'],
      ['file' => 'img_main2.png', 'name' => 'Đối tác đại học tại Canada', 'country' => 'Canada'],
      ['file' => 'img_main3.png', 'name' => 'Đối tác đại học tại Mỹ', 'country' => 'Mỹ'],
      ['file' => 'img_main4.png', 'name' => 'Đối tác đại học tại Anh', 'country' => 'Anh'],
      ['file' => 'img_main5.png', 'name' => 'Đối tác đại học tại Nhật Bản', 'country' => 'Nhật Bản'],
      ['file' => 'img_main6.png', 'name' => 'Đối tác đại học tại Hàn Quốc', 'country' => 'Hàn Quốc'],
    ];

    $orgName = 'VNPC';
    ?>

    <div itemscope itemtype="https://schema.org/Organization" class="visually-hidden">
      <meta itemprop="name" content="<?= htmlspecialchars($orgName) ?>">
      <?php foreach ($partners as $p): ?>
        <div itemprop="brand" itemscope itemtype="https://schema.org/Brand">
          <meta itemprop="name" content="<?= htmlspecialchars($p['name']) ?>">
          <meta itemprop="logo" content="<?= htmlspecialchars($base . '/assets/img/client/' . $p['file']) ?>">
        </div>
      <?php endforeach; ?>
    </div>

    <div class="d-flex flex-wrap justify-content-center align-items-center gap-5 partner-row-scroll" role="list"
      aria-label="Logo đối tác tiêu biểu">
      <?php foreach ($partners as $i => $p): ?>
        <figure class="m-0 partner-item" role="listitem">
          <img src="<?= $base ?>/assets/img/client/<?= htmlspecialchars($p['file']) ?>"
            alt="Logo <?= htmlspecialchars($p['name']) ?>" title="<?= htmlspecialchars($p['name']) ?>"
            class="partner-logo" width="160" height="60" loading="lazy" decoding="async"
            fetchpriority="<?= $i < 2 ? 'high' : 'low' ?>" />
        </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>