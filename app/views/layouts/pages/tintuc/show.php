<?php
// app/views/layouts/pages/tintuc/show.php
$base = $base ?? '';
?>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="<?= $base ?>/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="<?= $base ?>/tin-tuc">Tin tức</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?= htmlspecialchars($title) ?>
                    </li>
                </ol>
            </nav>

            <!-- Post Header -->
            <h1 class="fw-bold mb-4" style="color: #2c3e50; line-height: 1.3;">
                <?= htmlspecialchars($title) ?>
            </h1>

            <div class="d-flex flex-wrap align-items-center text-muted mb-4 gap-3 border-bottom pb-3">
                <small>
                    <i class="fa fa-user mr-1"></i>
                    Người đăng tải:
                    <?= htmlspecialchars($post['creator_name'] ?? 'Admin') ?>
                </small>
                <small>
                    <i class="fa fa-calendar mr-1"></i>
                    <?= date('d/m/Y', strtotime($post['created_at'])) ?>
                </small>
                <?php if (isset($post['count_view'])): ?>
                    <small>
                        <i class="fa fa-eye mr-1"></i>
                        <?= (int) $post['count_view'] ?> lượt xem
                    </small>
                <?php endif; ?>
                <?php if (!empty($post['tag_name'])): ?>
                    <span class="badge bg-light text-dark border rounded-pill px-3 py-1 small">
                        <i class="<?= $post['tag_icon'] ?: 'fa fa-tag' ?> me-1"></i>
                        <?= $post['tag_name'] ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- Featured Image -->
            <?php if (!empty($post['featured_image'])): ?>
                <img src="<?= $base . htmlspecialchars($post['featured_image']) ?>"
                    class="img-fluid w-100 rounded mb-4 shadow-sm" alt="<?= htmlspecialchars($title) ?>">
            <?php endif; ?>

            <!-- Table of Contents -->
            <div id="toc-wrapper" class="toc-container d-none">
                <div class="toc-header" id="toc-header">
                    <div class="toc-title mb-0" style="border-bottom:0;padding-bottom:0;">
                        <i class="fa fa-list-ul mr-2"></i>Mục lục bài viết
                    </div>
                    <button type="button" class="toc-toggle" id="toc-toggle" aria-label="Toggle TOC">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                </div>
                <div class="toc-body" id="toc-body">
                    <ul id="toc-list"></ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="post-content" id="post-content" style="font-size: 1.1rem; line-height: 1.8; color: #444;">
                <?= $post['content'] ?? '' ?>
            </div>

            <!-- Share Buttons -->
            <div class="mt-5 pt-3 border-top">
                <p class="font-weight-bold mb-3">Chia sẻ bài viết:</p>
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
        </div>

    </div>

    <?php if (!empty($randomPosts)): ?>
        <!-- Random Posts Section -->
        <div class="mt-5 pt-5 border-top">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold mb-0">Tin tức liên quan khác</h3>
                <a href="<?= $base ?>/tin-tuc" class="text-primary text-decoration-none fw-bold">Xem tất cả <i
                        class="fa fa-angle-right ms-1"></i></a>
            </div>

            <style>
                .news-swiper {
                    padding-bottom: 60px !important;
                    position: static !important;
                }

                /* Container for navigation to allow absolute positioning relative to the section */
                .swiper-nav-wrapper {
                    position: relative;
                }

                .news-swiper .swiper-button-next,
                .news-swiper .swiper-button-prev {
                    width: 40px !important;
                    height: 40px !important;
                    background: rgba(27, 153, 212, 0.15) !important;
                    border-radius: 30px !important;
                    margin-top: 0;
                    top: 50%;
                    transform: translateY(-50%);
                    z-index: 10;
                    display: flex !important;
                    align-items: center;
                    justify-content: center;
                    transition: all 0.3s ease;
                }

                /* Inner circle */
                .news-swiper .swiper-button-next::before,
                .news-swiper .swiper-button-prev::before {
                    content: '';
                    position: absolute;
                    width: 33.33px;
                    height: 33.33px;
                    background: #31A5DE;
                    border-radius: 30px;
                    z-index: -1;
                    transition: all 0.3s ease;
                }

                .news-swiper .swiper-button-next::after,
                .news-swiper .swiper-button-prev::after {
                    font-family: "Font Awesome 6 Free", "Font Awesome 5 Free";
                    font-weight: 900;
                    font-size: 12px !important;
                    color: #FFFFFF !important;
                }

                .news-swiper .swiper-button-next::after {
                    content: '\f054' !important;
                    /* fa-chevron-right */
                }

                .news-swiper .swiper-button-prev::after {
                    content: '\f053' !important;
                    /* fa-chevron-left */
                }

                .news-swiper .swiper-button-next:hover::before,
                .news-swiper .swiper-button-prev:hover::before {
                    background: #1B99D4;
                    transform: scale(1.1);
                }

                .news-swiper .swiper-button-next {
                    right: -20px !important;
                }

                .news-swiper .swiper-button-prev {
                    left: -20px !important;
                }

                @media (max-width: 1200px) {
                    .news-swiper .swiper-button-next {
                        right: 5px !important;
                    }

                    .news-swiper .swiper-button-prev {
                        left: 5px !important;
                    }
                }
            </style>

            <div class="swiper-nav-wrapper mt-3">
                <div class="swiper news-swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($randomPosts as $rp): ?>
                            <div class="swiper-slide h-auto p-2">
                                <?php partial('layouts/partials/post_card', ['post' => $rp, 'base' => $base]); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Navigation -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
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

        if (content && tocList && tocWrapper && tocHeader && tocToggle && tocBody) {
            const headings = content.querySelectorAll('h2, h3');
            if (headings.length > 0) {
                tocWrapper.classList.remove('d-none');
                headings.forEach((heading, index) => {
                    if (!heading.id) heading.id = 'toc-' + index;
                    const li = document.createElement('li');
                    const a = document.createElement('a');
                    a.href = '#' + heading.id;
                    a.textContent = heading.textContent;
                    if (heading.tagName.toLowerCase() === 'h3') li.classList.add('toc-sub-item');
                    a.addEventListener('click', function (e) {
                        e.preventDefault();
                        const target = document.querySelector(this.getAttribute('href'));
                        if (target) {
                            const offset = 120;
                            const bodyRect = document.body.getBoundingClientRect().top;
                            const elementRect = target.getBoundingClientRect().top;
                            const elementPosition = elementRect - bodyRect;
                            const offsetPosition = elementPosition - offset;
                            window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
                        }
                    });
                    li.appendChild(a);
                    tocList.appendChild(li);
                });
                openToc();
            }

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
        }

        // Initialize Swiper
        if (typeof Swiper !== 'undefined') {
            new Swiper('.news-swiper', {
                slidesPerView: 1,
                spaceBetween: 25,
                loop: true,
                grabCursor: true,
                autoplay: {
                    delay: 3500,
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
        }
    });
</script>

<style>
    /* TOC Styles */
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

    .post-content h2 {
        margin-top: 30px;
        margin-bottom: 15px;
        color: #2c3e50;
    }

    .post-content h3 {
        margin-top: 25px;
        margin-bottom: 12px;
        color: #34495e;
    }

    .post-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 20px 0;
    }
</style>