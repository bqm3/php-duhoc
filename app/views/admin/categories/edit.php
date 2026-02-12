<!-- app/views/admin/categories/edit.php -->
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
    <div class="container-fluid">
        <?php include __DIR__ . '/../../admin/header.php'; ?>

        <div class="row main-content">
            <?php include __DIR__ . '/../../admin/sidebar.php'; ?>

            <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
                <div class="mb-3">
                    <h5 class="mb-0"><strong>Chỉnh sửa danh mục</strong></h5>
                    <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Categories <i
                            class="fa fa-angle-right"></i> Edit</span>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <?php if (isset($_GET['error']) && $_GET['error'] == 'empty_name'): ?>
                                <div class="alert alert-danger">Tên danh mục không được để trống.</div>
                            <?php endif; ?>

                            <form action="<?= $base ?>/admin/categories/<?= $category['id'] ?>" method="POST">
                                <input type="hidden" name="_csrf" value="<?= $csrf ?>">

                                <div class="form-group">
                                    <label>Tên danh mục <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" required
                                        value="<?= htmlspecialchars($category['name']) ?>">
                                </div>

                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" name="slug"
                                        value="<?= htmlspecialchars($category['slug']) ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Thứ tự hiển thị</label>
                                    <input type="number" class="form-control" name="display_order"
                                        value="<?= $category['display_order'] ?>">
                                </div>

                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                <a href="<?= $base ?>/admin/categories" class="btn btn-secondary">Hủy</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= $base ?>/assets/js/jquery.min.js"></script>
    <script src="<?= $base ?>/assets/js/popper.min.js"></script>
    <script src="<?= $base ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= $base ?>/assets/js/custom.js"></script>

    <script>
        // Hàm tạo slug đơn giản phía client
        function generateSlug() {
            var name = document.getElementById('name').value;
            var slug = name.toLowerCase();

            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/g, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/g, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/g, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/g, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/g, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/g, 'y');
            slug = slug.replace(/đ/g, 'd');

            slug = slug.replace(/[^a-z0-9 -]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');

            document.getElementById('slug').value = slug;
        }
    </script>
</body>

</html>