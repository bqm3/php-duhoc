<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Client</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= $base ?>/assets/css/app.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="<?= $base ?: '/' ?>">MySite</a>
    <a class="btn btn-outline-primary" href="<?= $base ?>/admin/login">Admin</a>
  </div>
</nav>

<div class="container py-4">
  <?php include $viewFile; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= $base ?>/assets/js/app.js"></script>
</body>
</html>
