<!-- app/views/admin/users/edit.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Posts Management</title>

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
                    <h5 class="mb-0"><strong>Chỉnh sửa người dùng</strong></h5>
                    <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Users <i
                            class="fa fa-angle-right"></i> Edit</span>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <?php if (isset($_GET['error']) && $_GET['error'] == 'password_too_short'): ?>
                                <div class="alert alert-danger">Mật khẩu mới phải có ít nhất 6 ký tự.</div>
                            <?php endif; ?>

                            <form action="<?= $base ?>/admin/users/<?= $user['id'] ?>" method="POST">
                                <input type="hidden" name="_csrf" value="<?= $csrf ?>">
                                <input type="hidden" name="redirect_to"
                                    value="<?= htmlspecialchars($redirect_to ?? '') ?>">

                                <div class="form-group">
                                    <label>Email (Không thể thay đổi)</label>
                                    <input type="email" class="form-control"
                                        value="<?= htmlspecialchars($user['email']) ?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Họ tên <span class="text-danger">*</span></label>
                                    <input type="text" name="full_name" class="form-control" required
                                        value="<?= htmlspecialchars($user['full_name']) ?>">
                                </div>

                                <div class="form-group">

                                    <label>Số điện thoại</label>

                                    <input type="text" name="phone" class="form-control"
                                        value="<?= htmlspecialchars($user['phone']) ?>">

                                </div>



                                <div class="form-group">

                                    <label>Giới tính</label>

                                    <select name="gender" class="form-control">

                                        <!-- <option value="other" <?= $user['gender'] == 'other' ? 'selected' : '' ?>>Khác
                                        </option> -->

                                        <option value="male" <?= $user['gender'] == 'male' ? 'selected' : '' ?>>Nam
                                        </option>

                                        <option value="female" <?= $user['gender'] == 'female' ? 'selected' : '' ?>>Nữ
                                        </option>

                                    </select>

                                </div>



                                <div class="form-group">

                                    <label>Ngày sinh</label>

                                    <input type="date" name="birth_date" class="form-control"
                                        value="<?= htmlspecialchars($user['birth_date'] ?? '') ?>">

                                </div>



                                <div class="form-group">

                                    <label>Mật khẩu mới (Để trống nếu không muốn thay đổi)</label>
                                    <input type="password" name="password" class="form-control" minlength="6"
                                        placeholder="******">
                                </div>

                                <div class="form-group">
                                    <label>Vai trò</label>
                                    <select name="role" class="form-control">
                                        <option value="staff" <?= $user['role'] == 'staff' ? 'selected' : '' ?>>Staff
                                        </option>
                                        <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin
                                        </option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                <a href="<?= $base ?>/admin/users" class="btn btn-secondary">Hủy</a>
                            </form>
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