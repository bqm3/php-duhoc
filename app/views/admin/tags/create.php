<!-- app/views/admin/tags/create.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create Tag</title>

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
                    <h5 class="mb-0"><strong>Thêm Tag mới</strong></h5>
                    <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Tags <i
                            class="fa fa-angle-right"></i> Create</span>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-6">
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger">
                                    <?= $error ?>
                                </div>
                            <?php endif; ?>

                            <form method="POST" action="<?= $base ?>/admin/tags">
                                <input type="hidden" name="_csrf" value="<?= $csrf ?>">

                                <div class="form-group">
                                    <label for="name"><strong>Tên Tag</strong></label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="<?= htmlspecialchars($old['name'] ?? '') ?>" required>
                                    <small class="form-text text-muted">Ví dụ: Hot, New, SALE, v.v.</small>
                                </div>

                                <div class="form-group">
                                    <label for="icon"><strong>Icon (FontAwesome class)</strong></label>
                                    <input type="text" class="form-control" id="icon" name="icon"
                                        value="<?= htmlspecialchars($old['icon'] ?? '') ?>">
                                    <small class="form-text text-muted">Nhập class FontAwesome. Ví dụ:
                                        <code>fa fa-star text-warning</code>,
                                        <code>fa fa-fire text-danger</code><br>
                                        Tìm icon tại: <a href="https://fontawesome.com/v4/icons/"
                                            target="_blank">FontAwesome 4 Icons <i class="fa fa-external-link"></i></a>
                                    </small>
                                    <div class="mt-2 text-secondary">
                                        Preview: <span id="icon-preview"><i
                                                class="<?= htmlspecialchars($old['icon'] ?? 'fa fa-star text-warning') ?>"></i></span>
                                    </div>
                                </div>

                                <hr>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Lưu Tag
                                    </button>
                                    <a href="<?= $base ?>/admin/tags" class="btn btn-secondary">
                                        <i class="fa fa-times"></i> Hủy
                                    </a>
                                </div>
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
        $(document).ready(function () {
            $('#icon').on('input', function () {
                var iconClass = $(this).val();
                $('#icon-preview').html('<i class="' + iconClass + '"></i>');
            });
        });
    </script>
</body>

</html>