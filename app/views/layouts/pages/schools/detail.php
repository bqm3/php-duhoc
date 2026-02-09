<?php
// app/views/layouts/pages/schools/detail.php
$title = $school['name'] ?? 'Trường học';

// Build Breadcrumbs
$breadcrumbs = [
    ['label' => 'Tìm trường', 'url' => '/tim-truong'],
    ['label' => $school['name'] ?? 'Chi tiết', 'url' => '']
];
?>

<style>
    /* CSS cho Mục lục */
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

    .toc-toggle:hover {
        background: #f1f3f5;
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

    /* School Quick Access Box (Previously Country Quick Access) */
    .country-detail-box {
        box-sizing: border-box;
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 24px;
        gap: 24px;
        width: 100%;
        background: #FFFFFF;
        border: 1px solid #D9D9D9;
        border-radius: 12px;
        margin-bottom: 40px;
    }

    .country-flag-large {
        flex: 0 0 240px;
        height: 160px;
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid #eee;
        background: #f8f9fa;
    }

    .country-flag-large img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 10px;
    }

    .country-category-grid {
        flex: 1;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(2, auto);
        gap: 12px;
    }

    .cat-link-item {
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 12px 15px;
        gap: 12px;
        background: #FFFFFF;
        border: 1px solid #eee;
        border-radius: 8px;
        text-decoration: none !important;
        color: #333 !important;
        transition: all 0.2s ease;
        min-height: 74px;
    }

    .cat-link-item:hover {
        border-color: #007bff;
        background: #f8f9ff;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .cat-link-item span {
        font-weight: 600;
        font-size: 0.95rem;
        line-height: 1.2;
    }

    @media (max-width: 991px) {
        .country-detail-box {
            flex-direction: column;
            align-items: stretch;
        }

        .country-flag-large {
            flex: none;
            height: 200px;
            width: 100%;
        }

        .country-category-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 576px) {
        .country-category-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<?php partial('layouts/pages/base/base_hero', [
    'title' => $title,
    'breadcrumbs' => $breadcrumbs ?? null
]) ?>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-11 mx-auto">

            <!-- School Meta Info -->
            <div class="d-flex flex-wrap align-items-center text-muted mb-4 gap-3">
                <?php if (!empty($school['country_name'])): ?>
                    <small>
                        <i class="fa fa-globe mr-1"></i>
                        Quốc gia:
                        <?= htmlspecialchars($school['country_name']) ?>
                    </small>
                <?php endif; ?>

                <?php if (!empty($school['city_name'])): ?>
                    <small>
                        <i class="fa fa-map-marker mr-1"></i>
                        Thành phố:
                        <?= htmlspecialchars($school['city_name']) ?>
                    </small>
                <?php endif; ?>

                <?php if (!empty($school['education_level_name'])): ?>
                    <small>
                        <i class="fa fa-graduation-cap mr-1"></i>
                        Bậc học:
                        <?= htmlspecialchars($school['education_level_name']) ?>
                    </small>
                <?php endif; ?>

                <?php if ($school['tuition_fee']): ?>
                    <small>
                        <i class="fa fa-money mr-1"></i>
                        Học phí:
                        <?= htmlspecialchars($school['tuition_fee']) ?>
                    </small>
                <?php endif; ?>
            </div>

            <!-- School Quick Access Box -->
            <?php if (!empty($schoolLinks)): ?>
                <div class="country-detail-box">
                    <div class="country-flag-large">
                        <img src="<?= $school['image_url'] ? ($base . htmlspecialchars($school['image_url'])) : ($base . '/assets/images/no-school-logo.png') ?>"
                            alt="<?= htmlspecialchars($school['name'] ?? '') ?>">
                    </div>
                    <div class="country-category-grid">
                        <?php
                        $icons = [
                            'tong-quan' => $base . "/assets/svgs/clients/ic_home20.svg",
                            'chi-phi' => $base . "/assets/svgs/clients/ic_home21.svg",
                            'visa' => $base . "/assets/svgs/clients/ic_home22.svg",
                            'hoc-bong' => $base . "/assets/svgs/clients/ic_home23.svg",
                            'bao-hiem-va-phuc-loi' => $base . "/assets/svgs/clients/ic_home24.svg",
                            'nganh-hoc-noi-tieng' => $base . "/assets/svgs/clients/ic_home25.svg"
                        ];
                        // Order by specific sequence
                        $order = ['tong-quan', 'chi-phi', 'visa', 'hoc-bong', 'bao-hiem-va-phuc-loi', 'nganh-hoc-noi-tieng'];

                        // Sort schoolLinks by order
                        $sortedLinks = [];
                        foreach ($order as $slug) {
                            foreach ($schoolLinks as $link) {
                                if ($link['cat_slug'] === $slug) {
                                    $sortedLinks[] = $link;
                                    break;
                                }
                            }
                        }

                        foreach ($sortedLinks as $link):
                            $finalUrl = $link['slug'] ? ($base . '/' . $link['slug']) : '#';
                            ?>
                            <a href="<?= $finalUrl ?>" class="cat-link-item <?= !$link['slug'] ? 'disabled' : '' ?>"
                                title="<?= $link['label'] ?>">
                                <?php if (isset($icons[$link['cat_slug']])): ?>
                                    <img src="<?= $icons[$link['cat_slug']] ?>" alt="icon"
                                        style="width: 32px; height: 32px; object-fit: contain;">
                                <?php else: ?>
                                    <i class="fa fa-chevron-right"></i>
                                <?php endif; ?>
                                <span>
                                    <?= $link['label'] ?>
                                </span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Table of Contents -->
            <div id="toc-wrapper" class="toc-container d-none">
                <div class="toc-header" id="toc-header">
                    <div class="toc-title mb-0" style="border-bottom:0;padding-bottom:0;">
                        Mục lục
                    </div>
                    <button type="button" class="toc-toggle" id="toc-toggle" aria-label="Toggle TOC">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="toc-body" id="toc-body">
                    <ul id="toc-list"></ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="post-content" id="post-content">
                <?php if (!empty($school['description'])): ?>
                    <?= $school['description'] ?>
                <?php else: ?>
                    <p class="text-muted italic">Đang cập nhật nội dung chi tiết cho trường học này...</p>
                <?php endif; ?>
            </div>

        </div>
    </div>
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

        // Build TOC from H2, H3 in description
        const headings = content.querySelectorAll('h2, h3');
        if (headings.length > 0) {
            tocWrapper.classList.remove('d-none');
            headings.forEach((heading, index) => {
                if (!heading.id) heading.id = 'toc-school-' + index;
                const li = document.createElement('li');
                const a = document.createElement('a');
                a.href = '#' + heading.id;
                a.textContent = heading.textContent;
                if (heading.tagName.toLowerCase() === 'h3') li.classList.add('toc-sub-item');
                a.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) target.scrollIntoView({ behavior: 'smooth' });
                });
                li.appendChild(a);
                tocList.appendChild(li);
            });
            openToc();
        }

        function openToc() {
            tocWrapper.classList.add('is-open');
            tocBody.style.maxHeight = tocBody.scrollHeight + 'px';
        }
        function closeToc() {
            tocWrapper.classList.remove('is-open');
            tocBody.style.maxHeight = '0px';
        }
        function toggleToc() {
            if (tocWrapper.classList.contains('is-open')) closeToc();
            else openToc();
        }
        tocHeader.addEventListener('click', toggleToc);
    });
</script>