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
                    <a href="<?= $base ?>/admin/posts/create<?= !empty($current_category_id) ? '?category_id=' . $current_category_id : '' ?> "
                        class="btn btn-primary">
                        <i class="fa fa-plus"></i> Thêm bài viết mới
                    </a>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!-- Search & Filter Form -->
                        <form method="GET" action="" class="mb-4">
                            <div class="row align-items-end">
                                <div class="col-md-3 mb-2">
                                    <label class="small font-weight-bold">Từ khóa</label>
                                    <input type="text" name="keyword" class="form-control"
                                        placeholder="Tìm kiếm tên, slug..."
                                        value="<?= htmlspecialchars($keyword ?? '') ?>">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="small font-weight-bold">Danh mục</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">-- Tất cả --</option>
                                        <?php foreach ($categories as $cat): ?>
                                            <option value="<?= $cat['id'] ?>" <?= ($current_category_id == $cat['id']) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($cat['name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="small font-weight-bold">Tag</label>
                                    <select name="tag_id" class="form-control">
                                        <option value="">-- Tất cả --</option>
                                        <?php foreach ($tags as $tag): ?>
                                            <option value="<?= $tag['id'] ?>" <?= (isset($current_tag_id) && $current_tag_id == $tag['id']) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($tag['name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="small font-weight-bold">Quốc gia</label>
                                    <select name="country_id" class="form-control">
                                        <option value="">-- Tất cả --</option>
                                        <?php foreach ($countries as $country): ?>
                                            <option value="<?= $country['id'] ?>" <?= ($current_country_id == $country['id']) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($country['name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="small font-weight-bold">Trường học</label>
                                    <select name="school_id" class="form-control">
                                        <option value="">-- Tất cả --</option>
                                        <?php foreach ($schools as $school): ?>
                                            <option value="<?= $school['id'] ?>" <?= ($current_school_id == $school['id']) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($school['name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="small font-weight-bold">Ngày tạo</label>
                                    <input type="date" name="date" class="form-control"
                                        value="<?= htmlspecialchars($current_date ?? '') ?>">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="small font-weight-bold">Ngày cập nhật</label>
                                    <input type="date" name="date_updated" class="form-control"
                                        value="<?= htmlspecialchars($current_date_updated ?? '') ?>">
                                </div>
                                <div class="col-md-1 mb-2">
                                    <button class="btn btn-block btn-info" type="submit"><i
                                            class="fa fa-filter"></i></button>
                                </div>
                            </div>
                        </form>

                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <?php if (empty($posts)): ?>
                                <div class="alert alert-info">
                                    Không tìm thấy bài viết nào. <a
                                        href="<?= $base ?>/admin/posts/create<?= !empty($current_category_id) ? '?category_id=' . $current_category_id : '' ?>">Tạo
                                        bài viết đầu tiên của bạn</a>
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
                                                <th>Updated</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($posts as $post): ?>
                                                <tr>
                                                    <td><?= $post['id'] ?></td>
                                                    <td>
                                                        <strong><?= htmlspecialchars($post['title']) ?></strong>
                                                        <?php if (!empty($post['tag_name'])): ?>
                                                            <div class="mt-1">
                                                                <span class="badge badge-pill badge-light border text-dark"
                                                                    title="<?= htmlspecialchars($post['tag_name']) ?>">
                                                                    <?php if ($post['tag_icon']): ?>
                                                                        <i class="<?= htmlspecialchars($post['tag_icon']) ?> mr-1"></i>
                                                                    <?php endif; ?>
                                                                    <?= htmlspecialchars($post['tag_name']) ?>
                                                                </span>
                                                            </div>
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
                                                        if (!empty($post['country_name']))
                                                            $loc[] = htmlspecialchars($post['country_name']);
                                                        if (!empty($post['school_name']))
                                                            $loc[] = htmlspecialchars($post['school_name']);
                                                        echo !empty($loc) ? implode(' / ', $loc) : '<em class="text-muted">-</em>';
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-info"><?= $post['count_view'] ?></span>
                                                    </td>
                                                    <td><?= date('d/m/Y', strtotime($post['created_at'])) ?></td>
                                                    <td><?= date('d/m/Y', strtotime($post['updated_at'])) ?></td>
                                                    <td>
                                                        <?php $isHidden = isset($post['is_hidden']) ? (int) $post['is_hidden'] : 0; ?>
                                                        <button
                                                            class="btn btn-sm <?= $isHidden ? 'btn-secondary' : 'btn-info' ?>"
                                                            onclick="toggleHidden(<?= $post['id'] ?>, <?= $isHidden ? '1' : '0' ?>)"
                                                            title="<?= $isHidden ? 'Hiện bài viết' : 'Ẩn bài viết' ?>">
                                                            <i class="fa fa-<?= $isHidden ? 'eye-slash' : 'eye' ?>"></i>
                                                        </button>
                                                        <a href="<?= $base ?>/admin/posts/<?= $post['id'] ?>/edit"
                                                            class="btn btn-sm btn-warning" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="deletePost(<?= $post['id'] ?>)" title="Delete">
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
                                            $params = $_GET;
                                            unset($params['page']);
                                            $baseParams = '';
                                            foreach ($params as $key => $val) {
                                                if ($val !== '') {
                                                    $baseParams .= '&' . urlencode($key) . '=' . urlencode((string) $val);
                                                }
                                            }
                                            ?>
                                            <li class="page-item <?= ($current_page <= 1) ? 'disabled' : '' ?>">
                                                <a class="page-link" href="?page=<?= $current_page - 1 ?><?= $baseParams ?>"
                                                    tabindex="-1">Previous</a>
                                            </li>
                                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                                <li class="page-item <?= ($i == $current_page) ? 'active' : '' ?>">
                                                    <a class="page-link" href="?page=<?= $i ?><?= $baseParams ?>"><?= $i ?></a>
                                                </li>
                                            <?php endfor; ?>
                                            <li class="page-item <?= ($current_page >= $total_pages) ? 'disabled' : '' ?>">
                                                <a class="page-link"
                                                    href="?page=<?= $current_page + 1 ?><?= $baseParams ?>">Next</a>
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
    <script src="<?= $base ?>/assets/js/toastr.min.js"></script>
    <script src="<?= $base ?>/assets/js/custom.js"></script>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/toastr.min.css">

    <script>
        // Set CSRF token for JavaScript
        window.__csrf = window.__csrf || '<?= htmlspecialchars($csrf ?? '') ?>';

        function deletePost(id) {
            if (!confirm('Are you sure you want to delete this post?')) {
                return;
            }

            const btn = document.querySelector('button[onclick="deletePost(' + id + ')"]');
            const row = btn ? btn.closest('tr') : null;

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
                        toastr.success('Post has been deleted successfully!', 'Success');
                        if (row) {
                            row.style.transition = 'all 0.5s';
                            row.style.opacity = '0';
                            setTimeout(() => row.remove(), 500);
                        } else {
                            setTimeout(() => window.location.reload(), 1000);
                        }
                    } else {
                        swal("Error!", data.error || "Failed to delete post", "error");
                    }
                })
                .catch(error => {
                    swal("Error!", "An error occurred", "error");
                    console.error('Error:', error);
                });
        }

        function toggleHidden(id, currentState) {
            const btn = document.querySelector('button[onclick*="toggleHidden(' + id + '"]');
            const newState = currentState ? 0 : 1;

            fetch('<?= $base ?>/admin/posts/' + id + '/toggle-hidden', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: '_csrf=' + encodeURIComponent(window.__csrf || '') + '&is_hidden=' + newState
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        toastr.success(data.message || 'Đã cập nhật trạng thái thành công!', 'Success');
                        // Cập nhật UI ngay lập tức
                        if (btn) {
                            if (newState) {
                                btn.className = 'btn btn-sm btn-secondary';
                                btn.title = 'Hiện bài viết';
                                btn.innerHTML = '<i class="fa fa-eye-slash"></i>';
                                btn.setAttribute('onclick', 'toggleHidden(' + id + ', 1)');
                            } else {
                                btn.className = 'btn btn-sm btn-info';
                                btn.title = 'Ẩn bài viết';
                                btn.innerHTML = '<i class="fa fa-eye"></i>';
                                btn.setAttribute('onclick', 'toggleHidden(' + id + ', 0)');
                            }
                        }
                    } else {
                        swal("Error!", data.error || "Failed to update post", "error");
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