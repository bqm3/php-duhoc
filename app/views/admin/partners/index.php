<!-- app/views/admin/partners/index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Partners Management</title>

    <link rel="stylesheet" href="<?= $base ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/quicksand.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/fontawesome.css">
</head>

<body>
    <div class="loader-wrapper">
        <div class="loader-circle">
            <div class="loader-wave"></div>
        </div>
    </div>
    <div class="container-fluid">
        <?php include __DIR__ . '/../../admin/header.php'; ?>

        <div class="row main-content">
            <?php include __DIR__ . '/../../admin/sidebar.php'; ?>

            <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0"><strong>Quản lý Đối tác</strong></h5>
                        <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Partners</span>
                    </div>
                    <a href="<?= $base ?>/admin/partners/create" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Thêm đối tác
                    </a>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!-- Search Form -->
                        <form method="GET" action="" class="mb-3">
                            <div class="input-group" style="max-width: 400px;">
                                <input type="text" name="keyword" class="form-control" placeholder="Tìm tên đối tác..."
                                    value="<?= htmlspecialchars($keyword ?? '') ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit"><i
                                            class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>

                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <?php if (empty($partners)): ?>
                                <div class="alert alert-info">Chưa có đối tác nào.</div>
                            <?php else: ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Hình ảnh</th>
                                                <th>Tên đối tác</th>
                                                <th>Liên kết</th>
                                                <th>Thứ tự</th>
                                                <th>Trạng thái</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($partners as $partner): ?>
                                                <tr>
                                                    <td>
                                                        <?= $partner['id'] ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($partner['image_url']): ?>
                                                            <img src="<?= $base . $partner['image_url'] ?>"
                                                                alt="<?= htmlspecialchars($partner['name']) ?>"
                                                                style="height: 50px; border-radius: 4px;">
                                                        <?php else: ?>
                                                            <span class="text-muted">Không có ảnh</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <strong>
                                                            <?= htmlspecialchars($partner['name']) ?>
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        <small class="text-muted">
                                                            <?= htmlspecialchars($partner['link_href']) ?>
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <?= $partner['stt'] ?>
                                                    </td>
                                                    <td>
                                                        <div id="status-badge-<?= $partner['id'] ?>">
                                                            <?php if ($partner['is_hidden']): ?>
                                                                <span class="badge badge-warning">Đang ẩn</span>
                                                            <?php else: ?>
                                                                <span class="badge badge-success">Hiện</span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button
                                                            class="btn btn-sm <?= $partner['is_hidden'] ? 'btn-outline-success' : 'btn-outline-warning' ?>"
                                                            onclick="togglePartner(<?= $partner['id'] ?>)"
                                                            id="toggle-btn-<?= $partner['id'] ?>"
                                                            title="<?= $partner['is_hidden'] ? 'Hiện đối tác' : 'Ẩn đối tác' ?>">
                                                            <i
                                                                class="fa <?= $partner['is_hidden'] ? 'fa-eye' : 'fa-eye-slash' ?>"></i>
                                                        </button>
                                                        <a href="<?= $base ?>/admin/partners/<?= $partner['id'] ?>/edit"
                                                            class="btn btn-sm btn-warning" title="Sửa">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="deletePartner(<?= $partner['id'] ?>)" title="Xóa">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination -->
                                <?php if (isset($total_pages) && $total_pages > 1): ?>
                                    <nav aria-label="Page navigation" class="mt-3">
                                        <ul class="pagination justify-content-end">
                                            <li class="page-item <?= ($current_page <= 1) ? 'disabled' : '' ?>">
                                                <a class="page-link"
                                                    href="?page=<?= $current_page - 1 ?>&keyword=<?= htmlspecialchars($keyword ?? '') ?>"
                                                    tabindex="-1">Trước</a>
                                            </li>
                                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                                <li class="page-item <?= ($i == $current_page) ? 'active' : '' ?>">
                                                    <a class="page-link"
                                                        href="?page=<?= $i ?>&keyword=<?= htmlspecialchars($keyword ?? '') ?>">
                                                        <?= $i ?>
                                                    </a>
                                                </li>
                                            <?php endfor; ?>
                                            <li class="page-item <?= ($current_page >= $total_pages) ? 'disabled' : '' ?>">
                                                <a class="page-link"
                                                    href="?page=<?= $current_page + 1 ?>&keyword=<?= htmlspecialchars($keyword ?? '') ?>">Sau</a>
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
    <link rel="stylesheet" href="<?= $base ?>/assets/css/toastr.min.css">

    <script>
        window.__csrf = '<?= $csrf ?>';

        function togglePartner(id) {
            const btn = document.getElementById('toggle-btn-' + id);
            const badgeDiv = document.getElementById('status-badge-' + id);

            btn.disabled = true;

            fetch('<?= $base ?>/admin/partners/' + id + '/toggle-hidden', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: '_csrf=' + encodeURIComponent(window.__csrf)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if (data.is_hidden) {
                            badgeDiv.innerHTML = '<span class="badge badge-warning">Đang ẩn</span>';
                            btn.className = 'btn btn-sm btn-outline-success';
                            btn.innerHTML = '<i class="fa fa-eye"></i>';
                            btn.title = 'Hiện đối tác';
                            toastr.info('Đã ẩn đối tác');
                        } else {
                            badgeDiv.innerHTML = '<span class="badge badge-success">Hiện</span>';
                            btn.className = 'btn btn-sm btn-outline-warning';
                            btn.innerHTML = '<i class="fa fa-eye-slash"></i>';
                            btn.title = 'Ẩn đối tác';
                            toastr.success('Đã hiện đối tác');
                        }
                    } else {
                        toastr.error(data.error || "Có lỗi xảy ra");
                    }
                })
                .catch(error => {
                    toastr.error("Lỗi hệ thống");
                    console.error('Error:', error);
                })
                .finally(() => {
                    btn.disabled = false;
                });
        }

        function deletePartner(id) {
            if (!confirm('Bạn có chắc chắn muốn xóa đối tác này?')) {
                return;
            }

            const btn = document.querySelector('button[onclick="deletePartner(' + id + ')"]');
            const row = btn ? btn.closest('tr') : null;

            fetch('<?= $base ?>/admin/partners/' + id + '/delete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: '_csrf=' + encodeURIComponent(window.__csrf || '')
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        toastr.success('Xóa đối tác thành công!', 'Thành công');
                        if (row) {
                            row.style.transition = 'all 0.5s';
                            row.style.opacity = '0';
                            setTimeout(() => row.remove(), 500);
                        } else {
                            setTimeout(() => window.location.reload(), 1000);
                        }
                    } else {
                        swal("Không thể xóa!", data.error || "Có lỗi xảy ra", "error");
                    }
                })
                .catch(error => {
                    swal("Lỗi!", "Có lỗi xảy ra", "error");
                    console.error('Error:', error);
                });
        }
    </script>
</body>

</html>