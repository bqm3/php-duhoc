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
                    <span class="text-secondary">Bảng điều khiển <i class="fa fa-angle-right"></i> Bài viết <i
                            class="fa fa-angle-right"></i> Tạo mới</span>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="mt-1 mb-3 p-4 button-container bg-white border shadow-sm">
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fa fa-exclamation-circle mr-2"></i>
                                    <strong>Lỗi:</strong> <?= htmlspecialchars($error) ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <form id="createPostForm" method="POST" action="<?= $base ?>/admin/posts"
                                enctype="multipart/form-data">
                                <input type="hidden" name="_csrf" value="<?= $csrf ?>">
                                <input type="hidden" name="redirect_to" value="<?= htmlspecialchars($redirect_to) ?>">

                                <div class="form-group">
                                    <label for="title"><strong>Tiêu đề</strong> <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" required
                                        placeholder="Nhập tiêu đề bài viết">
                                </div>

                                <div class="form-group">
                                    <label for="slug"><strong>Đường dẫn (Slug)</strong></label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        placeholder="Để trống để tự động tạo từ tiêu đề">
                                    <small class="form-text text-muted">Đường dẫn thân thiện URL. Tự động tạo nếu để
                                        trống.</small>
                                </div>

                                <div class="form-group">
                                    <label for="category_id"><strong>Danh mục chính</strong></label>
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
                                    <label for="second_category_id"><strong>Danh mục phụ</strong></label>
                                    <select class="form-control" id="second_category_id" name="second_category_id">
                                        <option value="">-- Chọn danh mục phụ (Tùy chọn) --</option>
                                        <?php foreach ($categories as $cat): ?>
                                            <option value="<?= $cat['id'] ?>">
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
                                            <option value="<?= $country['id'] ?>"><?= htmlspecialchars($country['name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="school_id"><strong>Trường học</strong></label>
                                    <select class="form-control" id="school_id" name="school_id">
                                        <option value="">-- Chọn trường học (Tùy chọn) --</option>
                                        <?php foreach ($schools as $school): ?>
                                            <option value="<?= $school['id'] ?>"><?= htmlspecialchars($school['name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tag_id"><strong>Gắn Tag (Cập nhật)</strong></label>
                                    <select class="form-control" id="tag_id" name="tag_id">
                                        <option value="">-- Không có tag --</option>
                                        <?php foreach ($tags as $tag): ?>
                                            <option value="<?= $tag['id'] ?>">
                                                <?= htmlspecialchars($tag['name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="is_hidden" name="is_hidden"
                                        value="1">
                                    <label class="form-check-label font-weight-bold" for="is_hidden">Ẩn bài viết (không
                                        hiển thị)</label>
                                </div>

                                <div class="form-group">
                                    <label for="created_at"><strong>Ngày tạo</strong></label>
                                    <input type="datetime-local" class="form-control" id="created_at" name="created_at"
                                        value="<?= date('Y-m-d\TH:i') ?>">
                                    <small class="form-text text-muted">Mặc định là thời gian hiện tại.</small>
                                </div>

                                <div class="form-group">
                                    <label for="updated_at"><strong>Ngày cập nhật</strong></label>
                                    <input type="datetime-local" class="form-control" id="updated_at" name="updated_at"
                                        value="<?= date('Y-m-d\TH:i') ?>">
                                    <small class="form-text text-muted">Mặc định là thời gian hiện tại.</small>
                                </div>

                                <div class="form-group">
                                    <label for="featured_image"><strong>Ảnh chính</strong></label>
                                    <input type="file" class="form-control" id="featured_image" name="featured_image"
                                        accept="image/*">
                                    <small class="form-text text-muted">Ảnh đại diện hiển thị ngoài danh sách/chi tiết
                                        bài viết.</small>
                                </div>

                                <div class="form-group">
                                    <label><strong>Tóm tắt</strong></label>
                                    <textarea name="summary" id="summernote_summary" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label><strong>Nội dung</strong></label>
                                    <textarea name="content" id="summernote" class="form-control"></textarea>
                                </div>

                                <hr>
                                <h6 class="mb-3"><strong>Cấu hình SEO</strong></h6>

                                <div class="form-group">
                                    <label for="meta_title"><strong>Meta Title</strong></label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title"
                                        placeholder="Tiêu đề hiển thị trên Google">
                                </div>

                                <div class="form-group">
                                    <label for="meta_description"><strong>Meta Description</strong></label>
                                    <textarea class="form-control" id="meta_description" name="meta_description"
                                        rows="3" placeholder="Mô tả ngắn hiển thị trên Google"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="meta_keywords"><strong>Meta Keywords</strong></label>
                                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                        placeholder="Từ khóa SEO, cách nhau bởi dấu phẩy">
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
    <script src="<?= $base ?>/assets/js/sweetalert.js"></script>
    <script src="<?= $base ?>/assets/js/toastr.min.js"></script>
    <script src="<?= $base ?>/assets/js/custom.js"></script>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/toastr.min.css">

    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 400,
                callbacks: {
                    onImageUpload: function (files) {
                        uploadImage(files[0], '#summernote');
                    }
                }
            });

            $('#summernote_summary').summernote({
                height: 150,
                callbacks: {
                    onImageUpload: function (files) {
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

                success: function (response) {
                    console.log("Phản hồi thành công:", response);

                    if (response && response.url) {
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

        // Tự động tạo slug từ tiêu đề
        document.getElementById('title').addEventListener('keyup', function () {
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

        // Submit form với AJAX để hiển thị lỗi đẹp
        document.getElementById('createPostForm').addEventListener('submit', function (e) {
            e.preventDefault();

            // Summernote tự động đồng bộ với textarea
            $('#summernote').summernote('code');
            $('#summernote_summary').summernote('code');

            const form = this;
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;

            // Disable button và hiển thị loading
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Đang tạo...';

            fetch(form.action, {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    // Kiểm tra content-type để biết response là JSON hay HTML
                    const contentType = response.headers.get('content-type') || '';

                    if (contentType.includes('application/json')) {
                        // Nếu là JSON, parse và kiểm tra
                        return response.json().then(data => {
                            if (data.error) {
                                // Có lỗi, throw để catch xử lý
                                throw new Error(data.error);
                            }
                            // Nếu không có error, có thể là success
                            if (data.success || data.redirect_to) {
                                window.location.href = data.redirect_to || '<?= $base ?>/admin/posts';
                                return;
                            }
                            throw new Error('Có lỗi xảy ra');
                        });
                    }

                    // Nếu không phải JSON, kiểm tra status
                    if (response.status >= 200 && response.status < 300) {
                        // Thành công, redirect về danh sách hoặc trang trước đó
                        window.location.href = '<?= htmlspecialchars($redirect_to) ?>';
                        return;
                    }

                    // Nếu có lỗi HTTP
                    throw new Error('HTTP Error: ' + response.status);
                })
                .catch(error => {
                    // Hiển thị lỗi bằng toastr hoặc sweetalert
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;

                    const errorMessage = error.message || 'Có lỗi xảy ra khi tạo bài viết';

                    if (typeof toastr !== 'undefined') {
                        toastr.error(errorMessage, 'Lỗi', {
                            timeOut: 5000,
                            closeButton: true
                        });
                    } else if (typeof swal !== 'undefined') {
                        swal("Lỗi!", errorMessage, "error");
                    } else {
                        alert('Lỗi: ' + errorMessage);
                    }
                });
        });
    </script>
</body>

</html>