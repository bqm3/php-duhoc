<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Thêm Trường Học</title>
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
                <h5 class="mb-3"><strong>Thêm Trường Học</strong></h5>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="mt-1 mb-3 p-4 button-container bg-white border shadow-sm">
                            <form method="POST" action="<?= $base ?>/admin/schools" enctype="multipart/form-data">
                                <input type="hidden" name="_csrf" value="<?= $csrf ?>">

                                <div class="form-group">
                                    <label>Tên Trường <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>

                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" name="slug">
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Quốc Gia</label>
                                            <select class="form-control" name="country_id" id="country_select">
                                                <option value="">-- Chọn --</option>
                                                <?php foreach ($countries as $c): ?>
                                                    <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['name']) ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Thành Phố</label>
                                            <select class="form-control" name="city_id" id="city_select">
                                                <option value="">-- Chọn --</option>
                                                <!-- Populated via JS based on country -->
                                                <?php foreach ($cities as $ci): ?>
                                                    <option value="<?= $ci['id'] ?>"
                                                        data-country="<?= $ci['country_id'] ?>">
                                                        <?= htmlspecialchars($ci['name']) ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Bậc Học</label>
                                            <select class="form-control" name="education_level_id">
                                                <option value="">-- Chọn --</option>
                                                <?php foreach ($levels as $l): ?>
                                                    <option value="<?= $l['id'] ?>"><?= htmlspecialchars($l['name']) ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Học Phí (Khoảng giá)</label>
                                    <input type="text" class="form-control" name="tuition_fee"
                                        placeholder="Ví dụ: 10.000 - 15.000 USD/năm">
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="is_scholarship"
                                            name="is_scholarship" value="1">
                                        <label class="custom-control-label" for="is_scholarship">Có học bổng</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Hình ảnh đại diện</label>
                                    <input type="file" class="form-control" name="image">
                                </div>

                                <div class="form-group">
                                    <label>Giới thiệu chi tiết</label>
                                    <textarea name="description" id="summernote" class="form-control"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="<?= $base ?>/admin/schools" class="btn btn-secondary">Hủy</a>
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
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    onImageUpload: function (files) {
                        uploadImage(files[0], '#summernote');
                    }
                }
            });

            // Filter cities by country
            $('#country_select').change(function () {
                var countryId = $(this).val();
                $('#city_select option').each(function () {
                    var cityCountry = $(this).data('country');
                    if (!countryId || cityCountry == countryId || $(this).val() == "") {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
                $('#city_select').val(""); // Reset city selection
            });
        });

        function uploadImage(file, editorId) {
            var data = new FormData();
            data.append("upload", file);
            data.append("_csrf", "<?= $csrf ?>");

            $.ajax({
                url: "<?= $base ?>/admin/posts/upload-image", // Reuse existing upload endpoint
                type: "POST",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",

                success: function (response) {
                    if (response.url) {
                        const fullUrl = "<?= $base ?>" + response.url;
                        $(editorId).summernote('insertImage', fullUrl, function ($image) {
                            $image.css('width', '100%');
                        });
                    } else {
                        alert("Không có URL trong phản hồi: " + JSON.stringify(response));
                    }
                },

                error: function (xhr, status, error) {
                    console.error("Lỗi tải lên:", {
                        status: xhr.status,
                        statusText: xhr.statusText,
                        responseText: xhr.responseText,
                        error: error,
                    });
                    alert("Tải lên thất bại: " + xhr.responseText);
                },
            });
        }

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