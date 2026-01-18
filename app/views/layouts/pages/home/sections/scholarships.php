<section class="vnpc-section">
  <div class="container-xxl">
    <h2 class="vnpc-h2 text-center mb-4">Du học quốc tế</h2>

    <div class="row g-4">
      <?php foreach ($countries ?? [] as $c): ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <a href="#" class="vnpc-country">
            <img src="<?= $base ?>/assets/img/client/<?= $c['img'] ?>">
            <span>Du học <?= htmlspecialchars($c['name']) ?></span>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
