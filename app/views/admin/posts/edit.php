<!-- app/views/admin/posts/edit.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Post</title>

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
                    <h5 class="mb-0"><strong>Edit Post</strong></h5>
                    <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Posts <i class="fa fa-angle-right"></i> Edit</span>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="mt-1 mb-3 p-4 button-container bg-white border shadow-sm">
                            <form id="editPostForm" method="POST" action="<?= $base ?>/admin/posts/<?= $post['id'] ?>" enctype="multipart/form-data">
                                <input type="hidden" name="_csrf" value="<?= $csrf ?>">

                                <div class="form-group">
                                    <label for="title"><strong>Title</strong> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" required
                                        value="<?= htmlspecialchars($post['title']) ?>"
                                        placeholder="Enter post title">
                                </div>

                                <div class="form-group">
                                    <label for="slug"><strong>Slug</strong></label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        value="<?= htmlspecialchars($post['slug']) ?>"
                                        placeholder="URL-friendly version">
                                    <small class="form-text text-muted">URL-friendly version of the title.</small>
                                </div>

                                <div class="form-group">
                                    <label for="category_id"><strong>Category</strong></label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="">-- Select Category --</option>
                                        <?php foreach ($categories as $cat): ?>
                                            <option value="<?= $cat['id'] ?>" <?= $post['category_id'] == $cat['id'] ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($cat['name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="featured_image"><strong>Ảnh chính</strong></label>

                                    <?php if (!empty($post['featured_image'])): ?>
                                        <img
                                            src="<?= htmlspecialchars(($base ?? '') . $post['featured_image']) ?>"
                                            style="max-width: 320px; height: auto; border-radius: 8px;">
                                    <?php endif; ?>

                                    <input type="file" class="form-control" id="featured_image" name="featured_image" accept="image/*">
                                    <small class="form-text text-muted">Chọn ảnh mới để thay ảnh hiện tại. Nếu không chọn sẽ giữ nguyên.</small>
                                </div>


                                <div class="form-group">
                                    <label><strong>Thông số</strong></label>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="small text-muted mb-1">Views</label>
                                            <div class="input-group">
                                                <input type="number" min="0" class="form-control" name="count_view"
                                                    value="<?= (int)$post['count_view'] ?>">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-outline-secondary" onclick="stepNumber('count_view', 1)">+1</button>
                                                    <button type="button" class="btn btn-outline-secondary" onclick="stepNumber('count_view', 10)">+10</button>
                                                    <button type="button" class="btn btn-outline-danger" onclick="setNumber('count_view', 0)">Reset</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="small text-muted mb-1">Shares</label>
                                            <div class="input-group">
                                                <input type="number" min="0" class="form-control" name="count_share"
                                                    value="<?= (int)$post['count_share'] ?>">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-outline-secondary" onclick="stepNumber('count_share', 1)">+1</button>
                                                    <button type="button" class="btn btn-outline-secondary" onclick="stepNumber('count_share', 10)">+10</button>
                                                    <button type="button" class="btn btn-outline-danger" onclick="setNumber('count_share', 0)">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <small class="form-text text-muted mt-2">
    Đây là số liệu admin set thủ công (không tự tăng theo lượt xem).
  </small> -->
                                </div>


                                <div class="form-group">
                                    <label><strong>Content</strong></label>
                                    <textarea name="content" id="summernote" class="form-control"><?= htmlspecialchars($post['content']) ?></textarea>
                                </div>

                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Update Post
                                    </button>
                                    <a href="<?= $base ?>/admin/posts" class="btn btn-secondary">
                                        <i class="fa fa-times"></i> Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 mb-4 footer">
                    <div class="col-sm-8">
                        <span>&copy; All rights reserved 2019 designed by <a class="text-info" href="#">A-Fusion</a></span>
                    </div>
                    <div class="col-sm-4 text-right">
                        <a href="#" class="ml-2">Contact Us</a>
                        <a href="#" class="ml-2">Support</a>
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
        function stepNumber(name, step) {
            const el = document.querySelector('input[name="' + name + '"]');
            if (!el) return;
            const v = parseInt(el.value || '0', 10);
            el.value = Math.max(0, v + step);
        }

        function setNumber(name, value) {
            const el = document.querySelector('input[name="' + name + '"]');
            if (!el) return;
            el.value = Math.max(0, parseInt(value || '0', 10));
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 400,
                callbacks: {
                    onImageUpload: function(files) {
                        uploadImage(files[0]);
                    }
                }
            });
        });

       
            function uploadImage(file) {
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

                    // QUAN TRỌNG: ép parse JSON
                    dataType: "json",

                    success: function(response) {
                        console.log("Success response:", response);

                        if (response && response.url) {
                            // QUAN TRỌNG: project chạy subfolder => phải cộng $base
                            const fullUrl = "<?= $base ?>" + response.url;

                            $('#summernote').summernote('insertImage', fullUrl, function($image) {
                                $image.css('width', '100%');
                            });
                        } else {
                            alert("No URL in response: " + JSON.stringify(response));
                        }
                    },

                    error: function(xhr, status, error) {
                        console.error("Upload error:", {
                            status: xhr.status,
                            statusText: xhr.statusText,
                            responseText: xhr.responseText,
                            error: error,
                        });
                        alert("Upload failed: " + xhr.responseText);
                    },
                });
            }


            // Auto-generate slug from title
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
            document.getElementById('editPostForm').addEventListener('submit', function(e) {
                // e.preventDefault();

                // Summernote syncs automatically to textarea
                // No manual sync needed
            });
    </script>
</body>

</html>