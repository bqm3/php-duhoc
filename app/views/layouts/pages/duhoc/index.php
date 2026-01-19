<?php
// app/views/layouts/pages/duhoc/index.php  (DETAIL)
// Yêu cầu biến: $post (array) và $base (string)
$title = $post['title'] ?? 'Bài viết';
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

<div class="container py-4">
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
          <?= htmlspecialchars($post['creator_name'] ?? 'Admin') ?>
        </small>

        <?php if (!empty($post['created_at'])): ?>
          <small>
            <i class="fa fa-calendar mr-1"></i>
            <?= date('d/m/Y', strtotime($post['created_at'])) ?>
          </small>
        <?php endif; ?>

        <?php if (isset($post['count_view'])): ?>
          <small>
            <i class="fa fa-eye mr-1"></i>
            <?= (int)$post['count_view'] ?> lượt xem
          </small>
        <?php endif; ?>
      </div>

      <!-- Featured Image -->
      <?php if (!empty($post['featured_image'])): ?>
        <img
          src="<?= $base . htmlspecialchars($post['featured_image']) ?>"
          class="img-fluid w-100 rounded mb-4"
          alt="<?= htmlspecialchars($title) ?>"
        >
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
        <div class="toc-title"><i class="fa fa-list-ul mr-2"></i>Mục lục bài viết</div>
        <ul id="toc-list"></ul>
      </div>

      <!-- Main Content -->
      <div class="post-content" id="post-content">
        <?= $post['content'] ?? '' ?>
      </div>

      <!-- Share Buttons -->
      <div class="mt-5 pt-3 border-top">
        <p class="font-weight-bold mb-2">Chia sẻ bài viết:</p>
        <button class="btn btn-primary btn-sm" onclick="sharePost(<?= (int)($post['id'] ?? 0) ?>)">
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
  document.addEventListener("DOMContentLoaded", function() {
    const content = document.getElementById('post-content');
    const tocList = document.getElementById('toc-list');
    const tocWrapper = document.getElementById('toc-wrapper');

    if (!content || !tocList || !tocWrapper) return;

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

        a.addEventListener('click', function(e) {
          e.preventDefault();
          const target = document.querySelector(this.getAttribute('href'));
          if (target) target.scrollIntoView({ behavior: 'smooth' });
        });

        li.appendChild(a);
        tocList.appendChild(li);
      });
    }
  });

  function sharePost(id) {
    alert('Đã chia sẻ bài viết ' + id);
  }
</script>
