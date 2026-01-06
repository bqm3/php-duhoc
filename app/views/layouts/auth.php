<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng nhập hệ thống</title>
  <link href="<?= $base ?>/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= $base ?>/assets/css/fontawesome.css" rel="stylesheet">
  <link href="<?= $base ?>/assets/css/quicksand.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Quicksand', sans-serif;
      background-color: #f4f7f6;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }
    .login-container {
      width: 100%;
      max-width: 400px;
      padding: 15px;
    }
    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    .card-header {
      background: #002147;
      color: #fff;
      text-align: center;
      padding: 25px;
      border-radius: 10px 10px 0 0 !important;
      border: none;
    }
    .card-header h3 {
      margin: 0;
      font-weight: 700;
      font-size: 24px;
    }
    .card-header p {
      margin: 5px 0 0;
      opacity: 0.8;
      font-size: 14px;
    }
    .btn-primary {
      background-color: #002147;
      border-color: #002147;
      padding: 12px;
      font-weight: 600;
      transition: all 0.3s;
    }
    .btn-primary:hover {
      background-color: #00152e;
      transform: translateY(-2px);
    }
    .form-control {
      padding: 12px;
      border-radius: 5px;
      border: 1px solid #ddd;
    }
    .form-control:focus {
      box-shadow: none;
      border-color: #002147;
    }
    .logo-icon {
      font-size: 40px;
      margin-bottom: 10px;
      display: block;
    }
  </style>
</head>
<body>

<div class="login-container">
  <?php include $viewFile; ?>
</div>

</body>
</html>
