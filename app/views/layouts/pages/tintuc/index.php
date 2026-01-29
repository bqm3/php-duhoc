<?php
// app/views/layouts/pages/tintuc/index.php
$base_url = $base ?? '';
?>

<style>
    /* TOC Styles from detail page */
    .toc-container {
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 30px;
    }

    .toc-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        cursor: pointer;
        user-select: none;
    }

    .toc-toggle {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        border: 1px solid #e9ecef;
        background: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: transform .15s ease, background .15s ease;
    }

    .toc-body {
        overflow: hidden;
        max-height: 0;
        opacity: 0;
        transition: max-height .25s ease, opacity .2s ease;
        will-change: max-height;
        margin-top: 0;
    }

    .toc-container.is-open .toc-body {
        opacity: 1;
        margin-top: 12px;
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

    .toc-sub-item {
        padding-left: 20px;
        font-size: 0.95em;
    }

    html {
        scroll-behavior: smooth;
    }

    /* News Specific Styles */
    .news-sidebar-item {
        transition: all 0.3s ease;
        border-bottom: 1px solid #eee;
        padding-bottom: 15px;
        margin-bottom: 15px;
    }

    .news-sidebar-item:last-child {
        border-bottom: none;
    }

    .news-sidebar-item:hover {
        transform: translateX(5px);
    }

    .news-sidebar-img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
    }

    .news-sidebar-title {
        font-size: 0.95rem;
        font-weight: 600;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .news-detail-content h2 {
        margin-top: 40px;
        margin-bottom: 20px;
        color: #2c3e50;
        border-left: 5px solid #007bff;
        padding-left: 15px;
    }

    .news-detail-content h3 {
        margin-top: 30px;
        margin-bottom: 15px;
        color: #34495e;
    }

    .news-detail-content img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        margin: 20px 0;
    }

    .news-random-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .news-random-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .news-random-img {
        height: 180px;
        object-fit: cover;
    }
</style>

<?php partial('layouts/pages/base/base_hero', [
    'title' => $title ?? 'Tin tức',
    'breadcrumbs' => [
        ['label' => 'Tin tức', 'url' => '']
    ]
]) ?>

<div class="container py-5">
    <div class="row">
        <!-- Main Detail - Latest post -->
        <div class="col-lg-8 order-1 mb-5">
            <?php if (!empty($latestPost)): ?>
                <article class="news-main-detail">
                    <h1 class="display-6 fw-bold mb-4" style="color: #2c3e50; line-height: 1.3;">
                        <?= htmlspecialchars($latestPost['title']) ?>
                    </h1>

                    <div class="d-flex flex-wrap align-items-center gap-3 text-muted mb-4 pb-3 border-bottom">
                        <span class="small"><i
                                class="fa fa-user-circle-o me-2"></i><?= htmlspecialchars($latestPost['creator_name'] ?? 'Admin') ?></span>
                        <span class="small"><i
                                class="fa fa-calendar me-2"></i><?= date('d/m/Y', strtotime($latestPost['created_at'])) ?></span>
                        <span class="small"><i class="fa fa-eye me-2"></i><?= (int) $latestPost['count_view'] ?> lượt
                            xem</span>
                        <?php if (!empty($latestPost['tag_name'])): ?>
                            <span class="badge bg-light text-dark border rounded-pill px-3 py-1 small">
                                <i class="<?= $latestPost['tag_icon'] ?: 'fa fa-tag' ?> me-1"></i>
                                <?= $latestPost['tag_name'] ?>
                            </span>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($latestPost['featured_image'])): ?>
                        <div class="mb-5">
                            <img src="<?= $base_url . $latestPost['featured_image'] ?>"
                                class="img-fluid w-100 rounded-4 shadow-sm" alt="<?= htmlspecialchars($latestPost['title']) ?>">
                        </div>
                    <?php endif; ?>

                    <!-- TOC from detail index -->
                    <div id="toc-wrapper" class="toc-container d-none">
                        <div class="toc-header" id="toc-header">
                            <div class="toc-title mb-0" style="border-bottom:0;padding-bottom:0;">
                                <i class="fa fa-list-ul mr-2"></i>Mục lục bài viết
                            </div>
                            <button type="button" class="toc-toggle" id="toc-toggle">
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="toc-body" id="toc-body">
                            <ul id="toc-list"></ul>
                        </div>
                    </div>

                    <div class="news-detail-content fs-5 text-secondary" id="post-content" style="line-height: 1.8;">
                        <?= $latestPost['content'] ?>
                    </div>

                    <!-- Share Buttons -->
                    <div class="mt-5 pt-4 border-top">
                        <p class="fw-bold mb-3">Chia sẻ bài viết này:</p>
                        <div class="d-flex gap-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]") ?>"
                                target="_blank" class="btn btn-primary px-4">
                                <i class="fa fa-facebook me-2"></i>Facebook
                            </a>
                            <button class="btn btn-outline-secondary px-4" onclick="window.print()">
                                <i class="fa fa-print me-2"></i>In bài viết
                            </button>
                        </div>
                    </div>
                </article>
            <?php else: ?>
                <div class="text-center py-5 shadow-sm rounded-4 bg-light">
                    <i class="fa fa-newspaper-o fa-4x text-muted mb-3"></i>
                    <h3>Chưa có bài viết nào trong mục này</h3>
                    <p class="text-muted">Chúng tôi sẽ sớm cập nhật những tin tức mới nhất.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Sidebar - 3 newest posts (Vertical) -->
        <div class="col-lg-4 order-2">
            <div class="card border-0 shadow-sm p-4 sticky-top" style="top: 100px; z-index: 10;">
                <h4 class="mb-4 position-relative pb-2" style="color: #007bff; font-weight: 700;">
                    Tin mới nhất
                    <span class="position-absolute bottom-0 start-0 bg-primary"
                        style="height: 3px; width: 50px;"></span>
                </h4>
                <div class="news-sidebar-list">
                    <?php if (!empty($sidebarPosts)): ?>
                        <?php foreach ($sidebarPosts as $post): ?>
                            <div class="news-sidebar-item">
                                <a href="<?= $base_url . '/' . $post['slug'] ?>" class="text-decoration-none d-flex gap-3">
                                    <div class="flex-shrink-0">
                                        <img src="<?= $base_url . ($post['featured_image'] ?: '/assets/images/no-image.jpg') ?>"
                                            alt="<?= htmlspecialchars($post['title']) ?>" class="news-sidebar-img">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="news-sidebar-title text-dark mb-1"><?= htmlspecialchars($post['title']) ?>
                                        </h6>
                                        <small class="text-muted">
                                            <i class="fa fa-calendar-o me-1"></i>
                                            <?= date('d/m/Y', strtotime($post['created_at'])) ?>
                                        </small>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted">Đang cập nhật...</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Random Posts - 3 posts (Horizontal) -->
    <div class="mt-5 pt-5 border-top">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Các tin liên quan khác</h3>
            <a href="<?= $base_url ?>/tin-tuc" class="text-primary text-decoration-none fw-bold">Xem tất cả <i
                    class="fa fa-angle-right ms-1"></i></a>
        </div>
        <style>
            .news-swiper {
                padding-bottom: 50px !important;
            }

            .news-random-card {
                height: 100%;
            }
        </style>

        <div class="position-relative">
            <?php if (!empty($randomPosts)): ?>
                <div class="swiper news-swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($randomPosts as $post): ?>
                            <div class="swiper-slide">
                                <div class="card news-random-card overflow-hidden rounded-4">
                                    <a href="<?= $base_url . '/' . $post['slug'] ?>"
                                        class="text-decoration-none h-100 d-flex flex-column">
                                        <div class="position-relative overflow-hidden">
                                            <img src="<?= $base_url . ($post['featured_image'] ?: '/assets/images/no-image.jpg') ?>"
                                                class="card-img-top news-random-img"
                                                alt="<?= htmlspecialchars($post['title']) ?>">
                                        </div>
                                        <div class="card-body p-4 d-flex flex-column">
                                            <h5 class="card-title text-dark fw-bold mb-3"
                                                style="font-size: 1.05rem; line-height: 1.5; height: 3rem; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                                <?= htmlspecialchars($post['title']) ?>
                                            </h5>
                                            <p class="card-text text-muted small mb-4"
                                                style="height: 3rem; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                                <?= mb_strimwidth(strip_tags($post['summary'] ?: $post['content'] ?: ''), 0, 100, "...") ?>
                                            </p>
                                            <div
                                                class="mt-auto pt-3 d-flex justify-content-between align-items-center border-top">
                                                <span class="text-primary fw-bold small">Xem chi tiết <i
                                                        class="fa fa-chevron-right ms-1" style="font-size: 0.7rem;"></i></span>
                                                <span
                                                    class="text-muted small"><?= date('d/m/Y', strtotime($post['created_at'])) ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Navigation -->
                    <div class="swiper-button-next" style="transform: scale(0.7); right: -10px;"></div>
                    <div class="swiper-button-prev" style="transform: scale(0.7); left: -10px;"></div>
                </div>
            <?php endif; ?>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const content = document.getElementById('post-content');
                const tocList = document.getElementById('toc-list');
                const tocWrapper = document.getElementById('toc-wrapper');
                const tocHeader = document.getElementById('toc-header');
                const tocToggle = document.getElementById('toc-toggle');
                const tocBody = document.getElementById('toc-body');

                if (!content || !tocList || !tocWrapper || !tocHeader || !tocToggle || !tocBody) return;

                // Build TOC
                const headings = content.querySelectorAll('h2, h3');
                if (headings.length > 0) {
                    tocWrapper.classList.remove('d-none');
                    headings.forEach((heading, index) => {
                        if (!heading.id) heading.id = 'toc-news-' + index;
                        const li = document.createElement('li');
                        const a = document.createElement('a');
                        a.href = '#' + heading.id;
                        a.textContent = heading.textContent;
                        if (heading.tagName.toLowerCase() === 'h3') li.classList.add('toc-sub-item');

                        a.addEventListener('click', function (e) {
                            e.preventDefault();
                            const target = document.querySelector(this.getAttribute('href'));
                            if (target) {
                                const offset = 120; // sticky navbar offset
                                const bodyRect = document.body.getBoundingClientRect().top;
                                const elementRect = target.getBoundingClientRect().top;
                                const elementPosition = elementRect - bodyRect;
                                const offsetPosition = elementPosition - offset;

                                window.scrollTo({
                                    top: offsetPosition,
                                    behavior: 'smooth'
                                });
                            }
                        });
                        li.appendChild(a);
                        tocList.appendChild(li);
                    });
                    openToc();
                }

                new Swiper('.news-swiper', {
                    slidesPerView: 1,
                    spaceBetween: 25,
                    loop: true,
                    grabCursor: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    breakpoints: {
                        576: { slidesPerView: 1 },
                        768: { slidesPerView: 2 },
                        1024: { slidesPerView: 3 }
                    }
                });
                function openToc() {
                    tocWrapper.classList.add('is-open');
                    tocBody.style.maxHeight = tocBody.scrollHeight + 'px';
                    tocToggle.style.transform = 'rotate(180deg)';
                }

                function closeToc() {
                    tocWrapper.classList.remove('is-open');
                    tocBody.style.maxHeight = '0px';
                    tocToggle.style.transform = 'rotate(0deg)';
                }

                function toggleToc() {
                    if (tocWrapper.classList.contains('is-open')) closeToc();
                    else openToc();
                }

                tocHeader.addEventListener('click', toggleToc);

                window.addEventListener('resize', function () {
                    if (tocWrapper.classList.contains('is-open')) {
                        tocBody.style.maxHeight = tocBody.scrollHeight + 'px';
                    }
                });
            });
        </script>