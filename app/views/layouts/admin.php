<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
  <?php include $viewFile; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
window.__csrf = "<?= htmlspecialchars($csrf ?? '') ?>";
</script>
<script>
// delegated handler to support logout anchors in view-based admin pages
document.addEventListener('click', function(e){
  var a = e.target.closest && e.target.closest('a');
  if(!a) return;
  var txt = (a.textContent || '').trim().toLowerCase();
  console.log(txt);
  if(txt === 'logout' || a.querySelector('.fa-power-off')){
    e.preventDefault();
    if(!confirm('Logout?')) return;
    var form = document.getElementById('admin-logout-form');
    if(form){form.querySelector('input[name=_csrf]').value = window.__csrf || ''; form.submit();}
  }
});
</script>
<!-- hidden logout form for admin pages served via views -->
<form id="admin-logout-form" method="POST" action="<?= ($base ?? '') ?>/admin/logout" style="display:none">
  <input type="hidden" name="_csrf" value="<?= htmlspecialchars($csrf ?? '') ?>">
</form>
</body>
</html>
