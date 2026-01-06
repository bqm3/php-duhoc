<!-- app/views/admin/posts/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Posts Management</title>
    
    <link rel="stylesheet" href="<?= $base ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/quicksand.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/fontawesome.css">
</head>
<body>
    <div class="container-fluid">
        <?php include __DIR__ . '/../header.php'; ?>
        
        <div class="row main-content">
            <?php include __DIR__ . '/../sidebar.php'; ?>
            
            <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0"><strong>Posts Management</strong></h5>
                        <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Posts</span>
                    </div>
                    <a href="<?= $base ?>/admin/posts/create" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Create New Post
                    </a>
                </div>
                
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <?php if (empty($posts)): ?>
                                <div class="alert alert-info">
                                    No posts found. <a href="<?= $base ?>/admin/posts/create">Create your first post</a>
                                </div>
                            <?php else: ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Slug</th>
                                                <th>Người tạo</th>
                                                <th>Category</th>
                                                <th>Views</th>
                                                <th>Shares</th>
                                                <th>Created</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($posts as $post): ?>
                                                <tr>
                                                    <td><?= $post['id'] ?></td>
                                                    <td>
                                                        <strong><?= htmlspecialchars($post['title']) ?></strong>
                                                    </td>
                                                    <td>
                                                        <code><?= htmlspecialchars($post['slug']) ?></code>
                                                    </td>
                                                    <td>
                                                        <span class="text-primary"><?= htmlspecialchars($post['creator_name'] ?? 'Ẩn danh') ?></span>
                                                    </td>
                                                    <td>
                                                        <?= $post['category_name'] ? htmlspecialchars($post['category_name']) : '<em class="text-muted">No category</em>' ?>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-info"><?= $post['count_view'] ?></span>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-success"><?= $post['count_share'] ?></span>
                                                    </td>
                                                    <td><?= date('d/m/Y', strtotime($post['created_at'])) ?></td>
                                                    <td>
                                                        <a href="<?= $base ?>/admin/posts/<?= $post['id'] ?>/edit" 
                                                           class="btn btn-sm btn-warning" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <button class="btn btn-sm btn-danger" 
                                                                onclick="deletePost(<?= $post['id'] ?>)" 
                                                                title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
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
    <script src="<?= $base ?>/assets/js/sweetalert.js"></script>
    <script src="<?= $base ?>/assets/js/custom.js"></script>
    
    <script>
    function deletePost(id) {
        if (!confirm('Are you sure you want to delete this post?')) {
            return;
        }
        
        fetch('<?= $base ?>/admin/posts/' + id + '/delete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: '_csrf=' + encodeURIComponent(window.__csrf || '')
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                swal("Deleted!", "Post has been deleted.", "success")
                    .then(() => window.location.reload());
            } else {
                swal("Error!", data.error || "Failed to delete post", "error");
            }
        })
        .catch(error => {
            swal("Error!", "An error occurred", "error");
            console.error('Error:', error);
        });
    }
    </script>
</body>
</html>