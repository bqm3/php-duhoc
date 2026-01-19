<?php if (!isset($base))
  $base = ''; ?>

<?php
// Lấy URI hiện tại để check active menu
$current_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$relative_path = $current_uri;
if ($base && strpos($current_uri, $base) === 0) {
  $relative_path = substr($current_uri, strlen($base));
}
if ($relative_path === '')
  $relative_path = '/';

$menus = [
  ['Trang Chủ', $base . '/', $relative_path === '/'],
  ['Giới Thiệu', $base . '/gioi-thieu', $relative_path === '/gioi-thieu'],
  ['Tin Tức & Sự kiện', '#', false],
  ['Du Học', '#', strpos($relative_path, '/du-hoc') === 0],
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
        <?php foreach ($menus as $m):
          [$label, $href, $active] = $m; ?>
          <?php if ($label === 'Du Học'): ?>
            <li class="nav-item dropdown vnpc-dropdown">
              <a class="nav-link vnpc-navlink dropdown-toggle <?= $active ? 'active' : '' ?>" href="#"
                id="studyAbroadDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= htmlspecialchars($label) ?>
              </a>
              <div class="dropdown-menu vnpc-dropdown-menu shadow border-0 p-4" aria-labelledby="studyAbroadDropdown"
                style="width: 600px;">
                <div class="row" id="studyAbroadMenuContent">
                  <div class="col-12 text-center p-3">
                    <div class="spinner-border spinner-border-sm text-primary" role="status"></div>
                  </div>
                </div>
              </div>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link vnpc-navlink <?= $active ? 'active' : '' ?>" href="<?= $href ?>">
                <?= htmlspecialchars($label) ?>
              </a>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</nav>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const dropdown = document.querySelector('.vnpc-dropdown');
    const menuContent = document.getElementById('studyAbroadMenuContent');
    let loaded = false;

    dropdown.addEventListener('mouseenter', function () {
      if (!loaded) {
        fetch('<?= $base ?>/api/study-abroad-menu')
          .then(response => response.json())
          .then(data => {
            renderMenu(data);
            loaded = true;
          })
          .catch(err => {
            menuContent.innerHTML = '<div class="col-12 text-danger text-center">Không thể tải dữ liệu</div>';
          });
      }
    });

    function renderMenu(data) {
      if (!data || data.length === 0) {
        menuContent.innerHTML = '<div class="col-12 text-center">Không có dữ liệu</div>';
        return;
      }

      let html = '';
      data.forEach(continent => {
        html += `
        <div class="col-md-4 mb-3">
          <h6 class="dropdown-header px-0 text-primary fw-bold">${continent.name}</h6>
          ${continent.countries.map(country => `
            <a class="dropdown-item px-0 py-1" href="<?= $base ?>/du-hoc/${country.slug}">
              ${country.name}
            </a>
          `).join('')}
        </div>
      `;
      });
      menuContent.innerHTML = html;
    }
  });
</script>

<style>
  .vnpc-dropdown:hover .vnpc-dropdown-menu {
    display: block;
  }

  .vnpc-dropdown-menu {
    margin-top: 0;
  }

  .vnpc-dropdown-menu .dropdown-item:hover {
    background: transparent;
    color: var(--vnpc-primary);
    text-decoration: underline;
  }
</style>