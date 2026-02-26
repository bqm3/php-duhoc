<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Thêm Quốc Gia</title>
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
                <h5 class="mb-3"><strong>Thêm Quốc Gia</strong></h5>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="mt-1 mb-3 p-4 button-container bg-white border shadow-sm">
                            <form method="POST" action="<?= $base ?>/admin/countries" enctype="multipart/form-data">
                                <input type="hidden" name="_csrf" value="<?= $csrf ?>">
                                <input type="hidden" name="redirect_to"
                                    value="<?= htmlspecialchars($redirect_to ?? '') ?>">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tên Quốc Gia <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mã Quốc Gia (VD: VN, US)</label>
                                            <input type="text" class="form-control" name="code">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Thuộc Châu Lục</label>
                                    <select class="form-control" name="continent_id">
                                        <option value="0">-- Chọn Châu Lục --</option>
                                        <?php foreach ($continents as $c): ?>
                                            <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['name']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Slug (tùy chọn)</label>
                                    <input type="text" class="form-control" name="slug">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Cờ (Flag)</label>
                                            <input type="file" class="form-control" name="flag">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Hình ảnh đại diện</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="is_popular" name="is_popular"
                                        value="1">
                                    <label class="form-check-label" for="is_popular">Đánh dấu là Phổ biến (Hiển thị
                                        trang chủ)</label>
                                </div>

                                <div class="form-group">
                                    <label>Thứ tự hiển thị</label>
                                    <input type="number" class="form-control" name="display_order" value="0">
                                </div>

                                <div class="form-group">
                                    <label>Mô tả / Giới thiệu</label>
                                    <textarea name="description" id="summernote" class="form-control"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="<?= $base ?>/admin/countries" class="btn btn-secondary">Hủy</a>
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
    <script src="<?= $base ?>/assets/js/summernote/summernote-bs4.js"></script>
    <script src="<?= $base ?>/assets/js/custom.js"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({ height: 200 });
        });

        document.querySelector('input[name="name"]').addEventListener('keyup', function () {
            var title = this.value;
            var slug = title.toLowerCase();
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/g, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/g, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/g, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/g, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/g, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/g, 'y');
            slug = slug.replace(/đ/g, 'd');
            slug = slug.replace(/[^a-z0-9 -]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-');
            document.querySelector('input[name="slug"]').value = slug;
        });
    </script>
</body>

</html>