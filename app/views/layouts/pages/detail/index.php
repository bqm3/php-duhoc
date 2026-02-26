<?php
// app/views/layouts/pages/detail/index.php  (DETAIL)
$title = $post['title'] ?? 'Bài viết';

// Build Breadcrumbs
$breadcrumbs = [];
if (!empty($post['category_name'])) {
  $breadcrumbs[] = [
    'label' => $post['category_name'],
    'url' => !empty($post['category_slug']) ? '/' . $post['category_slug'] : ''
  ];
}
$breadcrumbs[] = ['label' => $post['title'] ?? 'Chi tiết', 'url' => ''];
?>

<?php
$title = $post['meta_title'] ?? $post['title'] ?? 'Bài viết';

$meta_description = $post['meta_description']
  ?? (!empty($post['summary']) ? strip_tags($post['summary']) : '');

$meta_keywords = $post['meta_keywords'] ?? '';

$meta_image = !empty($post['featured_image'])
  ? $base . $post['featured_image']
  : $base . '/assets/images/no-image.jpg';

$meta_url = $base . ($_SERVER['REQUEST_URI'] ?? '');
?>

<?php partial('layouts/pages/base/base_hero', [
  'title' => $title,
  'breadcrumbs' => $breadcrumbs ?? null
]) ?>

<div class="container py-5">
  <div class="row">
    <div class="col-lg-11 mx-auto">

      <!-- Breadcrumb -->
      <!-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0">
          <li class="breadcrumb-item"><a href="<?= $base ?>/">Trang chủ</a></li>

          <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($title) ?></li>
        </ol>
      </nav> -->

      <!-- Post Header -->
      <!-- <h1 class="mb-3"><?= htmlspecialchars($title) ?></h1> -->

      <div class="d-flex flex-wrap align-items-center text-muted mb-4 gap-3">
        <small>
          <i class="fa fa-user mr-1"></i>
          Người đăng tải: <?= htmlspecialchars($post['creator_name'] ?? 'Admin') ?>
        </small>

        <!-- <?php if (!empty($post['created_at'])): ?>
          <small>
            <i class="fa fa-calendar mr-1"></i>
            <?= date('d/m/Y', strtotime($post['created_at'])) ?>
          </small>
        <?php endif; ?> -->

        <?php if (isset($post['count_view'])): ?>
          <small>
            <i class="fa fa-eye mr-1"></i>
            <?= (int) $post['count_view'] ?> lượt xem
          </small>
        <?php endif; ?>

        <?php if (!empty($post['tag_name'])): ?>
          <small class="badge badge-pill badge-light border text-dark py-1 px-3">
            <?php if ($post['tag_icon']): ?>
              <i class="<?= htmlspecialchars($post['tag_icon']) ?> mr-1"></i>
            <?php endif; ?>
            <?= htmlspecialchars($post['tag_name']) ?>
          </small>
        <?php endif; ?>
      </div>

      <!-- Featured Image -->
      <!-- <?php if (!empty($post['featured_image'])): ?>
        <img src="<?= $base . htmlspecialchars($post['featured_image']) ?>" class="img-fluid w-100 rounded mb-4"
          alt="<?= htmlspecialchars($title) ?>">
      <?php endif; ?> -->

      <!-- Summary -->
      <!-- <?php if (!empty($post['summary'])): ?>
        <div class="alert alert-secondary border-0 mb-4" role="alert">
          <div class="d-flex align-items-center mb-2">
            <?php if (!empty($post['country_flag'])): ?>
              <img src="<?= $base . htmlspecialchars($post['country_flag']) ?>"
                alt="<?= htmlspecialchars($post['country_name'] ?? '') ?>" class="me-3"
                style="width: 48px; border-radius: 4px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <?php endif; ?>
            <strong>Tóm tắt:</strong>
          </div>
          <?= $post['summary'] ?>
        </div>
      <?php endif; ?> -->

      <div class="mb-3">
        <button class="btn btn-success btn-sm" type="button">
          <i class="fa fa-thumbs-up"></i> Like
        </button>
        <button class="btn btn-primary btn-sm" onclick="sharePost(<?= (int) ($post['id'] ?? 0) ?>)">
          <i class="fa fa-share"></i> Facebook
        </button>
      </div>

      <!-- Frame 427324326: Country Quick Access -->
      <?php if (!empty($post['country_id']) && !empty($countryLinks)): ?>
        <div class="country-detail-box">
          <div class="country-flag-large">
            <img src="<?= $base . htmlspecialchars($post['country_flag'] ?: '/assets/images/no-image.jpg') ?>"
              alt="<?= htmlspecialchars($post['country_name'] ?? '') ?>">
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
            // Order by specific sequence: Top row (Overview, Cost, Visa), Bottom row (Scholarship, Welfare, Majors)
            $order = ['tong-quan', 'chi-phi', 'visa', 'hoc-bong', 'bao-hiem-va-phuc-loi', 'nganh-hoc-noi-tieng'];

            // Sort current links by order
            $sortedLinks = [];
            foreach ($order as $slug) {
              foreach ($countryLinks as $link) {
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
                <span><?= $link['label'] ?></span>
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
        <?= $post['content'] ?? '' ?>
      </div>

      <!-- Share Buttons -->
      <!-- <div class="mt-5 pt-3 border-top">
        <p class="font-weight-bold mb-2">Chia sẻ bài viết:</p>
        <button class="btn btn-success btn-sm" type="button">
          <i class="fa fa-thumbs-up"></i> Like
        </button>
        <button class="btn btn-primary btn-sm" onclick="sharePost(<?= (int) ($post['id'] ?? 0) ?>)">
          <i class="fa fa-share"></i> Facebook
        </button>
        <button class="btn btn-info btn-sm" type="button">
      <i class="fa fa-share"></i> Twitter
    </button> -->
    </div>

  </div>

  <?php if (!empty($randomPosts)): ?>
    <!-- Related News Section -->
    <div class="mt-5 pt-5 border-top">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0">Tin tức liên quan khác</h3>
        <a href="<?= $base ?>/tin-tuc" class="text-primary text-decoration-none fw-bold">Xem tất cả <i
            class="fa fa-angle-right ms-1"></i></a>
      </div>

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

    if (!content || !tocList || !tocWrapper || !tocHeader || !tocToggle || !tocBody) return;

    // Build TOC
    const headings = content.querySelectorAll('h2, h3');
    if (headings.length > 0) {
      tocWrapper.classList.remove('d-none');

      headings.forEach((heading, index) => {
        if (!heading.id) heading.id = 'toc-item-' + index;

        const li = document.createElement('li');
        const a = document.createElement('a');

        a.href = '#' + heading.id;
        a.textContent = heading.textContent;

        if (heading.tagName.toLowerCase() === 'h3') {
          li.classList.add('toc-sub-item');
        }

        a.addEventListener('click', function (e) {
          e.preventDefault();
          const target = document.querySelector(this.getAttribute('href'));
          if (target) target.scrollIntoView({
            behavior: 'smooth'
          });

          // tuỳ chọn: click xong thì tự đóng
          // closeToc();
        });

        li.appendChild(a);
        tocList.appendChild(li);
      });

      // AUTO MỞ MỤC LỤC
      openToc();
    }


    // Toggle logic
    function openToc() {
      tocWrapper.classList.add('is-open');
      // set max-height = chiều cao thực để animate
      tocBody.style.maxHeight = tocBody.scrollHeight + 'px';
    }

    function closeToc(skipAnim) {
      tocWrapper.classList.remove('is-open');
      // animate về 0
      if (skipAnim) {
        tocBody.style.maxHeight = '0px';
      } else {
        tocBody.style.maxHeight = tocBody.scrollHeight + 'px';
        requestAnimationFrame(() => {
          tocBody.style.maxHeight = '0px';
        });
      }
    }

    function toggleToc() {
      if (tocWrapper.classList.contains('is-open')) closeToc();
      else openToc();
    }

    // click cả header hoặc hamburger đều toggle
    tocHeader.addEventListener('click', function (e) {
      // nếu click đúng button thì vẫn toggle (ok)
      toggleToc();
    });

    // stop double-trigger nếu browser bắn event 2 lần
    tocToggle.addEventListener('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      toggleToc();
    });

    // Nếu resize màn hình khi đang mở, cập nhật lại maxHeight
    window.addEventListener('resize', function () {
      if (tocWrapper.classList.contains('is-open')) {
        tocBody.style.maxHeight = tocBody.scrollHeight + 'px';
      }
    });
  });

  function sharePost(id) {
    alert('Đã chia sẻ bài viết ' + id);
  }

  // Related News Swiper
  document.addEventListener("DOMContentLoaded", function () {
    const newsSwiperEl = document.querySelector('.news-swiper');
    if (typeof Swiper !== 'undefined' && newsSwiperEl) {
      const postCount = <?= count($randomPosts ?? []) ?>;
      new Swiper('.news-swiper', {
        slidesPerView: 1,
        spaceBetween: 25,
        loop: postCount > 3,
        watchOverflow: true,
        grabCursor: true,
        autoplay: {
          delay: 3500,
          disableOnInteraction: false,
          pauseOnMouseEnter: true,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
          dynamicBullets: true
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
  /* CSS cho Mục lục */
  .toc-container {
    background-color: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 30px;
  }

  /* TOC Collapsible */
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

  .toc-toggle i {
    font-size: 16px;
  }

  /* Nội dung TOC collapse */
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

  /* Country Quick Access Box */
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
  }

  .country-flag-large img {
    width: 100%;
    height: 100%;
    object-fit: cover;
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

  .cat-link-item i {
    font-size: 24px;
    color: #007bff;
    width: 32px;
    text-align: center;
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

  /* Swiper Related News Styling */
  .news-swiper {
    padding-bottom: 60px !important;
    position: static !important;
  }

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
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
  }

  .swiper-button-lock,
  .swiper-pagination-lock {
    display: none !important;
  }

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
  }

  .news-swiper .swiper-button-prev::after {
    content: '\f053' !important;
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