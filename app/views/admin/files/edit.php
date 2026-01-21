<?php if (!isset($base)) $base = ''; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <title>Sửa File</title>
  <link rel="stylesheet" href="<?= $base ?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $base ?>/assets/css/quicksand.css">
  <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= $base ?>/assets/css/fontawesome.css">
</head>
<body>

<div class="container-fluid">
  <?php include __DIR__ . '/../header.php'; ?>

  <div class="row main-content">
    <?php include __DIR__ . '/../sidebar.php'; ?>

    <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
      <div class="mb-3">
        <h5 class="mb-0"><strong>Sửa File #<?= (int)$file['id'] ?></strong></h5>
        <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Files <i class="fa fa-angle-right"></i> Edit</span>
      </div>

      <div class="card shadow-sm" style="max-width: 860px;">
        <div class="card-body">

          <form method="POST" action="<?= $base ?>/admin/files/<?= (int)$file['id'] ?>" enctype="multipart/form-data">
            <input type="hidden" name="_csrf" value="<?= htmlspecialchars($csrf ?? '') ?>">

            <div class="mb-3">
              <label class="form-label">Tiêu đề</label>
              <input class="form-control" name="title"
                     value="<?= htmlspecialchars($file['title'] ?? '') ?>" required>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Category</label>
                <select class="form-control" name="category_id">
                  <option value="">-- Chọn category --</option>
                  <?php foreach (($categories ?? []) as $c): ?>
                    <option value="<?= (int)$c['id'] ?>"
                      <?= ((int)($file['category_id'] ?? 0) === (int)$c['id']) ? 'selected' : '' ?>>
                      <?= htmlspecialchars($c['name']) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label">Country</label>
                <select class="form-control" name="country_id">
                  <option value="">-- Chọn country --</option>
                  <?php foreach (($countries ?? []) as $c): ?>
                    <option value="<?= (int)$c['id'] ?>"
                      <?= ((int)($file['country_id'] ?? 0) === (int)$c['id']) ? 'selected' : '' ?>>
                      <?= htmlspecialchars($c['name']) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- Current file -->
            <div class="mb-3">
              <label class="form-label">File hiện tại</label>
              <div class="border rounded p-2">
                <?php if (($file['type'] ?? '') === 'image'): ?>
                  <img src="<?= $base . $file['url_file'] ?>"
                       style="max-width:240px;border-radius:8px;">
                <?php endif; ?>
                <div class="mt-2">
                  <a target="_blank" href="<?= $base . $file['url_file'] ?>">
                    <?= htmlspecialchars($file['url_file']) ?>
                  </a>
                </div>
                <small class="text-muted">Type: <?= htmlspecialchars($file['type'] ?? '-') ?></small>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Đổi file (tuỳ chọn)</label>
              <input class="form-control" type="file" name="file">
              <small class="text-muted">Nếu chọn file mới, hệ thống sẽ cập nhật url_file + type</small>
            </div>

            <div class="d-flex gap-2">
              <button class="btn btn-primary">
                <i class="fa fa-save"></i> Cập nhật
              </button>
              <a class="btn btn-secondary" href="<?= $base ?>/admin/files">Huỷ</a>
            </div>

          </form>

        </div>
      </div>

    </div>
  </div>
</div>

<script src="<?= $base ?>/assets/js/bootstrap.min.js"></script>
</body>
</html>
