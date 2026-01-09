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
                        <h5 class="mb-0"><strong>Quản lý Bài viết</strong></h5>
                        <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Posts</span>
                    </div>
                    <a href="<?= $base ?>/admin/posts/create<?= !empty($current_category_id) ? '?category_id='.$current_category_id : '' ?> " class="btn btn-primary">
                        <i class="fa fa-plus"></i> Thêm bài viết mới
                    </a>
                </div>
                
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!-- Search Form -->
                        <form method="GET" action="" class="mb-3">
                            <?php if(!empty($current_category_id)): ?>
                                <input type="hidden" name="category_id" value="<?= $current_category_id ?>">
                            <?php endif; ?>
                            <div class="input-group" style="max-width: 400px;">
                                <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm tên, slug..." value="<?= htmlspecialchars($keyword ?? '') ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>

                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <?php if (empty($posts)): ?>
                                <div class="alert alert-info">
                                    Không tìm thấy bài viết nào. <a href="<?= $base ?>/admin/posts/create<?= !empty($current_category_id) ? '?category_id='.$current_category_id : '' ?>">Tạo bài viết đầu tiên của bạn</a>
                                </div>
                            <?php else: ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Slug</th>
                                                <th>Category</th>
                                                <th>Country / School</th>
                                                <th>Views</th>
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
                                                        <?php if(!empty($post['is_popular'])): ?>
                                                            <i class="fa fa-star text-warning ml-1" title="Popular"></i>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <code><?= htmlspecialchars($post['slug']) ?></code>
                                                    </td>
                                                    <td>
                                                        <?= $post['category_name'] ? htmlspecialchars($post['category_name']) : '<em class="text-muted">No category</em>' ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            $loc = [];
                                                            if(!empty($post['country_name'])) $loc[] = htmlspecialchars($post['country_name']);
                                                            if(!empty($post['school_name'])) $loc[] = htmlspecialchars($post['school_name']);
                                                            echo !empty($loc) ? implode(' / ', $loc) : '<em class="text-muted">-</em>';
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-info"><?= $post['count_view'] ?></span>
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

                                <!-- Pagination -->
                                <?php if (isset($total_pages) && $total_pages > 1): ?>
                                <nav aria-label="Page navigation" class="mt-3">
                                    <ul class="pagination justify-content-end">
                                        <?php 
                                            $catParam = !empty($current_category_id) ? '&category_id='.$current_category_id : '';
                                            $kwParam = !empty($keyword) ? '&keyword='.htmlspecialchars($keyword) : '';
                                            $baseParams = $catParam . $kwParam;
                                        ?>
                                        <li class="page-item <?= ($current_page <= 1) ? 'disabled' : '' ?>">
                                            <a class="page-link" href="?page=<?= $current_page - 1 ?><?= $baseParams ?>" tabindex="-1">Previous</a>
                                        </li>
                                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                        <li class="page-item <?= ($i == $current_page) ? 'active' : '' ?>">
                                            <a class="page-link" href="?page=<?= $i ?><?= $baseParams ?>"><?= $i ?></a>
                                        </li>
                                        <?php endfor; ?>
                                        <li class="page-item <?= ($current_page >= $total_pages) ? 'disabled' : '' ?>">
                                            <a class="page-link" href="?page=<?= $current_page + 1 ?><?= $baseParams ?>">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                                <?php endif; ?>

                            <?php endif; ?>
                        </div>
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