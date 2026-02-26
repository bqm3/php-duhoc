<!-- app/views/admin/testimonials/edit.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chỉnh sửa ý kiến khách hàng</title>

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
                <div class="mb-3">
                    <h5 class="mb-0"><strong>Chỉnh sửa ý kiến khách hàng</strong></h5>
                    <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Testimonials <i
                            class="fa fa-angle-right"></i> Edit</span>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <?php if (isset($_GET['error'])): ?>
                                <div class="alert alert-danger">
                                    <?php
                                    if ($_GET['error'] === 'empty_fields')
                                        echo "Vui lòng nhập đầy đủ các trường bắt buộc.";
                                    else if ($_GET['error'] === 'system_error')
                                        echo "Lỗi hệ thống, không thể cập nhật.";
                                    else
                                        echo htmlspecialchars($_GET['error']);
                                    ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?= $base ?>/admin/testimonials/<?= $testimonial['id'] ?>/update"
                                method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_csrf" value="<?= $csrf ?>">
                                <input type="hidden" name="redirect_to"
                                    value="<?= htmlspecialchars($redirect_to ?? '') ?>">

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Họ tên khách hàng <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Ví dụ: Nguyễn Văn A" required
                                                value="<?= htmlspecialchars($testimonial['name']) ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Vai trò / Danh hiệu</label>
                                            <input type="text" name="role" class="form-control"
                                                placeholder="Ví dụ: Học viên du học Úc"
                                                value="<?= htmlspecialchars($testimonial['role']) ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Nội dung ý kiến <span class="text-danger">*</span></label>
                                            <textarea name="content" class="form-control" rows="6" required
                                                placeholder="Nhập nội dung chia sẻ..."><?= htmlspecialchars($testimonial['content']) ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ảnh đại diện</label>
                                            <input type="file" name="image" class="form-control-file mb-2"
                                                onchange="previewImage(this)">
                                            <div id="image-preview" class="border p-2 text-center"
                                                style="min-height: 150px;">
                                                <?php if ($testimonial['image_url']): ?>
                                                    <img src="<?= $base . $testimonial['image_url'] ?>"
                                                        style="max-width: 100%; max-height: 200px;">
                                                <?php else: ?>
                                                    <small class="text-muted">Chưa có ảnh</small>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Đánh giá (Số sao)</label>
                                            <select name="rating" class="form-control">
                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                    <option value="<?= $i ?>" <?= $testimonial['rating'] == $i ? 'selected' : '' ?>>
                                                        <?= $i ?> Sao
                                                    </option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Thứ tự hiển thị</label>
                                            <input type="number" name="display_order" class="form-control"
                                                value="<?= $testimonial['display_order'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="is_hidden"
                                                    name="is_hidden" <?= $testimonial['is_hidden'] ? 'checked' : '' ?>>
                                                <label class="custom-control-label" for="is_hidden">Ẩn ý kiến
                                                    này</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    <a href="<?= $base ?>/admin/testimonials" class="btn btn-light border">Hủy bỏ</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= $base ?>/assets/js/jquery.min.js"></script>
    <script src="<?= $base ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= $base ?>/assets/js/custom.js"></script>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('image-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.innerHTML = `<img src="${e.target.result}" style="max-width: 100%; max-height: 200px;">`;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>