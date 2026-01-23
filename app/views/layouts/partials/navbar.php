<?php if (!isset($base)) $base = ''; ?>

<?php
$current_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$relative_path = $current_uri;
if ($base && strpos($current_uri, $base) === 0) {
  $relative_path = substr($current_uri, strlen($base));
}
if ($relative_path === '') $relative_path = '/';

$menus = [
  ['Trang Chủ', $base . '/', $relative_path === '/'],
  ['Giới Thiệu', $base . '/gioi-thieu', $relative_path === '/gioi-thieu'],
  ['Tin Tức & Sự kiện', $base . '/tin-tuc', strpos($relative_path, '/tin-tuc') === 0],
  ['Du Học', $base . '/du-hoc', strpos($relative_path, '/du-hoc') === 0],
  ['Học bổng du học', $base . '/hoc-bong', strpos($relative_path, '/hoc-bong') === 0],
  ['Visa du học', $base . '/visa-du-hoc', strpos($relative_path, '/visa-du-hoc') === 0],
  ['Tìm trường', $base . '/tim-truong', strpos($relative_path, '/tim-truong') === 0],
  ['Tuyển Dụng', $base . '/tuyen-dung', strpos($relative_path, '/tuyen-dung') === 0],
  ['Liên hệ', $base . '/lien-he', strpos($relative_path, '/lien-he') === 0],
];
?>

<nav class="navbar navbar-expand-lg bg-white vnpc-nav shadow-sm sticky-top"
     role="navigation"
     aria-label="Menu chính">
  <div class="container-xxl">
    <a class="navbar-brand d-flex align-items-center gap-2"
       href="<?= $base ?: '/' ?>"
       aria-label="Trang chủ VNPC">
      <img src="<?= $base ?>/assets/svgs/clients/ic_traidat.svg"
           width="46"
           height="32"
           alt="VNPC - Văn phòng tư vấn du học"
           decoding="async"
           fetchpriority="high">
    </a>

    <button class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#vnpcNavbar"
            aria-controls="vnpcNavbar"
            aria-expanded="false"
            aria-label="Mở menu điều hướng">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div id="vnpcNavbar" class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto gap-lg-2" role="menubar">
        <?php foreach ($menus as $m):
          [$label, $href, $active] = $m; ?>

          <?php if ($label === 'Du Học'): ?>
            <li class="nav-item dropdown vnpc-dropdown" role="none">
              <a class="nav-link vnpc-navlink dropdown-toggle <?= $active ? 'active' : '' ?>"
                 href="<?= $href ?>"
                 id="studyAbroadDropdown"
                 role="menuitem"
                 aria-haspopup="true"
                 aria-expanded="false">
                <?= htmlspecialchars($label) ?>
              </a>

              <div class="dropdown-menu vnpc-dropdown-menu shadow border-0 p-4"
                   aria-labelledby="studyAbroadDropdown"
                   style="width:600px;"
                   role="menu">
                <div class="row" id="studyAbroadMenuContent">
                  <div class="col-12 text-center p-3">
                    <span class="visually-hidden">Đang tải menu du học</span>
                    <div class="spinner-border spinner-border-sm text-primary" role="status"></div>
                  </div>
                </div>
              </div>
            </li>
          <?php else: ?>
            <li class="nav-item" role="none">
              <a class="nav-link vnpc-navlink <?= $active ? 'active' : '' ?>"
                 href="<?= $href ?>"
                 role="menuitem"
                 <?= $active ? 'aria-current="page"' : '' ?>>
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

  if (!dropdown) return;

  dropdown.addEventListener('mouseenter', function () {
    if (!loaded) {
      fetch('<?= $base ?>/api/study-abroad-menu', { credentials: 'same-origin' })
        .then(r => r.json())
        .then(res => {
          renderMenu(res);
          loaded = true;
        })
        .catch(() => {
          menuContent.innerHTML =
            '<div class="col-12 text-danger text-center">Không thể tải menu</div>';
        });
    }
  });

  function renderMenu(res) {
    if (!res || !res.ok || !Array.isArray(res.items)) {
      menuContent.innerHTML =
        '<div class="col-12 text-center">Chưa có nội dung du học</div>';
      return;
    }

    let html = '';
    res.items.forEach(ct => {
      html += `
        <div class="col-md-4 mb-3">
          <h3 class="dropdown-header px-0 text-primary fw-bold">
            ${escapeHtml(ct.name)}
          </h3>
          ${(ct.countries || []).map(x => `
            <a class="dropdown-item px-0 py-1"
               href="<?= $base ?>${escapeAttr(x.post?.href || '#')}">
              ${escapeHtml(x.name)}
            </a>
          `).join('')}
        </div>
      `;
    });

    menuContent.innerHTML = html;
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
});
</script>

<style>
.vnpc-dropdown:hover .vnpc-dropdown-menu { display:block; }
.vnpc-dropdown-menu { margin-top:0; }
.vnpc-dropdown-menu .dropdown-item:hover{
  background:transparent;
  color:var(--vnpc-primary);
  text-decoration:underline;
}
.visually-hidden{
  position:absolute!important;
  width:1px;height:1px;
  padding:0;margin:-1px;
  overflow:hidden;clip:rect(0,0,0,0);
  white-space:nowrap;border:0;
}
</style>
