<section class="vnpc-process">
  <div class="container-xxl">
    <h2 class="text-center text-white mb-4">6 bước du học</h2>
    <div class="row g-3">
      <?php foreach ($process_steps ?? [] as $s): ?>
        <div class="col-md-2 text-center text-white">
          <div class="fw-bold fs-3"><?= $s['step'] ?></div>
          <div><?= htmlspecialchars($s['title']) ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
