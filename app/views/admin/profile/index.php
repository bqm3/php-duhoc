<!-- app/views/admin/profile/index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Thông tin cá nhân</title>

    <link rel="stylesheet" href="<?= $base ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/quicksand.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/fontawesome.css">
</head>

<body>
    <div class="container-fluid">
        <?php include __DIR__ . '/../../admin/header.php'; ?>

        <div class="row main-content">
            <?php include __DIR__ . '/../../admin/sidebar.php'; ?>

            <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
                <div class="mb-3">
                    <h5 class="mb-0"><strong>Thông tin cá nhân</strong></h5>
                    <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Profile</span>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="mt-1 mb-3 p-4 button-container bg-white border shadow-sm">
                            <?php if (isset($_SESSION['flash_success'])): ?>
                                <div class="alert alert-success">
                                    <?= $_SESSION['flash_success'];
                                    unset($_SESSION['flash_success']); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['flash_error'])): ?>
                                <div class="alert alert-danger">
                                    <?= $_SESSION['flash_error'];
                                    unset($_SESSION['flash_error']); ?>
                                </div>
                            <?php endif; ?>

                            <div class="row">
                                <div class="col-md-3 text-center mb-4">
                                    <h2 class="mb-3 text-primary"><i class="fa fa-user-circle fa-4x"></i></h2>
                                    <h5>
                                        <?= htmlspecialchars($user['full_name']) ?>
                                    </h5>
                                    <p class="badge badge-white">
                                        <?= ucfirst($user['role']) ?>
                                    </p>
                                </div>
                                <div class="col-md-9 border-left">
                                    <form action="<?= $base ?>/admin/profile" method="POST">
                                        <input type="hidden" name="_csrf" value="<?= $csrf ?>">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email (Không thể thay đổi)</label>
                                                    <input type="email" class="form-control"
                                                        value="<?= htmlspecialchars($user['email']) ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Họ tên <span class="text-danger">*</span></label>
                                                    <input type="text" name="full_name" class="form-control" required
                                                        value="<?= htmlspecialchars($user['full_name']) ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Số điện thoại</label>
                                                    <input type="text" name="phone" class="form-control"
                                                        value="<?= htmlspecialchars($user['phone']) ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Ngày sinh</label>
                                                    <input type="date" name="birth_date" class="form-control"
                                                        value="<?= htmlspecialchars($user['birth_date'] ?? '') ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Giới tính</label>
                                                    <select name="gender" class="form-control">
                                                        <option value="male" <?= $user['gender'] == 'male' ? 'selected' : '' ?>>Nam</option>
                                                        <option value="female" <?= $user['gender'] == 'female' ? 'selected' : '' ?>>Nữ</option>
                                                        <option value="other" <?= $user['gender'] == 'other' ? 'selected' : '' ?>>Khác</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mật khẩu mới (Để trống nếu không muốn thay đổi)</label>
                                                    <input type="password" name="password" class="form-control"
                                                        minlength="6" placeholder="******">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <button type="submit" class="btn btn-primary px-4">Lưu thay đổi</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= $base ?>/assets/js/jquery.min.js"></script>
    <script src="<?= $base ?>/assets/js/popper.min.js"></script>
    <script src="<?= $base ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= $base ?>/assets/js/custom.js"></script>
</body>

</html>