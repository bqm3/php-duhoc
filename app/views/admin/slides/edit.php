<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sửa Slide</title>
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
                <h5 class="mb-3"><strong>Chỉnh sửa Slide</strong></h5>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="mt-1 mb-3 p-4 button-container bg-white border shadow-sm">
                            <form method="POST" action="<?= $base ?>/admin/slides/<?= $slide['id'] ?>"
                                enctype="multipart/form-data">
                                <input type="hidden" name="_csrf" value="<?= $csrf ?>">

                                <div class="form-group">
                                    <label>Tên Slide <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" required
                                        value="<?= htmlspecialchars($slide['name']) ?>">
                                </div>

                                <div class="form-group">
                                    <label>Hình ảnh Slide</label>
                                    <?php if ($slide['image_url']): ?>
                                        <div class="mb-2">
                                            <img src="<?= $base . $slide['image_url'] ?>" alt="Preview"
                                                style="max-height: 150px; border: 1px solid #ddd; padding: 5px; border-radius: 4px;">
                                        </div>
                                    <?php endif; ?>
                                    <input type="file" class="form-control" name="image">
                                    <small class="text-muted">Để trống nếu không muốn thay đổi ảnh. Kích thước gợi ý:
                                        1920x600px</small>
                                </div>

                                <div class="form-group">
                                    <label>Link Href (Khi click vào slide)</label>
                                    <input type="text" class="form-control" name="link_href"
                                        value="<?= htmlspecialchars($slide['link_href'] ?? '') ?>"
                                        placeholder="https://example.com/...">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Quốc Gia</label>
                                            <select class="form-control" name="id_country">
                                                <option value="">-- Tất cả quốc gia --</option>
                                                <?php foreach ($countries as $c): ?>
                                                    <option value="<?= $c['id'] ?>" <?= ($slide['id_country'] == $c['id']) ? 'selected' : '' ?>>
                                                        <?= htmlspecialchars($c['name']) ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Trường Học</label>
                                            <select class="form-control" name="id_school">
                                                <option value="">-- Tất cả trường học --</option>
                                                <?php foreach ($schools as $s): ?>
                                                    <option value="<?= $s['id'] ?>" <?= ($slide['id_school'] == $s['id']) ? 'selected' : '' ?>>
                                                        <?= htmlspecialchars($s['name']) ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Số thứ tự (STT)</label>
                                            <input type="number" class="form-control" name="stt"
                                                value="<?= $slide['stt'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group pt-4">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="is_hidden"
                                                    name="is_hidden" value="1" <?= $slide['is_hidden'] ? 'checked' : '' ?>>
                                                <label class="custom-control-label" for="is_hidden">Ẩn slide này</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    <textarea name="ghi_chu" class="form-control"
                                        rows="3"><?= htmlspecialchars($slide['ghi_chu'] ?? '') ?></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Cập nhật slide
                                </button>
                                <a href="<?= $base ?>/admin/slides" class="btn btn-secondary">Hủy</a>
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