<div class="row justify-content-center">
  <div class="col-md-5">
    <div class="card">
      <div class="card-body">
        <h4 class="mb-3">Admin Login</h4>

        <?php if (!empty($error)): ?>
          <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="post" action="/admin/login">
          <input type="hidden" name="_csrf" value="<?= htmlspecialchars($csrf) ?>">
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input class="form-control" name="email" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Mật khẩu</label>
            <input class="form-control" type="password" name="password" required>
          </div>
          <button class="btn btn-primary w-100">Đăng nhập</button>
        </form>
      </div>
    </div>
  </div>
</div>
