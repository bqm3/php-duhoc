<div class="card">
  <div class="card-header">
    <span class="logo-icon"><i class="fa fa-rocket"></i></span>
    <h3>Sleek Admin</h3>
    <p>Chào mừng bạn quay trở lại!</p>
  </div>
  <div class="card-body p-4">
    <?php if (!empty($error)): ?>
      <div class="alert alert-danger py-2" style="font-size: 14px;">
        <i class="fa fa-exclamation-circle mr-2"></i> <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= $base ?>/admin/login">
      <input type="hidden" name="_csrf" value="<?= htmlspecialchars($csrf) ?>">
      
      <div class="form-group mb-3">
        <label class="form-label font-weight-bold">Địa chỉ Email</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text bg-white"><i class="fa fa-envelope text-muted"></i></span>
            </div>
            <input type="email" class="form-control border-left-0" name="email" required placeholder="name@example.com" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        </div>
      </div>

      <div class="form-group mb-4">
        <label class="form-label font-weight-bold">Mật khẩu</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text bg-white"><i class="fa fa-lock text-muted"></i></span>
            </div>
            <input type="password" class="form-control border-left-0" name="password" required placeholder="********">
        </div>
      </div>

      <div class="mb-3 d-flex justify-content-between align-items-center">
          <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="rememberMe">
              <label class="custom-control-label text-muted" for="rememberMe" style="font-size: 13px;">Ghi nhớ đăng nhập</label>
          </div>
          <a href="#" class="text-primary" style="font-size: 13px;">Quên mật khẩu?</a>
      </div>

      <button type="submit" class="btn btn-primary w-100 shadow-sm">
          ĐĂNG NHẬP <i class="fa fa-sign-in ml-2"></i>
      </button>
    </form>
  </div>
  <div class="card-footer bg-white text-center py-3 border-0">
      <p class="mb-0 text-muted" style="font-size: 13px;">&copy; 2026 Sleek Admin Terminal</p>
  </div>
</div>