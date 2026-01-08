<!-- app/views/admin/users/index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Posts Management</title>

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
            <?php include __DIR__ . '/../sidebar.php'; ?>

            <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0"><strong>Quản lý người dùng</strong></h5>
                        <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Users</span>
                    </div>
                    <a href="<?= $base ?>/admin/users/create" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Thêm người dùng
                    </a>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!-- Search Form -->
                        <form method="GET" action="" class="mb-3">
                            <div class="input-group" style="max-width: 400px;">
                                <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm tên, email, sđt..." value="<?= htmlspecialchars($keyword ?? '') ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>

                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <?php if (empty($users)): ?>
                            <div class="alert alert-info">Không tìm thấy người dùng nào.</div>
                            <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Họ tên</th>
                                            <th>Email</th>
                                            <th>Vai trò</th>
                                            <th>Giới tính</th>
                                            <th>Ngày sinh</th>
                                            <th>Ngày tạo</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td><?= $user['id'] ?></td>
                                            <td><strong><?= htmlspecialchars($user['full_name']) ?></strong></td>
                                            <td><?= htmlspecialchars($user['email']) ?></td>
                                            <td>
                                                <?php if($user['role'] === 'admin'): ?>
                                                <span class="badge badge-danger">Admin</span>
                                                <?php else: ?>
                                                <span class="badge badge-info">Staff</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php 
                                                if ($user['gender'] == 'male') echo 'Nam';
                                                elseif ($user['gender'] == 'female') echo 'Nữ';
                                                else echo 'Khác';
                                                ?>
                                            </td>
                                            <td><?= !empty($user['birth_date']) ? date('d/m/Y', strtotime($user['birth_date'])) : '-' ?>
                                            </td>
                                            <td><?= date('d/m/Y H:i', strtotime($user['created_at'])) ?></td>
                                            <td> <a href="<?= $base ?>/admin/users/<?= $user['id'] ?>/edit"
                                                    class="btn btn-sm btn-warning" title="Sửa">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <!-- Không cho xóa chính mình nếu cần, logic đơn giản cho phép xóa nhưng cần confirm kỹ -->
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="deleteUser(<?= $user['id'] ?>)" title="Xóa">
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
                                    <!-- Previous -->
                                    <li class="page-item <?= ($current_page <= 1) ? 'disabled' : '' ?>">
                                        <a class="page-link" href="?page=<?= $current_page - 1 ?>&keyword=<?= htmlspecialchars($keyword ?? '') ?>" tabindex="-1">Trước</a>
                                    </li>
                                    
                                    <!-- Numbers -->
                                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <li class="page-item <?= ($i == $current_page) ? 'active' : '' ?>">
                                        <a class="page-link" href="?page=<?= $i ?>&keyword=<?= htmlspecialchars($keyword ?? '') ?>"><?= $i ?></a>
                                    </li>
                                    <?php endfor; ?>
                                    
                                    <!-- Next -->
                                    <li class="page-item <?= ($current_page >= $total_pages) ? 'disabled' : '' ?>">
                                        <a class="page-link" href="?page=<?= $current_page + 1 ?>&keyword=<?= htmlspecialchars($keyword ?? '') ?>">Sau</a>
                                    </li>
                                </ul>
                            </nav>
                            <?php endif; ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Footer nếu cần, hoặc include footer chung -->
            </div>
        </div>
    </div>

    <script src="<?= $base ?>/assets/js/jquery.min.js"></script>
    <script src="<?= $base ?>/assets/js/popper.min.js"></script>
    <script src="<?= $base ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= $base ?>/assets/js/sweetalert.js"></script>
    <script src="<?= $base ?>/assets/js/custom.js"></script>

    <script>
    function deleteUser(id) {
        if (!confirm('Bạn có chắc chắn muốn xóa người dùng này?')) {
            return;
        }

        fetch('<?= $base ?>/admin/users/' + id + '/delete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: '_csrf=' + encodeURIComponent(window.__csrf || '')
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    swal("Đã xóa!", "Người dùng đã bị xóa.", "success")
                        .then(() => window.location.reload());
                } else {
                    swal("Lỗi!", data.error || "Không thể xóa người dùng", "error");
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