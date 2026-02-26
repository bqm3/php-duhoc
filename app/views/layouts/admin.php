<?php include $viewFile; ?>

<script>
  window.__csrf = "<?= htmlspecialchars($csrf ?? '') ?>";
</script>
<script>
  // delegated handler to support logout anchors in view-based admin pages
  document.addEventListener('click', function (e) {
    var a = e.target.closest && e.target.closest('a');
    if (!a) return;

    // Lấy text và chuẩn hóa
    var txt = (a.textContent || '').trim().toLowerCase();

    // Kiểm tra điều kiện:
    // 1. Text là 'logout' hoặc 'đăng xuất'
    // 2. Hoặc chứa icon .fa-power-off
    // 3. Hoặc href chứa '/logout'
    if (txt === 'logout' || txt === 'đăng xuất' || a.querySelector('.fa-power-off') || a.getAttribute('href').indexOf('logout') !== -1) {
      e.preventDefault();
      if (!confirm('Bạn có chắc chắn muốn đăng xuất?')) return;

      var form = document.getElementById('admin-logout-form');
      if (form) {
        form.querySelector('input[name=_csrf]').value = window.__csrf || '';
        form.submit();
      } else {
        console.error('Logout form not found');
      }
    }
  });
</script>
<!-- hidden logout form for admin pages served via views -->
<form id="admin-logout-form" method="POST" action="<?= ($base ?? '') ?>/admin/logout" style="display:none">
  <input type="hidden" name="_csrf" value="<?= htmlspecialchars($csrf ?? '') ?>">
</form>