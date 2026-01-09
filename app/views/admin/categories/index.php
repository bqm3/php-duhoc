<!-- app/views/admin/categories/index.php -->
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
        <?php include __DIR__ . '/../../admin/sidebar.php'; ?>
        
        <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0"><strong>Quản lý Danh mục</strong></h5>
                    <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Categories</span>
                </div>
                <a href="<?= $base ?>/admin/categories/create" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Thêm danh mục
                </a>
            </div>
            
            <div class="row mt-3">
                <div class="col-sm-12">
                    <!-- Search Form -->
                    <form method="GET" action="" class="mb-3">
                        <div class="input-group" style="max-width: 400px;">
                            <input type="text" name="keyword" class="form-control" placeholder="Tìm tên danh mục, slug..." value="<?= htmlspecialchars($keyword ?? '') ?>">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>

                    <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                        <?php if (empty($categories)): ?>
                            <div class="alert alert-info">Chưa có danh mục nào.</div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên danh mục</th>
                                            <th>Slug</th>
                                            <th>Thứ tự</th>
                                            <th>Số bài viết</th>
                                            <th>Ngày tạo</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($categories as $cat): ?>
                                            <tr>
                                                <td><?= $cat['id'] ?></td>
                                                <td><strong><?= htmlspecialchars($cat['name']) ?></strong></td>
                                                <td><code><?= htmlspecialchars($cat['slug']) ?></code></td>
                                                <td><?= $cat['display_order'] ?></td>
                                                <td>
                                                    <span class="badge badge-secondary"><?= $cat['post_count'] ?></span>
                                                </td>
                                                <td><?= date('d/m/Y', strtotime($cat['created_at'])) ?></td>
                                                <td>
                                                    <a href="<?= $base ?>/admin/categories/<?= $cat['id'] ?>/edit" 
                                                       class="btn btn-sm btn-warning" title="Sửa">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-danger" 
                                                            onclick="deleteCategory(<?= $cat['id'] ?>)" 
                                                            title="Xóa">
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
                                        <a class="page-link" href="?page=<?= $current_page - 1 ?>&keyword=<?= htmlspecialchars($keyword ?? '') ?>" tabindex="-1">Trước</a>
                                    </li>
                                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <li class="page-item <?= ($i == $current_page) ? 'active' : '' ?>">
                                        <a class="page-link" href="?page=<?= $i ?>&keyword=<?= htmlspecialchars($keyword ?? '') ?>"><?= $i ?></a>
                                    </li>
                                    <?php endfor; ?>
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
        </div>
    </div>
</div>

<script src="<?= $base ?>/assets/js/jquery.min.js"></script>
<script src="<?= $base ?>/assets/js/popper.min.js"></script>
<script src="<?= $base ?>/assets/js/bootstrap.min.js"></script>
<script src="<?= $base ?>/assets/js/sweetalert.js"></script>
<script src="<?= $base ?>/assets/js/custom.js"></script>

<script>
function deleteCategory(id) {
    if (!confirm('Bạn có chắc chắn muốn xóa danh mục này?')) {
        return;
    }
    
    fetch('<?= $base ?>/admin/categories/' + id + '/delete', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: '_csrf=' + encodeURIComponent(window.__csrf || '')
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            swal("Đã xóa!", "Danh mục đã bị xóa.", "success")
                .then(() => window.location.reload());
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