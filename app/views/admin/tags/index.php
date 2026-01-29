<!-- app/views/admin/tags/index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tags Management</title>

    <link rel="stylesheet" href="<?= $base ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/quicksand.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/fontawesome.css">
</head>

<body>
    <div class="container-fluid">
        <?php include __DIR__ . '/../../admin/header.php'; ?>

        <div class="row main-content">
            <?php include __DIR__ . '/../../admin/sidebar.php'; ?>

            <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0"><strong>Quản lý Cập nhật (Tags)</strong></h5>
                        <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Tags</span>
                    </div>
                    <a href="<?= $base ?>/admin/tags/create" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Thêm tag
                    </a>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!-- Search Form -->
                        <form method="GET" action="" class="mb-3">
                            <div class="input-group" style="max-width: 400px;">
                                <input type="text" name="keyword" class="form-control" placeholder="Tìm tên tag..."
                                    value="<?= htmlspecialchars($keyword ?? '') ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit"><i
                                            class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>

                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <?php if (empty($tags)): ?>
                                <div class="alert alert-info">Chưa có tag nào.</div>
                            <?php else: ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Icon</th>
                                                <th>Tên tag</th>
                                                <th>Số bài viết</th>
                                                <th>Ngày tạo</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($tags as $tag): ?>
                                                <tr>
                                                    <td>
                                                        <?= $tag['id'] ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($tag['icon']): ?>
                                                            <i class="<?= htmlspecialchars($tag['icon']) ?>"></i>
                                                        <?php else: ?>
                                                            -
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><strong>
                                                            <?= htmlspecialchars($tag['name']) ?>
                                                        </strong></td>
                                                    <td>
                                                        <span class="badge badge-secondary">
                                                            <?= $tag['post_count'] ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <?= date('d/m/Y', strtotime($tag['created_at'])) ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= $base ?>/admin/tags/<?= $tag['id'] ?>/edit"
                                                            class="btn btn-sm btn-warning" title="Sửa">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="deleteTag(<?= $tag['id'] ?>)" title="Xóa">
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
        function deleteTag(id) {
            if (!confirm('Bạn có chắc chắn muốn xóa tag này?')) {
                return;
            }

            const btn = document.querySelector('button[onclick="deleteTag(' + id + ')"]');
            const row = btn ? btn.closest('tr') : null;

            fetch('<?= $base ?>/admin/tags/' + id + '/delete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: '_csrf=' + encodeURIComponent(window.__csrf || '')
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        toastr.success('Xóa tag thành công!', 'Thành công');
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