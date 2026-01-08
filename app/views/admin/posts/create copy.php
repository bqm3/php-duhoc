<!-- app/views/admin/posts/create.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create Post</title>


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
                    <h5 class="mb-0"><strong>Create New Post</strong></h5>
                    <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Posts <i class="fa fa-angle-right"></i> Create</span>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="mt-1 mb-3 p-4 button-container bg-white border shadow-sm">
                            <form id="createPostForm" method="POST" action="<?= $base ?>/admin/posts" enctype="multipart/form-data">
                                <input type="hidden" name="_csrf" value="<?= $csrf ?>">

                                <div class="form-group">
                                    <label for="title"><strong>Title</strong> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" required
                                        placeholder="Enter post title">
                                </div>

                                <div class="form-group">
                                    <label for="slug"><strong>Slug</strong></label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        placeholder="Leave empty to auto-generate from title">
                                    <small class="form-text text-muted">URL-friendly version of the title. Auto-generated if left empty.</small>
                                </div>

                                <div class="form-group">
                                    <label for="category_id"><strong>Category</strong></label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="">-- Select Category --</option>
                                        <?php foreach ($categories as $cat): ?>
                                            <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="featured_image"><strong>Ảnh chính</strong></label>
                                    <input type="file" class="form-control" id="featured_image" name="featured_image" accept="image/*">
                                    <small class="form-text text-muted">Ảnh đại diện hiển thị ngoài danh sách/chi tiết bài viết.</small>
                                </div>

                                <div class="form-group">
                                    <label><strong>Summary</strong></label>
                                    <textarea name="summary" id="summernote_summary" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label><strong>Content</strong></label>
                                    <textarea name="content" id="summernote" class="form-control"></textarea>
                                </div>

                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Create Post
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
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ],
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
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "post",
                success: function(response) {
                    if (response.url) {
                        $(editorId).summernote('insertImage', response.url, function($image) {
                            $image.css('width', '100%');
                            $image.attr('data-filename', 'image');
                        });
                    } else {
                        console.log(response);
                    }
                },
                error: function(data) {
                    console.log(data);
                }
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
    </script>
</body>

</html>