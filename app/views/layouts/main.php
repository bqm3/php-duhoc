<!-- /app/views/layouts/main.php -->
<?php

// declare(strict_types=1);
if (!isset($base)) $base = '';
ini_set('default_charset', 'UTF-8');
header('Content-Type: text/html; charset=UTF-8');
mb_internal_encoding('UTF-8');
?>
<!doctype html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
  <title><?= htmlspecialchars($title ?? 'Client') ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= $base ?>/assets/css/app.css" rel="stylesheet">
  <link href="<?= $base ?>/assets/css/home.css" rel="stylesheet">
  <script src="<?= $base ?>/assets/js/app.js"></script>

  <?php if (!empty($pageCss)): ?>
    <?php foreach ((array)$pageCss as $css): ?>
      <link href="<?= $base ?>/assets/css/<?= ltrim($css, '/') ?>" rel="stylesheet">
    <?php endforeach; ?>
  <?php endif; ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="vnpc-body">

  <?php include __DIR__ . '/partials/topbar.php'; ?>
  <?php include __DIR__ . '/partials/navbar.php'; ?>

  <main>
    <?php include $viewFile; ?>
  </main>

  <?php include __DIR__ . '/partials/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= $base ?>/php-duhoc/public/assets/js/app.js"></script>

  <?php if (!empty($pageJs)): ?>
    <?php foreach ((array)$pageJs as $js): ?>
      <script src="<?= $base ?>/php-duhoc/public/assets/js/<?= ltrim($js, '/') ?>"></script>
    <?php endforeach; ?>
  <?php endif; ?>
</body>

</html>