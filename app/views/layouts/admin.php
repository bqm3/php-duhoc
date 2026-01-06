<?php include $viewFile; ?>

<script>
window.__csrf = "<?= htmlspecialchars($csrf ?? '') ?>";
</script>
<script>
// delegated handler to support logout anchors in view-based admin pages
document.addEventListener('click', function(e){
  var a = e.target.closest && e.target.closest('a');
  if(!a) return;
  var txt = (a.textContent || '').trim().toLowerCase();
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
