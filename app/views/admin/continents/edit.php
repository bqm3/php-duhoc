<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sửa Châu Lục</title>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/js/summernote/summernote-bs4.css">
</head>
<body>
    <div class="container-fluid">
        <?php include __DIR__ . '/../../admin/header.php'; ?>
        <div class="row main-content">
            <?php include __DIR__ . '/../sidebar.php'; ?>
            <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
                <h5 class="mb-3"><strong>Sửa Châu Lục</strong></h5>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="mt-1 mb-3 p-4 button-container bg-white border shadow-sm">
                            <form method="POST" action="<?= $base ?>/admin/continents/<?= $continent['id'] ?>/update" enctype="multipart/form-data">
                                <input type="hidden" name="_csrf" value="<?= $csrf ?>">
                                
                                <div class="form-group">
                                    <label>Tên Châu Lục <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($continent['name']) ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" name="slug" value="<?= htmlspecialchars($continent['slug']) ?>">
                                </div>

                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <?php if($continent['image_url']): ?>
                                        <div class="mb-2"><img src="<?= $base . $continent['image_url'] ?>" style="max-width: 200px;"></div>
                                    <?php endif; ?>
                                    <input type="file" class="form-control" name="image">
                                </div>

                                <div class="form-group">
                                    <label>Thứ tự hiển thị</label>
                                    <input type="number" class="form-control" name="display_order" value="<?= $continent['display_order'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="description" id="summernote" class="form-control"><?= htmlspecialchars($continent['description']) ?></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                <a href="<?= $base ?>/admin/continents" class="btn btn-secondary">Hủy</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= $base ?>/assets/js/jquery.min.js"></script>
    <script src="<?= $base ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= $base ?>/assets/js/summernote/summernote-bs4.js"></script>
    <script src="<?= $base ?>/assets/js/custom.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({height: 200});
        });
    </script>
</body>
</html>
