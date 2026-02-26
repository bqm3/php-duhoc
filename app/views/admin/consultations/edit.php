<!-- app/views/admin/consultations/edit.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chi Tiết Tư Vấn</title>

    <link rel="stylesheet" href="<?= $base ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/quicksand.css">
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
                <div class="mb-3">
                    <h5 class="mb-0"><strong>Chi Tiết Yêu Cầu Tư Vấn</strong></h5>
                    <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Consultations <i
                            class="fa fa-angle-right"></i> Edit</span>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="mt-1 mb-3 p-4 button-container bg-white border shadow-sm">
                            <form method="POST"
                                action="<?= $base ?>/admin/consultations/<?= $consultation['id'] ?>/update">
                                <input type="hidden" name="_csrf" value="<?= $csrf ?>">
                                <input type="hidden" name="redirect_to"
                                    value="<?= htmlspecialchars($redirect_to ?? '') ?>">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><strong>Họ Tên</strong></label>
                                            <input type="text" class="form-control"
                                                value="<?= htmlspecialchars($consultation['full_name']) ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><strong>Số Điện Thoại</strong></label>
                                            <input type="text" class="form-control"
                                                value="<?= htmlspecialchars($consultation['phone']) ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label><strong>Email</strong></label>
                                    <input type="text" class="form-control"
                                        value="<?= htmlspecialchars($consultation['email']) ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label><strong>Nội Dung Yêu Cầu (Từ khách hàng)</strong></label>
                                    <textarea class="form-control" rows="4"
                                        readonly><?= htmlspecialchars($consultation['message']) ?></textarea>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label for="status"><strong>Trạng Thái Xử Lý</strong></label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="new" <?= ($consultation['status'] ?? 'new') == 'new' ? 'selected' : '' ?>>Mới</option>
                                        <option value="processing" <?= ($consultation['status'] ?? '') == 'processing' ? 'selected' : '' ?>>Đang xử lý</option>
                                        <option value="completed" <?= ($consultation['status'] ?? '') == 'completed' ? 'selected' : '' ?>>Hoàn thành</option>
                                        <option value="cancelled" <?= ($consultation['status'] ?? '') == 'cancelled' ? 'selected' : '' ?>>Hủy bỏ</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="description"><strong>Ghi Chú / Nhật Ký Xử Lý (Admin)</strong></label>
                                    <textarea name="description" id="summernote"
                                        class="form-control"><?= htmlspecialchars($consultation['description'] ?? '') ?></textarea>
                                </div>

                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Cập Nhật
                                    </button>
                                    <a href="<?= $base ?>/admin/consultations" class="btn btn-secondary">
                                        <i class="fa fa-arrow-left"></i> Quay Lại
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
    <script src="<?= $base ?>/assets/js/summernote/summernote-bs4.js"></script>
    <script src="<?= $base ?>/assets/js/custom.js"></script>

    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 200,
                // toolbar: [
                //     ['style', ['bold', 'italic', 'underline', 'clear']],
                //     ['font', ['strikethrough', 'superscript', 'subscript']],
                //     ['fontsize', ['fontsize']],
                //     ['color', ['color']],
                //     ['para', ['ul', 'ol', 'paragraph']],
                //     ['height', ['height']]
                // ]
            });
        });
    </script>
</body>

</html>