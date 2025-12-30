<?php
// Admin dashboard (serve static admin index HTML)
require_once __DIR__ . '/../utils/createLog.php';

if ($uri === '/admin' && $method === 'GET') {
  Auth::requireAdmin();
  // Serve the pre-built admin HTML dashboard
  $file = __DIR__ . '/../views/admin/index.html';

  if (is_file($file)) {
    $html = file_get_contents($file);

    // normalize asset links to use the app base + /assets
    $base = $GLOBALS['base'] ?? '';
    $assetPrefix = $base . '/assets';
    $html = preg_replace('#(href|src)=("|\')(?:/[^\/]*/)?assets/#i', '$1=$2' . $assetPrefix . '/', $html);

    // rewrite relative html links to /admin/<page>.html
    $html = preg_replace('#href=("|\')(?!/|https?://)([^"\']+?\.html)("|\')#i', 'href=$1' . ($base ?? '') . '/admin/$2$3', $html);

    // inject CSRF token and robust logout helper before </body>
    $csrf = Csrf::token();
    // create a hidden form and use delegated click handler so the logout link always works
    $logoutScript = "<script>window.__csrf = '" . addslashes($csrf) . "';(function(){var base='" . ($base ?? '') . "';var formId='admin-logout-form';if(!document.getElementById(formId)){var f=document.createElement('form');f.method='POST';f.action=base + '/admin/logout';f.id=formId;f.style.display='none';var i=document.createElement('input');i.type='hidden';i.name='_csrf';i.value=window.__csrf||'';f.appendChild(i);document.body.appendChild(f);}function doLogoutAnchor(a){if(!confirm('Logout?')) return;var form=document.getElementById(formId);if(form){form.querySelector('input[name=_csrf]').value=window.__csrf||'';form.submit();}}document.addEventListener('click', function(e){var a = e.target.closest && e.target.closest('a');if(!a) return;var txt = (a.textContent || '').trim().toLowerCase();if(txt==='logout' || a.querySelector('.fa-power-off')){e.preventDefault();doLogoutAnchor(a);}});})();</script>";

    if (stripos($html, '</body>') !== false) {
      $html = str_ireplace('</body>', $logoutScript . '</body>', $html);
    } else {
      $html .= $logoutScript;
    }

    header('Content-Type: text/html; charset=utf-8');
    echo $html;
    exit;
  }
}
// Serve admin static files (assets, images, additional html pages)
if ($method === 'GET' && strpos($uri, '/admin/') === 0) {
  // map /admin/... to app/views/admin/...
  $relative = substr($uri, strlen('/admin/'));
  $file = __DIR__ . '/../views/admin/' . $relative;

  if (is_file($file)) {
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    // HTML pages should be protected and have logout/CSRF injected
    if ($ext === 'html') {
      Auth::requireAdmin();

      $html = file_get_contents($file);

      // normalize asset links to use the app base + /assets
      $base = $GLOBALS['base'] ?? '';
      $assetPrefix = $base . '/assets';
      $html = preg_replace('#(href|src)=("|\')(?:/[^\/]*/)?assets/#i', '$1=$2' . $assetPrefix . '/', $html);

      // rewrite relative html links to /admin/<page>.html
      $html = preg_replace('#href=("|\')(?!/|https?://)([^"\']+?\.html)("|\')#i', 'href=$1' . ($base ?? '') . '/admin/$2$3', $html);

      // inject CSRF token and robust logout helper before </body>
      $csrf = Csrf::token();
      // create a hidden form and use delegated click handler so the logout link always works
      $logoutScript = "<script>window.__csrf = '" . addslashes($csrf) . "';(function(){var base='" . ($base ?? '') . "';var formId='admin-logout-form';if(!document.getElementById(formId)){var f=document.createElement('form');f.method='POST';f.action=base + '/admin/logout';f.id=formId;f.style.display='none';var i=document.createElement('input');i.type='hidden';i.name='_csrf';i.value=window.__csrf||'';f.appendChild(i);document.body.appendChild(f);}function doLogoutAnchor(a){if(!confirm('Logout?')) return;var form=document.getElementById(formId);if(form){form.querySelector('input[name=_csrf]').value=window.__csrf||'';form.submit();}}document.addEventListener('click', function(e){var a = e.target.closest && e.target.closest('a');if(!a) return;var txt = (a.textContent || '').trim().toLowerCase();if(txt==='logout' || a.querySelector('.fa-power-off')){e.preventDefault();doLogoutAnchor(a);}});})();</script>";

      if (stripos($html, '</body>') !== false) {
        $html = str_ireplace('</body>', $logoutScript . '</body>', $html);
      } else {
        $html .= $logoutScript;
      }

      header('Content-Type: text/html; charset=utf-8');
      echo $html;
      exit;
    }

    // simple mime mapping for static assets
    $mimes = [
      'css' => 'text/css',
      'js'  => 'application/javascript',
      'png' => 'image/png',
      'jpg' => 'image/jpeg',
      'jpeg'=> 'image/jpeg',
      'gif' => 'image/gif',
      'svg' => 'image/svg+xml',
      'ico' => 'image/x-icon'
    ];

    header('Content-Type: ' . ($mimes[$ext] ?? 'application/octet-stream'));
    readfile($file);
    exit;
  }
}
