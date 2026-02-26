<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Thêm Đối tác</title>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/fontawesome.css">
</head>

<body>
    <div class="container-fluid">
        <?php include __DIR__ . '/../../admin/header.php'; ?>
        <div class="row main-content">
            <?php include __DIR__ . '/../../admin/sidebar.php'; ?>
            <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
                <h5 class="mb-3"><strong>Thêm Đối tác Mới</strong></h5>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="mt-1 mb-3 p-4 button-container bg-white border shadow-sm">
                            <form method="POST" action="<?= $base ?>/admin/partners" enctype="multipart/form-data">
                                <input type="hidden" name="_csrf" value="<?= $csrf ?>">
                                <input type="hidden" name="redirect_to"
                                    value="<?= htmlspecialchars($redirect_to ?? '') ?>">

                                <div class="form-group">
                                    <label>Tên Đối tác <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" required
                                        placeholder="Nhập tên đối tác">
                                </div>

                                <div class="form-group">
                                    <label>Logo Đối tác <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="image" required>
                                    <small class="text-muted">Kích thước gợi ý: 200x100px</small>
                                </div>

                                <div class="form-group">
                                    <label>Link Href (Khi click vào logo)</label>
                                    <input type="text" class="form-control" name="link_href"
                                        placeholder="https://example.com/...">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Số thứ tự (STT)</label>
                                            <input type="number" class="form-control" name="stt" value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group pt-4">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="is_hidden"
                                                    name="is_hidden" value="1">
                                                <label class="custom-control-label" for="is_hidden">Ẩn đối tác
                                                    này</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Lưu đối tác
                                </button>
                                <a href="<?= $base ?>/admin/partners" class="btn btn-secondary">Hủy</a>
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
</body>

</html>