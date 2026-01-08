<?php
// app/views/client/posts/show.php
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($post['title']) ?></title>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/fontawesome.css">
    
    <style>
        /* CSS cho Mục lục */
        .toc-container {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
        }
        
        .toc-title {
            font-weight: 700;
            margin-bottom: 15px;
            font-size: 1.1rem;
            color: #333;
            border-bottom: 2px solid #007bff;
            display: inline-block;
            padding-bottom: 5px;
        }

        #toc-list {
            list-style: none;
            padding-left: 0;
            margin-bottom: 0;
        }

        #toc-list li {
            margin-bottom: 8px;
        }

        #toc-list a {
            color: #555;
            text-decoration: none;
            display: block;
            transition: all 0.2s;
        }

        #toc-list a:hover {
            color: #007bff;
            padding-left: 5px;
        }

        /* Thụt đầu dòng cho thẻ H3 */
        .toc-sub-item {
            padding-left: 20px;
            font-size: 0.95em;
        }

        /* Smooth scroll toàn trang */
        html {
            scroll-behavior: smooth;
        }

        /* Content styling */
        .post-content h2 {
            margin-top: 40px;
            margin-bottom: 20px;
            color: #2c3e50;
            border-left: 5px solid #007bff;
            padding-left: 15px;
        }

        .post-content h3 {
            margin-top: 30px;
            margin-bottom: 15px;
            color: #34495e;
        }
        
        .post-content img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 20px 0;
        }
    </style>
</head>
<body>

    <!-- Header (Giả sử bạn có file header chung cho client) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand" href="<?= $base ?>/">Trang Chủ</a>
        </div>
    </nav>

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="<?= $base ?>/">Home</a></li>
                        <li class="breadcrumb-item"><a href="#"><?= htmlspecialchars($post['category_name'] ?? 'Tin tức') ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($post['title']) ?></li>
                    </ol>
                </nav>

                <!-- Post Header -->
                <h1 class="mb-3"><?= htmlspecialchars($post['title']) ?></h1>
                
                <div class="d-flex align-items-center text-muted mb-4">
                    <small class="mr-3"><i class="fa fa-user mr-1"></i> <?= htmlspecialchars($post['creator_name'] ?? 'Admin') ?></small>
                    <small class="mr-3"><i class="fa fa-calendar mr-1"></i> <?= date('d/m/Y', strtotime($post['created_at'])) ?></small>
                    <small><i class="fa fa-eye mr-1"></i> <?= $post['count_view'] ?> lượt xem</small>
                </div>

                <!-- Featured Image -->
                <?php if (!empty($post['featured_image'])): ?>
                    <img src="<?= $base . htmlspecialchars($post['featured_image']) ?>" class="img-fluid w-100 rounded mb-4" alt="<?= htmlspecialchars($post['title']) ?>">
                <?php endif; ?>

                <!-- Summary (Tóm tắt) -->
                <?php if (!empty($post['summary'])): ?>
                    <div class="alert alert-secondary border-0" role="alert">
                        <strong>Tóm tắt:</strong><br>
                        <?= $post['summary'] ?> <!-- Summary is HTML from Summernote -->
                    </div>
                <?php endif; ?>

                <!-- Table of Contents (Auto Generated) -->
                <div id="toc-wrapper" class="toc-container d-none">
                    <div class="toc-title"><i class="fa fa-list-ul mr-2"></i>Mục lục bài viết</div>
                    <ul id="toc-list"></ul>
                </div>

                <!-- Main Content -->
                <div class="post-content" id="post-content">
                    <?= $post['content'] ?>
                </div>

                <!-- Share Buttons -->
                <div class="mt-5 pt-3 border-top">
                    <p class="font-weight-bold">Chia sẻ bài viết:</p>
                    <button class="btn btn-primary btn-sm" onclick="sharePost(<?= $post['id'] ?>)"><i class="fa fa-facebook"></i> Facebook</button>
                    <button class="btn btn-info btn-sm"><i class="fa fa-twitter"></i> Twitter</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?= $base ?>/assets/js/jquery.min.js"></script>
    <script src="<?= $base ?>/assets/js/bootstrap.min.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Tìm container nội dung
        const content = document.getElementById('post-content');
        const tocList = document.getElementById('toc-list');
        const tocWrapper = document.getElementById('toc-wrapper');

        if (!content) return;

        // 2. Tìm tất cả thẻ H2 và H3
        const headings = content.querySelectorAll('h2, h3');

        if (headings.length > 0) {
            // Hiển thị khung mục lục nếu có heading
            tocWrapper.classList.remove('d-none');

            headings.forEach((heading, index) => {
                // Tạo ID cho heading nếu chưa có
                if (!heading.id) {
                    // Tạo slug từ text: "Tiêu đề bài viết" -> "tieu-de-bai-viet"
                    // Hoặc đơn giản dùng index: "toc-1", "toc-2" (An toàn hơn cho tiếng Việt)
                    heading.id = 'toc-item-' + index;
                }

                // Tạo thẻ li và a
                const li = document.createElement('li');
                const a = document.createElement('a');
                
                a.href = '#' + heading.id;
                a.textContent = heading.textContent;
                
                // Thêm class nếu là H3 để thụt đầu dòng
                if (heading.tagName.toLowerCase() === 'h3') {
                    li.classList.add('toc-sub-item');
                }

                // Smooth scroll click handler (Dự phòng cho browser cũ)
                a.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });

                li.appendChild(a);
                tocList.appendChild(li);
            });
        }
    });

    // Share Counter Logic
    function sharePost(id) {
        // Giả lập call API share
        alert('Đã chia sẻ bài viết ' + id);
    }
    </script>
</body>
</html>
