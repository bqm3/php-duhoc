<!-- app/views/admin/posts/create.php -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tạo Bài Viết</title>

    <link rel="stylesheet" href="<?= $base ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/quicksand.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/js/summernote/summernote-bs4.css">
</head>

<body>
    <div class="container-fluid">
        <?php include __DIR__ . '/../header.php'; ?>

        <div class="row main-content">
            <?php include __DIR__ . '/../sidebar.php'; ?>

            <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
                <div class="mb-3">
                    <h5 class="mb-0"><strong>Tạo Bài Viết Mới</strong></h5>
                    <span class="text-secondary">Bảng điều khiển <i class="fa fa-angle-right"></i> Bài viết <i class="fa fa-angle-right"></i> Tạo mới</span>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="mt-1 mb-3 p-4 button-container bg-white border shadow-sm">
                            <form id="createPostForm" method="POST" action="<?= $base ?>/admin/posts" enctype="multipart/form-data">
                                <input type="hidden" name="_csrf" value="<?= $csrf ?>">

                                <div class="form-group">
                                    <label for="title"><strong>Tiêu đề</strong> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" required
                                        placeholder="Nhập tiêu đề bài viết">
                                </div>

                                <div class="form-group">
                                    <label for="slug"><strong>Đường dẫn (Slug)</strong></label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        placeholder="Để trống để tự động tạo từ tiêu đề">
                                    <small class="form-text text-muted">Đường dẫn thân thiện URL. Tự động tạo nếu để trống.</small>
                                </div>

                                <div class="form-group">
                                    <label for="category_id"><strong>Danh mục</strong></label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="">-- Chọn danh mục --</option>
                                        <?php foreach ($categories as $cat): ?>
                                            <option value="<?= $cat['id'] ?>" <?= (isset($selected_category_id) && $selected_category_id == $cat['id']) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($cat['name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="country_id"><strong>Quốc gia</strong></label>
                                    <select class="form-control" id="country_id" name="country_id">
                                        <option value="">-- Chọn quốc gia (Tùy chọn) --</option>
                                        <?php foreach ($countries as $country): ?>
                                            <option value="<?= $country['id'] ?>"><?= htmlspecialchars($country['name']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="school_id"><strong>Trường học</strong></label>
                                    <select class="form-control" id="school_id" name="school_id">
                                        <option value="">-- Chọn trường học (Tùy chọn) --</option>
                                        <?php foreach ($schools as $school): ?>
                                            <option value="<?= $school['id'] ?>"><?= htmlspecialchars($school['name']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="is_popular" name="is_popular" value="1">
                                    <label class="form-check-label font-weight-bold" for="is_popular">Đánh dấu là bài viết nổi bật</label>
                                </div>

                                <div class="form-group">
                                    <label for="featured_image"><strong>Ảnh chính</strong></label>
                                    <input type="file" class="form-control" id="featured_image" name="featured_image" accept="image/*">
                                    <small class="form-text text-muted">Ảnh đại diện hiển thị ngoài danh sách/chi tiết bài viết.</small>
                                </div>

                                <div class="form-group">
                                    <label><strong>Tóm tắt</strong></label>
                                    <textarea name="summary" id="summernote_summary" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label><strong>Nội dung</strong></label>
                                    <textarea name="content" id="summernote" class="form-control"></textarea>
                                </div>

                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Tạo bài viết
                                    </button>
                                    <a href="<?= $base ?>/admin/posts" class="btn btn-secondary">
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
    <script src="<?= $base ?>/assets/js/summernote/summernote-bs4.js"></script>
    <script src="<?= $base ?>/assets/js/custom.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 400,
                callbacks: {
                    onImageUpload: function(files) {
                        uploadImage(files[0], '#summernote');
                    }
                }
            });

            $('#summernote_summary').summernote({
                height: 150,
                callbacks: {
                    onImageUpload: function(files) {
                        uploadImage(files[0], '#summernote_summary');
                    }
                }
            });
        });

       
        function uploadImage(file, editorId) {
            var data = new FormData();
            data.append("upload", file);
            data.append("_csrf", "<?= $csrf ?>");

            $.ajax({
                url: "<?= $base ?>/admin/posts/upload-image",
                type: "POST",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",

                success: function(response) {
                    console.log("Phản hồi thành công:", response);

                    if (response && response.url) {
                        const fullUrl = "<?= $base ?>" + response.url;

                        $(editorId).summernote('insertImage', fullUrl, function($image) {
                            $image.css('width', '100%');
                        });
                    } else {
                        alert("Không có URL trong phản hồi: " + JSON.stringify(response));
                    }
                },

                error: function(xhr, status, error) {
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

        // Tự động tạo slug từ tiêu đề
        document.getElementById('title').addEventListener('keyup', function() {
            var title = this.value;
            var slug = title.toLowerCase();

            // Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/g, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/g, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/g, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/g, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/g, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/g, 'y');
            slug = slug.replace(/đ/g, 'd');

            // Xóa ký tự đặc biệt
            slug = slug.replace(/[^a-z0-9 -]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');

            document.getElementById('slug').value = slug;
        });

        // Submit form
        document.getElementById('createPostForm').addEventListener('submit', function(e) {
            // Summernote tự động đồng bộ với textarea
        });
    </script>
</body>

</html>