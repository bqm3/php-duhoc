<!-- /app/views/layouts/main.php -->
<?php

// declare(strict_types=1);
if (!isset($base))
  $base = '';

// URI detection for active states and conditional sections
$current_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$relative_path = $current_uri;
if ($base && strpos($current_uri, $base) === 0) {
  $relative_path = substr($current_uri, strlen($base));
}
if ($relative_path === '')
  $relative_path = '/';

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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="<?= $base ?>/assets/js/app.js"></script>

  <?php if (!empty($pageCss)): ?>
    <?php foreach ((array) $pageCss as $css): ?>
      <link href="<?= $base ?>/assets/css/<?= ltrim($css, '/') ?>" rel="stylesheet">
    <?php endforeach; ?>
  <?php endif; ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@400;600;700&family=Farro:wght@400;700&display=swap"
    rel="stylesheet">
</head>

<body class="vnpc-body">

  <?php include __DIR__ . '/partials/topbar.php'; ?>
  <?php include __DIR__ . '/partials/navbar.php'; ?>

  <main>
    <?php include $viewFile; ?>
  </main>

  <?php include __DIR__ . '/partials/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="<?= $base ?>/php-duhoc/public/assets/js/app.js"></script>

  <?php if (!empty($pageJs)): ?>
    <?php foreach ((array) $pageJs as $js): ?>
      <script src="<?= $base ?>/php-duhoc/public/assets/js/<?= ltrim($js, '/') ?>"></script>
    <?php endforeach; ?>
  <?php endif; ?>
</body>

</html>