<?php if (!isset($base))
  $base = ''; ?>
<div class="vnpc-header-top d-none d-lg-flex">
  <div class="header-top-container">
    <!-- Logo -->
    <a class="header-logo" href="<?= $base ?: '/' ?>">
      <img src="<?= $base ?>/assets/svgs/clients/ic_traidat.svg" alt="Logo">
    </a>

    <!-- Search Box -->
    <div class="header-search-box">
      <form action="<?= $base ?>/tim-kiem" method="GET" class="search-form">
        <input type="text" name="q" class="search-input" placeholder="Nhập từ khóa">
        <button type="submit" class="search-button">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>
    </div>

    <!-- Action Links -->
    <?php
    $current_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $rel_path = $current_uri;
    if ($base && strpos($current_uri, $base) === 0) {
      $rel_path = substr($current_uri, strlen($base));
    }
    if ($rel_path === '')
      $rel_path = '/';
    ?>
    <div class="header-action-links">
      <a href="<?= $base ?>/su-kien" class="<?= $rel_path === '/su-kien' ? 'active' : '' ?>">Sự kiện</a>
      <a href="<?= $base ?>/dang-ky" class="<?= $rel_path === '/dang-ky' ? 'active' : '' ?>">Đăng ký</a>
      <a href="<?= $base ?>/tuyen-dung" class="<?= $rel_path === '/tuyen-dung' ? 'active' : '' ?>">Tuyển dụng</a>
      <a href="<?= $base ?>/lien-he" class="<?= $rel_path === '/lien-he' ? 'active' : '' ?>">Liên hệ</a>
    </div>
  </div>
</div>

<style>
  .vnpc-header-top {
    width: 100%;
    height: 80px;
    background: #FFFFFF;
    display: flex;
    align-items: center;
    justify-content: center;
    filter: drop-shadow(0px 0px 8px rgba(0, 0, 0, 0.25));
    position: relative;
    z-index: 1001;
  }

  .header-top-container {
    width: 100%;
    max-width: 1300px;
    height: 100%;
    padding: 0 15px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
  }

  .header-logo img {
    width: 47px;
    height: 32px;
    object-fit: contain;
  }

  .header-search-box {
    width: 400px;
    height: 40px;
    position: relative;
  }

  .search-form {
    display: flex;
    width: 100%;
    height: 100%;
    position: relative;
  }

  .search-input {
    width: 100%;
    height: 100%;
    background: #FFFFFF;
    border: 1px solid #D9D9D9;
    border-radius: 50px;
    padding: 0 20px;
    padding-right: 90px;
    font-family: 'Inter';
    font-size: 16px;
    color: #000;
  }

  .search-input::placeholder {
    color: #A6A6A6;
  }

  .search-button {
    position: absolute;
    right: 0;
    top: 0;
    width: 81px;
    height: 40px;
    background: #2777C4;
    border: none;
    border-radius: 50px;
    color: #FFFFFF;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
  }

  .search-button i {
    font-size: 18px;
  }

  .header-action-links {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 60px;
  }

  .header-action-links a {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 18px;
    line-height: 30px;
    color: #000000;
    text-decoration: none;
  }

  .header-action-links a.active {
    color: #2777C4;
    font-weight: 600;
  }

  /* Responsive adjustments */
  @media (max-width: 1600px) {
    .header-top-container {
      padding: 0 100px;
    }
  }

  @media (max-width: 1200px) {
    .header-top-container {
      padding: 0 40px;
    }

    .header-action-links {
      gap: 30px;
    }
  }

  @media (max-width: 992px) {
    .header-search-box {
      width: 250px;
    }

    .header-action-links {
      gap: 15px;
      font-size: 16px;
    }
  }

  @media (max-width: 768px) {
    .vnpc-header-top {
      height: auto;
      padding: 10px 0;
    }

    .header-top-container {
      flex-direction: column;
      padding: 0 20px;
      gap: 15px;
    }

    .header-search-box {
      width: 100%;
    }

    .header-action-links {
      display: none;
      /* Hide top links on mobile or move to menu */
    }
  }
</style>