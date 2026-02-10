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

      <div class="d-flex flex-wrap justify-content-center align-items-center gap-5 partner-row-scroll" role="list"
        aria-label="Logo đối tác tiêu biểu">
        <?php foreach ($partners as $i => $p): ?>
          <figure class="m-0 partner-item" role="listitem">
            <a href="<?= htmlspecialchars($p['link_href'] ?: '#') ?>" target="_blank" rel="noopener">
              <img src="<?= $base . htmlspecialchars($p['image_url']) ?>" alt="Logo <?= htmlspecialchars($p['name']) ?>"
                title="<?= htmlspecialchars($p['name']) ?>" class="partner-logo" width="160" height="60" loading="lazy"
                decoding="async" style="height: 60px; object-fit: contain;" />
            </a>
          </figure>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>