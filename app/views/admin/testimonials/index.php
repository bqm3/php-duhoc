<!-- app/views/admin/testimonials/index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quản lý ý kiến khách hàng</title>

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
                        <h5 class="mb-0"><strong>Quản lý Ý kiến khách hàng</strong></h5>
                        <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Testimonials</span>
                    </div>
                    <a href="<?= $base ?>/admin/testimonials/create" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Thêm ý kiến
                    </a>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!-- Search Form -->
                        <form method="GET" action="" class="mb-3">
                            <div class="input-group" style="max-width: 400px;">
                                <input type="text" name="keyword" class="form-control" placeholder="Tìm tên, vai trò..."
                                    value="<?= htmlspecialchars($keyword ?? '') ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit"><i
                                            class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>

                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <?php if (empty($testimonials)): ?>
                                <div class="alert alert-info">Chưa có ý kiến khách hàng nào.</div>
                            <?php else: ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Ảnh</th>
                                                <th>Người gửi</th>
                                                <th>Vai trò / Đánh giá</th>
                                                <th>Nội dung</th>
                                                <th>Thứ tự</th>
                                                <th>Trạng thái</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($testimonials as $item): ?>
                                                <tr>
                                                    <td>
                                                        <?= $item['id'] ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($item['image_url']): ?>
                                                            <img src="<?= $base . $item['image_url'] ?>"
                                                                style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                                        <?php else: ?>
                                                            <div class="bg-light d-flex align-items-center justify-content-center"
                                                                style="width: 50px; height: 50px; border-radius: 50%;">
                                                                <i class="fa fa-user text-secondary"></i>
                                                            </div>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><strong>
                                                            <?= htmlspecialchars($item['name']) ?>
                                                        </strong></td>
                                                    <td>
                                                        <div class="small text-muted">
                                                            <?= htmlspecialchars($item['role']) ?>
                                                        </div>
                                                        <div class="text-warning">
                                                            <?php for ($i = 0; $i < 5; $i++): ?>
                                                                <i class="fa fa-star<?= $i < $item['rating'] ? '' : '-o' ?>"></i>
                                                            <?php endfor; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div
                                                            style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                            <?= htmlspecialchars($item['content']) ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?= $item['display_order'] ?>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge badge-<?= $item['is_hidden'] ? 'secondary' : 'success' ?>">
                                                            <?= $item['is_hidden'] ? 'Đang ẩn' : 'Hiển thị' ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <button
                                                            class="btn btn-sm btn-<?= $item['is_hidden'] ? 'success' : 'secondary' ?>"
                                                            onclick="toggleTestimonial(<?= $item['id'] ?>)"
                                                            title="<?= $item['is_hidden'] ? 'Hiện' : 'Ẩn' ?>">
                                                            <i class="fa fa-eye<?= $item['is_hidden'] ? '' : '-slash' ?>"></i>
                                                        </button>
                                                        <a href="<?= $base ?>/admin/testimonials/<?= $item['id'] ?>/edit"
                                                            class="btn btn-sm btn-warning" title="Sửa">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="deleteTestimonial(<?= $item['id'] ?>)" title="Xóa">
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
        function toggleTestimonial(id) {
            fetch('<?= $base ?>/admin/testimonials/' + id + '/toggle-hidden', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: '_csrf=' + encodeURIComponent('<?= Csrf::token() ?>')
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        toastr.success('Cập nhật trạng thái thành công!', 'Thành công');
                        setTimeout(() => window.location.reload(), 500);
                    } else {
                        swal("Lỗi!", data.error || "Có lỗi xảy ra", "error");
                    }
                })
                .catch(error => {
                    swal("Lỗi!", "Có lỗi xảy ra", "error");
                    console.error('Error:', error);
                });
        }

        function deleteTestimonial(id) {
            swal({
                title: "Bạn có chắc chắn?",
                text: "Dữ liệu này sẽ được xóa khách hàng ý kiến khỏi danh sách.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        const btn = document.querySelector('button[onclick="deleteTestimonial(' + id + ')"]');
                        const row = btn ? btn.closest('tr') : null;

                        fetch('<?= $base ?>/admin/testimonials/' + id + '/delete', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: '_csrf=' + encodeURIComponent('<?= Csrf::token() ?>')
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    toastr.success('Xóa dữ liệu thành công!', 'Thành công');
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
                });
        }
    </script>
</body>

</html>