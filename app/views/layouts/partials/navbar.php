<?php if (!isset($base))
  $base = ''; ?>

<?php
$current_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$relative_path = $current_uri;
if ($base && strpos($current_uri, $base) === 0) {
  $relative_path = substr($current_uri, strlen($base));
}
if ($relative_path === '')
  $relative_path = '/';

// The navigation menu based on NavbarController
$nav_items = NavbarController::getNavItems($base, $relative_path);

$megaMenuSlugs = [
  'Du học' => 'du-hoc',
  'Học bổng' => 'hoc-bong',
  'Chi phí' => 'chi-phi',
  'Ngoại ngữ du học' => 'ngoai-ngu-du-hoc',
];
?>

<div class="vnpc-menubar">
  <div class="menubar-container">
    <!-- Mobile Menu Toggle Button -->
    <button class="mobile-menu-toggle d-lg-none" aria-label="Toggle menu">
      <i class="fa-solid fa-bars"></i>
    </button>

    <!-- Mobile Search Box (In place of logo) -->
    <div class="mobile-header-search d-lg-none">
      <form action="<?= $base ?>/tim-kiem" method="GET" class="mobile-h-search-form">
        <input type="text" name="q" class="mobile-h-search-input" placeholder="Tìm kiếm...">
        <button type="submit" class="mobile-h-search-btn">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>
    </div>

    <!-- Desktop Navigation -->
    <div class="nav-wrapper">
      <!-- Mobile Drawer Header -->
      <div class="drawer-header d-lg-none">
        <div class="drawer-logo-wrapper">
          <img src="<?= $base ?>/assets/svgs/clients/ic_traidat.svg" alt="VNPC Logo" class="drawer-logo">
          <div class="drawer-title">
            <span class="brand">VNPC</span>
            <span class="tagline">Tư vấn du học uy tín</span>
          </div>
        </div>
      </div>

      <?php foreach ($nav_items as $item):
        [$label, $href, $active, $slug] = $item;
        $mobileOnly = $item[4] ?? false;
        $hasMega = isset($megaMenuSlugs[$label]);
        $icon = '';
        if ($mobileOnly) {
          // $icons = [
          //   'Sự kiện' => 'fa-regular fa-calendar-check',
          //   'Đăng ký' => 'fa-regular fa-pen-to-square',
          //   'Tuyển dụng' => 'fa-solid fa-briefcase',
          //   'Liên hệ' => 'fa-regular fa-envelope'
          // ];
          // $iconClass = $icons[$label] ?? 'fa-solid fa-chevron-right';
          // $icon = "<i class=\"$iconClass me-2 drawer-icon\"></i>";
        }
        ?>
        <div class="nav-item-container <?= $hasMega ? 'has-mega' : '' ?> <?= $mobileOnly ? 'd-lg-none' : '' ?>"
          data-slug="<?= $megaMenuSlugs[$label] ?? '' ?>">
          <a href="<?= $href ?>" class="nav-link <?= $active ? 'active' : '' ?>">
            <?php if ($label === 'Trang chủ'): ?>
              <span class="d-none d-lg-inline">
                <img src="<?= $base ?>/assets/svgs/clients/ic_home26.svg" alt="Trang chủ" width="28" height="22">
              </span>
              <span class="d-lg-none"><i class="fa-solid fa-house me-2 drawer-icon"></i> Trang chủ</span>
            <?php else: ?>
              <?= $icon ?>
              <?= $label ?>
            <?php endif; ?>
            <?php if ($hasMega): ?>
              <i class="fa-solid fa-chevron-down ms-1 chevron-icon"></i>
            <?php endif; ?>
          </a>

          <?php if ($hasMega): ?>
            <div class="mega-menu-dropdown">
              <div class="mega-menu-inner shadow-lg">
                <div class="row mega-menu-content p-4">
                  <div class="col-12 text-center py-4">
                    <div class="spinner-border spinner-border-sm text-primary"></div>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>

      <!-- Mobile Drawer Footer -->
      <div class="drawer-footer d-lg-none">
        <div class="drawer-contact">
          <a href="tel:0912123456" class="contact-item">
            <i class="fa-solid fa-phone-volume"></i>
            <span>091 212 3456</span>
          </a>
        </div>
        <div class="drawer-socials">
          <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" aria-label="Youtube"><i class="fa-brands fa-youtube"></i></a>
          <a href="#" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
        </div>
      </div>
    </div>

    <!-- Mobile Overlay -->
    <div class="mobile-menu-overlay"></div>
  </div>
</div>

<style>
  .vnpc-menubar {
    width: 100%;
    height: 70px;
    background: linear-gradient(135deg, #1e60a3 0%, #2777C4 100%);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    position: sticky;
    top: 0;
    z-index: 1000;
  }

  .menubar-container {
    width: 100%;
    max-width: 1300px;
    height: 100%;
    padding: 0 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
  }

  .nav-wrapper {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    height: 100%;
  }

  .nav-link {
    font-family: 'Inter', sans-serif;
    font-weight: 600;
    font-size: 18px;
    color: rgba(255, 255, 255, 0.9);
    text-decoration: none;
    white-space: nowrap;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    position: relative;
    padding: 10px 0;
  }

  /* Desktop hover indicator */
  @media (min-width: 992px) {
    .nav-link::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 2px;
      background: #FFFFFF;
      transition: width 0.3s ease;
      border-radius: 2px;
    }

    .nav-link:hover::after,
    .nav-link.active::after {
      width: 100%;
    }

    .nav-link:hover,
    .nav-link.active {
      color: #FFFFFF;
      opacity: 1;
    }
  }

  .chevron-icon {
    font-size: 10px;
    margin-left: 6px;
    transition: transform 0.3s ease;
  }

  /* Mega Menu Styles */
  .nav-item-container {
    position: relative;
    height: 100%;
    display: flex;
    align-items: center;
  }

  .mega-menu-dropdown {
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%) translateY(15px);
    width: 800px;
    display: none;
    z-index: 1000;
    opacity: 0;
    pointer-events: none;
    transition: all 0.3s ease;
  }

  .mega-menu-inner {
    background: #FFFFFF;
    border-radius: 12px;
    overflow: hidden;
    border-top: 4px solid #2777C4;
  }

  .nav-item-container:hover .mega-menu-dropdown {
    display: block;
    opacity: 1;
    pointer-events: auto;
    transform: translateX(-50%) translateY(0);
  }

  /* Bridge for hover */
  .nav-item-container::after {
    content: '';
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    height: 20px;
  }

  .mega-menu-content {
    min-height: 150px;
  }

  .mega-menu-header {
    color: #1a1a1a;
    font-weight: 700;
    font-size: 16px;
    margin-bottom: 12px;
    padding-bottom: 8px;
    border-bottom: 1px solid #f0f0f0;
    position: relative;
  }

  .mega-menu-header::after {
    content: '';
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 40px;
    height: 2px;
    background: #2777C4;
  }

  .mega-menu-item {
    color: #555;
    text-decoration: none;
    display: block;
    padding: 6px 0;
    font-size: 14px;
    transition: all 0.2s ease;
    border-radius: 4px;
  }

  .mega-menu-item:hover {
    color: #2777C4;
    padding-left: 5px;
    background: rgba(39, 119, 196, 0.05);
  }

  /* Mobile Elements - Hidden by default */
  .mobile-menu-toggle {
    background: transparent;
    border: none;
    color: #FFFFFF;
    font-size: 24px;
    cursor: pointer;
    padding: 10px;
    display: none;
    z-index: 1002;
  }

  .mobile-header-search {
    display: none;
    flex-grow: 1;
    margin: 0 15px;
    max-width: 280px;
  }

  .mobile-h-search-form {
    position: relative;
    width: 100%;
  }

  .mobile-h-search-input {
    width: 100%;
    height: 38px;
    background: rgba(255, 255, 255, 0.2);
    border: none;
    border-radius: 12px;
    padding: 0 45px 0 15px;
    color: #FFFFFF;
    font-size: 14px;
    outline: none;
    transition: all 0.3s ease;
  }

  .mobile-h-search-input:focus {
    background: #FFFFFF;
    color: #333;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }

  .mobile-h-search-input:focus+.mobile-h-search-btn {
    color: #2777C4;
  }

  .mobile-h-search-input::placeholder {
    color: rgba(255, 255, 255, 0.8);
  }

  .mobile-h-search-input:focus::placeholder {
    color: #999;
  }

  .mobile-h-search-btn {
    position: absolute;
    right: 5px;
    top: 50%;
    transform: translateY(-50%);
    background: transparent;
    border: none;
    color: #FFFFFF;
    font-size: 16px;
    padding: 5px 10px;
    transition: color 0.3s ease;
  }

  .mobile-menu-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(4px);
    z-index: 998;
    opacity: 0;
    transition: all 0.3s ease;
  }

  .mobile-menu-overlay.show {
    display: block;
    opacity: 1;
  }

  /* Responsive adjustments */
  @media (max-width: 1600px) {
    .menubar-container {
      padding: 0 100px;
    }
  }

  @media (max-width: 1300px) {
    .nav-wrapper {
      gap: 30px;
    }
  }

  @media (max-width: 1100px) {
    .nav-wrapper {
      gap: 15px;
    }

    .nav-link {
      font-size: 16px;
    }
  }

  /* Mobile Styles */
  @media (max-width: 991px) {
    .vnpc-menubar {
      height: 60px;
    }

    .menubar-container {
      padding: 0 20px;
      justify-content: flex-start;
    }

    .mobile-menu-toggle {
      display: block;
      position: relative;
      transition: color 0.3s ease;
    }

    /* Hide toggle button when menu is open */
    body.menu-open .mobile-menu-toggle {
      display: none;
    }

    .mobile-header-search {
      display: block;
    }

    .nav-wrapper {
      position: fixed;
      top: 0;
      left: -100%;
      width: 80%;
      max-width: 320px;
      height: 100vh;
      background: #FFFFFF;
      flex-direction: column;
      gap: 0;
      padding: 0;
      align-items: flex-start;
      overflow-y: auto;
      box-shadow: 5px 0 25px rgba(0, 0, 0, 0.1);
      transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      z-index: 999;
      display: flex;
      /* Always flex on mobile, positioning controls visibility */
    }

    .nav-wrapper.show {
      left: 0;
    }

    /* Drawer Header */
    .drawer-header {
      width: 100%;
      padding: 30px 20px;
      background: linear-gradient(135deg, #1e60a3 0%, #2777C4 100%);
      color: #FFFFFF;
      margin-bottom: 10px;
    }

    .drawer-logo-wrapper {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .drawer-logo {
      width: 50px;
      height: auto;
      filter: brightness(0) invert(1);
    }

    .drawer-title .brand {
      display: block;
      font-size: 20px;
      font-weight: 800;
      letter-spacing: 1px;
    }

    .drawer-title .tagline {
      font-size: 11px;
      opacity: 0.8;
      font-weight: 400;
    }

    /* Drawer Items */
    .nav-item-container {
      width: 100%;
      border-bottom: 1px solid #f0f0f0;
      flex-direction: column;
      align-items: stretch;
      height: auto;
    }

    .nav-link {
      color: #333;
      padding: 15px 20px;
      width: 100%;
      justify-content: flex-start;
      font-weight: 600;
      font-size: 15px;
      text-transform: uppercase;
      letter-spacing: 0.3px;
    }

    .nav-link:hover {
      background: #f8f8f8;
    }

    .drawer-icon {
      color: #2777C4;
      width: 24px;
      text-align: center;
      font-size: 16px;
    }

    .nav-link.active {
      background: rgba(39, 119, 196, 0.08);
      color: #2777C4;
      border-left: 3px solid #2777C4;
    }

    .chevron-icon {
      margin-left: auto;
      font-size: 11px;
      transition: transform 0.3s ease;
    }

    .nav-item-container.active-mobile>.nav-link .chevron-icon {
      transform: rotate(180deg);
    }

    /* Mega Menu on Mobile */
    .mega-menu-dropdown {
      position: static !important;
      transform: none !important;
      width: 100% !important;
      background: #f9f9f9;
      box-shadow: none !important;
      border-radius: 0;
      opacity: 1 !important;
      pointer-events: auto !important;
      display: block !important;
      max-height: 0;
      overflow: hidden;
      margin-top: 0;
      transition: max-height 0.35s ease;
    }

    .mega-menu-inner {
      border-top: none;
      background: transparent;
      border-radius: 0;
      box-shadow: none !important;
    }

    .nav-item-container.active-mobile .mega-menu-dropdown {
      max-height: 3000px;
    }

    .mega-menu-content {
      padding: 8px 0 !important;
      min-height: auto !important;
    }

    .mega-menu-header {
      padding: 10px 24px;
      font-size: 13px;
      margin: 0;
      border-bottom: none;
      color: #333;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      font-weight: 700;
    }

    .mega-menu-header::after {
      display: none;
    }

    .mega-menu-item {
      padding: 10px 24px 10px 36px;
      font-size: 14px;
      color: #444;
      border-radius: 0;
    }

    .mega-menu-item:hover {
      background: #eee;
      padding-left: 36px;
    }

    /* Drawer Footer */
    .drawer-footer {
      margin-top: auto;
      width: 100%;
      padding: 20px;
      background: #f9f9f9;
      border-top: 1px solid #eee;
    }

    .drawer-contact .contact-item {
      display: flex;
      align-items: center;
      gap: 10px;
      color: #2777C4;
      font-weight: 700;
      font-size: 18px;
      text-decoration: none;
      margin-bottom: 15px;
    }

    .drawer-socials {
      display: flex;
      gap: 15px;
    }

    .drawer-socials a {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: #FFFFFF;
      border: 1px solid #ddd;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #666;
      transition: all 0.3s ease;
      text-decoration: none;
    }

    .drawer-socials a:hover {
      background: #2777C4;
      color: #FFFFFF;
      border-color: #2777C4;
    }

    /* Prevent body scroll when menu is open */
    body.menu-open {
      overflow: hidden;
    }
  }

  @media (max-width: 480px) {
    .nav-wrapper {
      width: 90%;
    }

    .mobile-logo img {
      height: 28px;
    }
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.querySelector('.mobile-menu-toggle');
    const navWrapper = document.querySelector('.nav-wrapper');
    const overlay = document.querySelector('.mobile-menu-overlay');
    const body = document.body;

    function closeMenu() {
      navWrapper.classList.remove('show');
      overlay.classList.remove('show');
      body.classList.remove('menu-open');
    }

    function openMenu() {
      navWrapper.classList.add('show');
      overlay.classList.add('show');
      body.classList.add('menu-open');
    }

    if (toggleBtn) {
      toggleBtn.addEventListener('click', function () {
        if (navWrapper.classList.contains('show')) {
          closeMenu();
        } else {
          openMenu();
        }
      });
    }

    if (overlay) {
      overlay.addEventListener('click', closeMenu);
    }

    const dropdowns = document.querySelectorAll('.nav-item-container.has-mega');

    dropdowns.forEach(dropdown => {
      const slug = dropdown.getAttribute('data-slug');
      const menuContent = dropdown.querySelector('.mega-menu-content');
      const link = dropdown.querySelector('.nav-link');
      let loaded = false;

      const loadContent = () => {
        if (!loaded && slug) {
          fetch('<?= $base ?>/api/menu-content/' + slug, { credentials: 'same-origin' })
            .then(r => r.json())
            .then(res => {
              renderMenu(res, menuContent);
              loaded = true;
            })
            .catch(() => {
              menuContent.innerHTML =
                '<div class="col-12 text-danger text-center p-3">Không thể tải menu</div>';
            });
        }
      };

      // Desktop hover
      dropdown.addEventListener('mouseenter', function () {
        if (window.innerWidth > 991) {
          loadContent();
        }
      });

      // Mobile click
      link.addEventListener('click', function (e) {
        if (window.innerWidth <= 991) {
          e.preventDefault();

          // Close other open menus
          dropdowns.forEach(other => {
            if (other !== dropdown) {
              other.classList.remove('active-mobile');
            }
          });

          // Toggle current menu
          dropdown.classList.toggle('active-mobile');

          if (dropdown.classList.contains('active-mobile')) {
            loadContent();
          }
        }
      });
    });

    function renderMenu(res, container) {
      if (!res || !res.ok || !Array.isArray(res.items) || res.items.length === 0) {
        container.innerHTML =
          '<div class="col-12 text-center p-3">Chưa có nội dung cho mục này</div>';
        return;
      }

      let html = '';
      const isMobile = window.innerWidth <= 991;
      const colClass = isMobile ? 'col-12 mb-0' : 'col mb-3';
      res.items.forEach(ct => {
        html += `
        <div class="${colClass}">
          <h3 class="mega-menu-header">
            ${escapeHtml(ct.name)}
          </h3>
          <div class="d-flex flex-column">
            ${(ct.countries || []).map(x => `
              <a class="mega-menu-item"
                 href="<?= $base ?>${escapeAttr(x.post?.href || '#')}">
                ${escapeHtml(x.name)}
              </a>
            `).join('')}
          </div>
        </div>
      `;
      });

      container.innerHTML = html;
    }

    function escapeHtml(str) {
      return String(str ?? '')
        .replaceAll('&', '&amp;')
        .replaceAll('<', '&lt;')
        .replaceAll('>', '&gt;')
        .replaceAll('"', '&quot;')
        .replaceAll("'", '&#039;');
    }

    function escapeAttr(str) {
      return String(str ?? '')
        .replaceAll('"', '%22')
        .replaceAll("'", '%27');
    }

    // Close menu on window resize to desktop
    let resizeTimer;
    window.addEventListener('resize', function () {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(function () {
        if (window.innerWidth > 991) {
          closeMenu();
          dropdowns.forEach(dropdown => {
            dropdown.classList.remove('active-mobile');
          });
        }
      }, 250);
    });
  });
</script>