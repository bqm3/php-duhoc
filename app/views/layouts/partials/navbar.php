<?php if (!isset($base)) $base = ''; ?>

<?php
$menus = $menus ?? [
  ['Trang Chủ', '#', true],
  ['Giới Thiệu', '#', false],
  ['Tin Tức & Sự kiện', '#', false],
  ['Du Học', '#', false],
  ['Học bổng du học', '#', false],
  ['Visa du học', '#', false],
  ['Tìm trường', '#', false],
  ['Tuyển Dụng', '#', false],
  ['Liên hệ', '#', false],
];
?>

<nav class="navbar navbar-expand-lg bg-white vnpc-nav shadow-sm sticky-top">
  <div class="container-xxl">
    <a class="navbar-brand d-flex align-items-center gap-2" href="<?= $base ?: '/' ?>">
      <img src="<?= $base ?>/assets/svgs/clients/ic_traidat.svg" width="46" height="32" alt="">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#vnpcNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div id="vnpcNavbar" class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto gap-lg-2">
        <?php foreach ($menus as $m): [$label, $href, $active] = $m; ?>
          <li class="nav-item">
            <a class="nav-link vnpc-navlink <?= $active ? 'active' : '' ?>" href="<?= $href ?>">
              <?= htmlspecialchars($label) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</nav>
