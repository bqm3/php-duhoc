<!-- app/views/admin/consultations/index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Consultations Management</title>

    <link rel="stylesheet" href="<?= $base ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/quicksand.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <div class="loader-wrapper">
        <div class="loader-circle">
            <div class="loader-wave"></div>
        </div>
    </div>
    <div class="container-fluid">
        <?php include __DIR__ . '/../../admin/header.php'; ?>

        <div class="row main-content">
            <?php include __DIR__ . '/../sidebar.php'; ?>

            <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0"><strong>Danh Sách Tư Vấn</strong></h5>
                        <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Consultations</span>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!-- Multi-filter Form -->
                        <div class="p-3 bg-white border shadow-sm mb-4">
                            <form method="GET" action="" class="row g-3 align-items-end">
                                <div class="col-md-3">
                                    <label class="form-label small font-weight-bold">Từ khóa</label>
                                    <input type="text" name="keyword" class="form-control form-control-sm"
                                        placeholder="Tên, email, sđt..."
                                        value="<?= htmlspecialchars($keyword ?? '') ?>">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label small font-weight-bold">Trạng thái</label>
                                    <select name="status" class="form-control form-control-sm">
                                        <option value="">-- Tất cả --</option>
                                        <option value="new" <?= ($status ?? '') == 'new' ? 'selected' : '' ?>>Mới</option>
                                        <option value="processing" <?= ($status ?? '') == 'processing' ? 'selected' : '' ?>>Đang xử lý</option>
                                        <option value="completed" <?= ($status ?? '') == 'completed' ? 'selected' : '' ?>>Hoàn thành</option>
                                        <option value="cancelled" <?= ($status ?? '') == 'cancelled' ? 'selected' : '' ?>>Đã hủy</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label small font-weight-bold">Quốc gia</label>
                                    <select name="country_id" class="form-control form-control-sm">
                                        <option value="">-- Tất cả --</option>
                                        <?php foreach ($countries as $c): ?>
                                            <option value="<?= $c['id'] ?>" <?= ($country_id ?? 0) == $c['id'] ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($c['name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label small font-weight-bold">Từ ngày</label>
                                    <input type="date" name="date_from" class="form-control form-control-sm" 
                                           value="<?= htmlspecialchars($date_from ?? '') ?>">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label small font-weight-bold">Đến ngày</label>
                                    <input type="date" name="date_to" class="form-control form-control-sm"
                                           value="<?= htmlspecialchars($date_to ?? '') ?>">
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-primary btn-sm btn-block" type="submit">
                                        <i class="fa fa-filter"></i> Lọc
                                    </button>
                                </div>
                                <?php if (!empty($keyword) || !empty($status) || ($country_id ?? 0) > 0 || !empty($date_from) || !empty($date_to)): ?>
                                <div class="col-12 mt-2">
                                    <a href="?" class="btn btn-link btn-sm p-0 text-danger text-decoration-none">
                                        <i class="fa fa-times-circle"></i> Xóa bộ lọc
                                    </a>
                                </div>
                                <?php endif; ?>
                            </form>
                        </div>

                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <?php if (empty($consultations)): ?>
                                <div class="alert alert-info">Chưa có yêu cầu tư vấn nào.</div>
                            <?php else: ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="consultationTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Họ Tên</th>
                                                <th>Thông tin</th>
                                                <th>Liên hệ</th>
                                                <th style="width: 20%;">Nội Dung</th>
                                                <th>Trạng Thái</th>
                                                <th>Ngày Đăng Ký</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($consultations as $item): ?>
                                                <tr data-id="<?= $item['id'] ?>">
                                                    <td><?= $item['id'] ?></td>
                                                    <td><strong><?= htmlspecialchars($item['full_name']) ?></strong></td>
                                                    <td>
                                                        <div class="small">
                                                            <strong>GT:</strong> <?= ($item['gender'] ?? '') == 'male' ? 'Nam' : (($item['gender'] ?? '') == 'female' ? 'Nữ' : 'Khác') ?><br>
                                                            <strong>Quốc gia:</strong> <?= htmlspecialchars($item['country_name'] ?? 'Chưa chọn') ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="small">
                                                            <i class="fa fa-phone mr-1"></i><?= htmlspecialchars($item['phone']) ?><br>
                                                            <i class="fa fa-envelope mr-1"></i><?= htmlspecialchars($item['email'] ?: 'N/A') ?>
                                                        </div>
                                                    </td>
                                                    <td><?= nl2br(htmlspecialchars($item['message'])) ?></td>
                                                    <td>
                                                        <?php
                                                        $statusClass = 'secondary';
                                                        $statusText = 'Mới';
                                                        switch ($item['status'] ?? 'new') {
                                                            case 'new':
                                                                $statusClass = 'primary';
                                                                $statusText = 'Mới';
                                                                break;
                                                            case 'processing':
                                                                $statusClass = 'warning';
                                                                $statusText = 'Đang xử lý';
                                                                break;
                                                            case 'completed':
                                                                $statusClass = 'success';
                                                                $statusText = 'Hoàn thành';
                                                                break;
                                                            case 'cancelled':
                                                                $statusClass = 'danger';
                                                                $statusText = 'Hủy';
                                                                break;
                                                        }
                                                        ?>
                                                        <span class="badge badge-<?= $statusClass ?>"><?= $statusText ?></span>
                                                    </td>
                                                    <td><?= date('d/m/Y H:i', strtotime($item['created_at'])) ?></td>
                                                    <td>
                                                        <a href="<?= $base ?>/admin/consultations/<?= $item['id'] ?>/edit"
                                                            class="btn btn-sm btn-info" title="Chi tiết / Sửa">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="deleteConsultation(<?= $item['id'] ?>)" title="Xóa">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination -->
                                <?php if (isset($total_pages) && $total_pages > 1): 
                                    $queryParams = http_build_query([
                                        'keyword' => $keyword ?? '',
                                        'status' => $status ?? '',
                                        'country_id' => $country_id ?? '',
                                        'date_from' => $date_from ?? '',
                                        'date_to' => $date_to ?? ''
                                    ]);
                                ?>
                                    <nav aria-label="Page navigation" class="mt-3">
                                        <ul class="pagination justify-content-end">
                                            <li class="page-item <?= ($current_page <= 1) ? 'disabled' : '' ?>">
                                                <a class="page-link"
                                                    href="?page=<?= $current_page - 1 ?>&<?= $queryParams ?>"
                                                    tabindex="-1">Trước</a>
                                            </li>
                                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                                <li class="page-item <?= ($i == $current_page) ? 'active' : '' ?>">
                                                    <a class="page-link"
                                                        href="?page=<?= $i ?>&<?= $queryParams ?>"><?= $i ?></a>
                                                </li>
                                            <?php endfor; ?>
                                            <li class="page-item <?= ($current_page >= $total_pages) ? 'disabled' : '' ?>">
                                                <a class="page-link"
                                                    href="?page=<?= $current_page + 1 ?>&<?= $queryParams ?>">Sau</a>
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

    <!-- Datatables JS (Optional) -->
    <!-- <script src="<?= $base ?>/assets/js/jquery.dataTables.min.js"></script> -->
    <!-- <script src="<?= $base ?>/assets/js/dataTables.bootstrap4.min.js"></script> -->

    <script>
        function deleteConsultation(id) {
            if (!confirm('Bạn có chắc chắn muốn xóa yêu cầu tư vấn này?')) {
                return;
            }

            const btn = document.querySelector('button[onclick="deleteConsultation(' + id + ')"]');
            const row = btn ? btn.closest('tr') : null;

            fetch('<?= $base ?>/admin/consultations/' + id + '/delete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: '_csrf=' + encodeURIComponent(window.__csrf || '')
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        toastr.success('Đã xóa thành công!', 'Deleted');
                        if (row) {
                            row.style.transition = 'all 0.5s';
                            row.style.opacity = '0';
                            setTimeout(() => row.remove(), 500);
                        } else {
                            setTimeout(() => window.location.reload(), 1000);
                        }
                    } else {
                        toastr.error(data.error || "Không thể xóa", 'Lỗi');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toastr.error('Có lỗi xảy ra', 'Lỗi');
                });
        }

        // Auto active sidebar based on URL is handled by sidebar.php logic
    </script>

    <!-- Firebase Realtime Update Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Prevent multiple initializations
            if (window.consultationListenerInitialized) {
                console.log('Consultation listener already initialized, skipping...');
                return;
            }
            window.consultationListenerInitialized = true;

            // Wait for Firebase to be ready
            setTimeout(() => {
                if (typeof firebase === 'undefined') {
                    console.error('Firebase SDK not found (check header include)');
                    return;
                }

                const db = firebase.database();
                const tbody = document.querySelector('#consultationTable tbody');
                const now = Date.now();

                // Track processed notifications to prevent duplicates
                const processedNotifications = new Set();

                // Get existing phone numbers and emails from current table
                const existingEntries = new Set();
                const existingRows = tbody ? tbody.querySelectorAll('tr') : [];
                existingRows.forEach(row => {
                    const phone = row.getAttribute('data-phone');
                    const email = row.getAttribute('data-email');
                    if (phone) existingEntries.add(phone);
                    if (email) existingEntries.add(email);
                });

                console.log('Existing entries:', Array.from(existingEntries));

                // Listen for new notifications ONLY (starting from current timestamp + 1 second)
                db.ref('notifications')
                    .orderByChild('timestamp')
                    .startAt(now + 1000) // Start from 1 second in the future
                    .on('child_added', function (snapshot) {
                        const key = snapshot.key;
                        const msg = snapshot.val();

                        // Check if already processed
                        if (processedNotifications.has(key)) {
                            console.log('Already processed notification:', key);
                            return;
                        }

                        if (msg && msg.type === 'new_consultation') {
                            processedNotifications.add(key);

                            const data = msg.data;

                            // Check if we are on page 1 and no search keyword
                            const urlParams = new URLSearchParams(window.location.search);
                            const page = parseInt(urlParams.get('page')) || 1;
                            const keyword = urlParams.get('keyword') || '';

                            if (page === 1 && keyword === '') {
                                // Check for duplicates by phone or email
                                if (existingEntries.has(data.phone) || existingEntries.has(data.email)) {
                                    console.log('Duplicate entry detected, skipping...', data.phone, data.email);
                                    return;
                                }

                                // Add to tracking sets
                                existingEntries.add(data.phone);
                                existingEntries.add(data.email);

                                // Format Date
                                const dateObj = new Date(msg.timestamp);
                                const dateStr = dateObj.getDate().toString().padStart(2, '0') + '/' +
                                    (dateObj.getMonth() + 1).toString().padStart(2, '0') + '/' +
                                    dateObj.getFullYear() + ' ' +
                                    dateObj.getHours().toString().padStart(2, '0') + ':' +
                                    dateObj.getMinutes().toString().padStart(2, '0');

                                // Create new row
                                const tr = document.createElement('tr');
                                tr.className = 'animated fadeIn highlight-new';
                                tr.style.backgroundColor = '#e8f5e9';
                                tr.setAttribute('data-new', 'true');
                                tr.setAttribute('data-phone', data.phone);
                                tr.setAttribute('data-email', data.email);

                                tr.innerHTML = `
                            <td><span class="badge badge-success">Mới</span></td>
                            <td><strong>${escapeHtml(data.name)}</strong></td>
                            <td>${escapeHtml(data.phone)}</td>
                            <td>${escapeHtml(data.email)}</td>
                            <td>${data.message ? escapeHtml(data.message).replace(/\n/g, '<br>') : ''}</td>
                            <td>${dateStr}</td>
                            <td>
                                <button class="btn btn-sm btn-secondary" disabled title="Đang cập nhật...">
                                    <i class="fa fa-spinner fa-spin"></i>
                                </button>
                            </td>
                        `;

                                // Remove "No data" alert if exists
                                const emptyAlert = document.querySelector('.alert-info');
                                if (emptyAlert) {
                                    emptyAlert.remove();
                                }

                                // Prepend to table
                                if (tbody) {
                                    tbody.insertBefore(tr, tbody.firstChild);
                                }

                                // Show notification toast
                                if (typeof toastr !== 'undefined') {
                                    toastr.success('Có yêu cầu tư vấn mới! Đang đồng bộ dữ liệu...', 'Realtime Update');
                                }

                                // Reload after 2 seconds to get correct data from database
                                setTimeout(() => {
                                    console.log('Reloading page to sync with database...');
                                    window.location.reload();
                                }, 2000);

                            } else {
                                // Show info toast for other pages
                                if (typeof toastr !== 'undefined') {
                                    toastr.info('Có yêu cầu tư vấn mới. Vui lòng về trang 1 để xem.', 'Thông báo', {
                                        timeOut: 5000
                                    });
                                }
                            }
                        }
                    });
            }, 1000); // Wait 1 second for Firebase to be ready

            function escapeHtml(text) {
                if (!text) return '';
                return text
                    .replace(/&/g, "&amp;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;")
                    .replace(/"/g, "&quot;")
                    .replace(/'/g, "&#039;");
            }
        });
    </script>

    <!-- Add CSS for animations -->
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animated.fadeIn {
            animation: fadeIn 0.5s ease-in;
        }

        .highlight-new {
            transition: background-color 3s ease;
        }

        /* Smooth background color transition */
        tr.highlight-new {
            animation: highlightFade 3s ease-in-out;
        }

        @keyframes highlightFade {
            0% {
                background-color: #e8f5e9;
            }

            100% {
                background-color: transparent;
            }
        }
    </style>
</body>

</html>