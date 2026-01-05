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
    
    <script src="<?= $base ?>/assets/js/ckeditor5/build-document/ckeditor.js"></script>
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
                            <form id="editPostForm" method="POST" action="<?= $base ?>/admin/posts/<?= $post['id'] ?>">
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
                                    <label><strong>Statistics</strong></label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="alert alert-info">
                                                <i class="fa fa-eye"></i> <strong>Views:</strong> <?= $post['count_view'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="alert alert-success">
                                                <i class="fa fa-share"></i> <strong>Shares:</strong> <?= $post['count_share'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label><strong>Content</strong></label>
                                    <div id="toolbar-container"></div>
                                    <div class="border" style="background: #f5f5f5; padding: 20px;">
                                        <div id="document_editor" class="editor bg-white shadow-sm p-5" style="min-height: 400px;">
                                            <?= $post['content'] ?>
                                        </div>
                                    </div>
                                    <textarea name="content" id="content" style="display: none;"></textarea>
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
    
    <script>
    let editor;
    
    DecoupledEditor
        .create(document.querySelector('#document_editor'))
        .then(newEditor => {
            editor = newEditor;
            const toolbarContainer = document.querySelector('#toolbar-container');
            toolbarContainer.appendChild(editor.ui.view.toolbar.element);
        })
        .catch(error => {
            console.error(error);
        });
    
    // Auto-generate slug from title if slug is empty
    document.getElementById('title').addEventListener('input', function() {
        const slugInput = document.getElementById('slug');
        const currentSlug = slugInput.getAttribute('data-original') || '<?= htmlspecialchars($post['slug']) ?>';
        
        if (!slugInput.value || slugInput.value === currentSlug) {
            slugInput.value = generateSlug(this.value);
        }
    });
    
    function generateSlug(text) {
        return text
            .toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/đ/g, 'd')
            .replace(/Đ/g, 'd')
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .replace(/^-+|-+$/g, '');
    }
    
    // Submit form
    document.getElementById('editPostForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get editor content and put it in hidden textarea
        document.getElementById('content').value = editor.getData();
        
        // Submit form
        this.submit();
    });
    </script>
</body>
</html>