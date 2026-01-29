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
</style>

<?php partial('layouts/pages/base/base_hero', [
  'title' => $title,
  'breadcrumbs' => $breadcrumbs ?? null
]) ?>

<div class="container py-5">
  <div class="row">
    <div class="col-lg-8 mx-auto">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0">
          <li class="breadcrumb-item"><a href="<?= $base ?>/">Trang chủ</a></li>

          <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($title) ?></li>
        </ol>
      </nav>

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
      <?php if (!empty($post['featured_image'])): ?>
        <img src="<?= $base . htmlspecialchars($post['featured_image']) ?>" class="img-fluid w-100 rounded mb-4"
          alt="<?= htmlspecialchars($title) ?>">
      <?php endif; ?>

      <!-- Summary -->
      <!-- <?php if (!empty($post['summary'])): ?>
        <div class="alert alert-secondary border-0" role="alert">
          <strong>Tóm tắt:</strong><br>
          <?= $post['summary'] ?>
        </div>
      <?php endif; ?> -->

      <!-- Table of Contents -->
      <div id="toc-wrapper" class="toc-container d-none">
        <div class="toc-header" id="toc-header">
          <div class="toc-title mb-0" style="border-bottom:0;padding-bottom:0;">
            <i class="fa fa-list-ul mr-2"></i>Mục lục bài viết
          </div>

          <!-- Hamburger icon -->
          <button type="button" class="toc-toggle" id="toc-toggle" aria-label="Toggle TOC">
            <svg xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
              <path
                d="M104 112C90.7 112 80 122.7 80 136L80 184C80 197.3 90.7 208 104 208L152 208C165.3 208 176 197.3 176 184L176 136C176 122.7 165.3 112 152 112L104 112zM256 128C238.3 128 224 142.3 224 160C224 177.7 238.3 192 256 192L544 192C561.7 192 576 177.7 576 160C576 142.3 561.7 128 544 128L256 128zM256 288C238.3 288 224 302.3 224 320C224 337.7 238.3 352 256 352L544 352C561.7 352 576 337.7 576 320C576 302.3 561.7 288 544 288L256 288zM256 448C238.3 448 224 462.3 224 480C224 497.7 238.3 512 256 512L544 512C561.7 512 576 497.7 576 480C576 462.3 561.7 448 544 448L256 448zM80 296L80 344C80 357.3 90.7 368 104 368L152 368C165.3 368 176 357.3 176 344L176 296C176 282.7 165.3 272 152 272L104 272C90.7 272 80 282.7 80 296zM104 432C90.7 432 80 442.7 80 456L80 504C80 517.3 90.7 528 104 528L152 528C165.3 528 176 517.3 176 504L176 456C176 442.7 165.3 432 152 432L104 432z" />
            </svg></button>
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
      <div class="mt-5 pt-3 border-top">
        <p class="font-weight-bold mb-2">Chia sẻ bài viết:</p>
        <button class="btn btn-primary btn-sm" onclick="sharePost(<?= (int) ($post['id'] ?? 0) ?>)">
          <i class="fa fa-facebook"></i> Facebook
        </button>
        <button class="btn btn-info btn-sm" type="button">
          <i class="fa fa-twitter"></i> Twitter
        </button>
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
</script>