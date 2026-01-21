<?php
// app/views/admin/files/index.php
if (!isset($base)) $base = '';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Files Management</title>

  <link rel="stylesheet" href="<?= $base ?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $base ?>/assets/css/quicksand.css">
  <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= $base ?>/assets/css/fontawesome.css">
  <link rel="stylesheet" href="<?= $base ?>/assets/css/toastr.min.css">
</head>

<body>
  <div class="container-fluid">
    <?php include __DIR__ . '/../header.php'; ?>

    <div class="row main-content">
      <?php include __DIR__ . '/../sidebar.php'; ?>

      <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
        <div class="mb-3 d-flex justify-content-between align-items-center">
          <div>
            <h5 class="mb-0"><strong>Quản lý Files</strong></h5>
            <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Files</span>
          </div>
          <a href="<?= $base ?>/admin/files/create<?= !empty($current_category_id) ? '?category_id='.(int)$current_category_id : '' ?>"
             class="btn btn-primary">
            <i class="fa fa-plus"></i> Thêm file
          </a>
        </div>

        <div class="row mt-3">
          <div class="col-sm-12">

            <!-- Filter / Search Form (giống posts) -->
            <form method="GET" action="" class="mb-3">
              <div class="row" style="max-width: 900px;">
                <div class="col-md-5 mb-2">
                  <div class="input-group">
                    <input type="text"
                           name="keyword"
                           class="form-control"
                           placeholder="Tìm theo title/url/category/user..."
                           value="<?= htmlspecialchars($keyword ?? '') ?>">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="submit">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>

                <div class="col-md-3 mb-2">
                  <select class="form-control" name="category_id">
                    <option value="0">-- Tất cả category --</option>
                    <?php foreach (($categories ?? []) as $c): ?>
                      <option value="<?= (int)$c['id'] ?>"
                        <?= ((int)($current_category_id ?? 0) === (int)$c['id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($c['name']) ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="col-md-2 mb-2">
                  <select class="form-control" name="type">
                    <option value="">-- Tất cả loại --</option>
                    <option value="image" <?= (($current_type ?? '') === 'image') ? 'selected' : '' ?>>Image</option>
                    <option value="file"  <?= (($current_type ?? '') === 'file')  ? 'selected' : '' ?>>File</option>
                  </select>
                </div>

                <div class="col-md-2 mb-2">
                  <a class="btn btn-outline-secondary w-100" href="<?= $base ?>/admin/files">Reset</a>
                </div>
              </div>
            </form>

            <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
              <?php if (empty($files)): ?>
                <div class="alert alert-info">
                  Không có file nào. <a href="<?= $base ?>/admin/files/create">Tạo file đầu tiên</a>
                </div>
              <?php else: ?>
                <div class="table-responsive">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th style="width:70px;">ID</th>
                        <th>Tiêu đề</th>
                        <th>Category</th>
                        <th>Country</th>
                        <th>Người tạo</th>
                        <th>Type</th>
                        <th>Preview</th>
                        <th style="width:160px;">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach (($files ?? []) as $f): ?>
                        <tr>
                          <td><?= (int)$f['id'] ?></td>

                          <td>
                            <strong><?= htmlspecialchars($f['title'] ?? '') ?></strong>
                            <div class="text-muted small">
                              <code><?= htmlspecialchars($f['url_file'] ?? '') ?></code>
                            </div>
                          </td>

                          <td><?= !empty($f['category_name']) ? htmlspecialchars($f['category_name']) : '<em class="text-muted">-</em>' ?></td>
                          <td><?= !empty($f['country_name']) ? htmlspecialchars($f['country_name']) : '<em class="text-muted">-</em>' ?></td>
                          <td><?= !empty($f['creator_name']) ? htmlspecialchars($f['creator_name']) : '<em class="text-muted">-</em>' ?></td>

                          <td>
                            <?php $t = $f['type'] ?? ''; ?>
                            <span class="badge badge-<?= ($t === 'image') ? 'success' : 'secondary' ?>">
                              <?= htmlspecialchars($t) ?>
                            </span>
                          </td>

                          <td>
                            <?php if (($f['type'] ?? '') === 'image'): ?>
                              <?php
                                // Nếu url_file đã là /uploads/... thì nối base. Nếu là full URL thì giữ nguyên.
                                $src = $f['url_file'] ?? '';
                                $isFull = preg_match('/^https?:\/\//i', $src);
                                $imgSrc = $isFull ? $src : ($base . $src);
                              ?>
                              <img src="<?= htmlspecialchars($imgSrc) ?>"
                                   style="width:64px;height:44px;object-fit:cover;border-radius:6px;border:1px solid #eee;"
                                   alt="">
                            <?php else: ?>
                              <?php
                                $href = $f['url_file'] ?? '';
                                $isFull = preg_match('/^https?:\/\//i', $href);
                                $fileHref = $isFull ? $href : ($base . $href);
                              ?>
                              <a target="_blank" href="<?= htmlspecialchars($fileHref) ?>">Mở file</a>
                            <?php endif; ?>
                          </td>

                          <td>
                            <a href="<?= $base ?>/admin/files/<?= (int)$f['id'] ?>/edit"
                               class="btn btn-sm btn-warning" title="Edit">
                              <i class="fa fa-edit"></i>
                            </a>

                            <button class="btn btn-sm btn-danger"
                                    onclick="deleteFile(<?= (int)$f['id'] ?>)"
                                    title="Delete">
                              <i class="fa fa-trash"></i>
                            </button>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>

                <!-- Pagination (giống posts) -->
                <?php if (!empty($total_pages) && (int)$total_pages > 1): ?>
                  <nav aria-label="Page navigation" class="mt-3">
                    <ul class="pagination justify-content-end">
                      <?php
                        $catParam = !empty($current_category_id) ? '&category_id='.(int)$current_category_id : '';
                        $typeParam = !empty($current_type) ? '&type='.urlencode($current_type) : '';
                        $kwParam = !empty($keyword) ? '&keyword='.urlencode($keyword) : '';
                        $baseParams = $catParam . $typeParam . $kwParam;
                      ?>
                      <li class="page-item <?= ((int)$current_page <= 1) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= (int)$current_page - 1 ?><?= $baseParams ?>" tabindex="-1">Previous</a>
                      </li>

                      <?php for ($i = 1; $i <= (int)$total_pages; $i++): ?>
                        <li class="page-item <?= ($i == (int)$current_page) ? 'active' : '' ?>">
                          <a class="page-link" href="?page=<?= $i ?><?= $baseParams ?>"><?= $i ?></a>
                        </li>
                      <?php endfor; ?>

                      <li class="page-item <?= ((int)$current_page >= (int)$total_pages) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= (int)$current_page + 1 ?><?= $baseParams ?>">Next</a>
                      </li>
                    </ul>
                  </nav>
                <?php endif; ?>

              <?php endif; ?>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="<?= $base ?>/assets/js/jquery.min.js"></script>
  <script src="<?= $base ?>/assets/js/popper.min.js"></script>
  <script src="<?= $base ?>/assets/js/bootstrap.min.js"></script>
  <script src="<?= $base ?>/assets/js/sweetalert.js"></script>
  <script src="<?= $base ?>/assets/js/toastr.min.js"></script>
  <script src="<?= $base ?>/assets/js/custom.js"></script>

  <script>
    // nếu bạn đã set window.__csrf ở layout/header thì dùng nó
    window.__csrf = window.__csrf || '<?= htmlspecialchars($csrf ?? '') ?>';

    function deleteFile(id) {
      if (!confirm('Xoá file này?')) return;

      const btn = document.querySelector('button[onclick="deleteFile(' + id + ')"]');
      const row = btn ? btn.closest('tr') : null;

      fetch('<?= $base ?>/admin/files/' + id + '/delete', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: '_csrf=' + encodeURIComponent(window.__csrf || '')
      })
      .then(r => r.json())
      .then(data => {
        if (data.success) {
          toastr.success('File đã được xoá!', 'Success');
          if (row) {
            row.style.transition = 'all 0.5s';
            row.style.opacity = '0';
            setTimeout(() => row.remove(), 500);
          } else {
            setTimeout(() => window.location.reload(), 800);
          }
        } else {
          swal("Error!", data.error || "Failed to delete file", "error");
        }
      })
      .catch(err => {
        console.error(err);
        swal("Error!", "An error occurred", "error");
      });
    }
  </script>
</body>
</html>
