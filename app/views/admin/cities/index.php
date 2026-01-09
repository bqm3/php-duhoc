<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Quản lý Thành Phố</title>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/fontawesome.css">
</head>
<body>
    <div class="container-fluid">
        <?php include __DIR__ . '/../../admin/header.php'; ?>
        <div class="row main-content">
            <?php include __DIR__ . '/../sidebar.php'; ?>
            <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><strong>Danh sách Thành Phố</strong></h5>
                    <a href="<?= $base ?>/admin/cities/create" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                </div>
                
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <form method="GET" action="" class="mb-3">
                            <div class="input-group" style="max-width: 400px;">
                                <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm..." value="<?= htmlspecialchars($keyword ?? '') ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>

                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên Thành Phố</th>
                                            <th>Slug</th>
                                            <th>Thứ tự</th>
                                            <th>Thuộc Quốc Gia</th>
                                            <th>Ngày tạo</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(empty($cities)): ?>
                                            <tr><td colspan="6" class="text-center">Chưa có dữ liệu</td></tr>
                                        <?php else: ?>
                                            <?php foreach ($cities as $item): ?>
                                            <tr>
                                                <td><?= $item['id'] ?></td>
                                                <td><strong><?= htmlspecialchars($item['name']) ?></strong></td>
                                                <td><?= htmlspecialchars($item['slug']) ?></td>
                                                <td><?= $item['display_order'] ?></td>
                                                <td><?= htmlspecialchars($item['country_name'] ?? 'Không') ?></td>
                                                <td><?= date('d/m/Y', strtotime($item['created_at'])) ?></td>
                                                <td>
                                                    <a href="<?= $base ?>/admin/cities/<?= $item['id'] ?>/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                    <button class="btn btn-sm btn-danger" onclick="deleteItem(<?= $item['id'] ?>)"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= $base ?>/assets/js/jquery.min.js"></script>
    <script src="<?= $base ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= $base ?>/assets/js/sweetalert.js"></script>
    <script src="<?= $base ?>/assets/js/toastr.min.js"></script>
    <script src="<?= $base ?>/assets/js/custom.js"></script>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/toastr.min.css">
    <script>
    function deleteItem(id) {
        if(!confirm('Bạn có chắc muốn xóa?')) return;
        
        const btn = document.querySelector('button[onclick="deleteItem(' + id + ')"]');
        const row = btn ? btn.closest('tr') : null;

        fetch('<?= $base ?>/admin/cities/' + id + '/delete', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: '_csrf=' + encodeURIComponent('<?= Csrf::token() ?>')
        }).then(res => res.json()).then(data => {
            if(data.success) {
                toastr.success('Xóa thành công!', 'Thành công');
                if (row) {
                    row.style.transition = 'all 0.5s';
                    row.style.opacity = '0';
                    setTimeout(() => row.remove(), 500);
                } else {
                    setTimeout(() => location.reload(), 1000);
                }
            }
            else alert(data.error);
        });
    }
    </script>
</body>
</html>
