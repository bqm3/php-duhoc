<?php if (!isset($base))
  $base = $GLOBALS['base'] ?? ''; ?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta name="description" content="Trang không tìm thấy">
  <meta name="author" content="VNPC">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" href="<?= $base ?>/public/assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600;700;800&family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

  <title>404 - Không tìm thấy trang | VNPC</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
        font-family: 'Be Vietnam Pro', 'Inter', sans-serif;
      background: linear-gradient(135deg, #f0f4f8 0%, #e2e8f0 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .error-container {
      text-align: center;
      max-width: 520px;
      width: 100%;
      padding: 50px 30px;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
    }

    .error-code {
      font-size: 120px;
      font-weight: 800;
      background: linear-gradient(135deg, #1e60a3, #2777C4, #FE543D);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      line-height: 1;
      margin-bottom: 10px;
    }

    .error-icon {
      font-size: 48px;
      color: #FE543D;
      margin-bottom: 16px;
      animation: bounce 2s infinite;
    }

    @keyframes bounce {

      0%,
      100% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(-10px);
      }
    }

    .error-title {
      font-size: 22px;
      font-weight: 700;
      color: #0E2A46;
      margin-bottom: 10px;
    }

    .error-desc {
      font-size: 15px;
      color: #6b7280;
      margin-bottom: 32px;
      line-height: 1.6;
    }

    .error-buttons {
      display: flex;
      gap: 12px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .btn-back,
    .btn-home {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 12px 28px;
      border-radius: 50px;
      font-size: 15px;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
    }

    .btn-back {
      background: #f1f5f9;
      color: #334155;
      border: 1px solid #e2e8f0;
    }

    .btn-back:hover {
      background: #e2e8f0;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .btn-home {
      background: linear-gradient(135deg, #1e60a3, #2777C4);
      color: #fff;
    }

    .btn-home:hover {
      background: linear-gradient(135deg, #174d85, #1e60a3);
      transform: translateY(-2px);
      box-shadow: 0 4px 16px rgba(39, 119, 196, 0.35);
      color: #fff;
    }

    .error-footer {
      margin-top: 40px;
      font-size: 13px;
      color: #9ca3af;
    }

    .error-footer strong {
      color: #2777C4;
    }

    /* Mobile responsive */
    @media (max-width: 576px) {
      .error-container {
        padding: 36px 20px;
        border-radius: 16px;
      }

      .error-code {
        font-size: 80px;
      }

      .error-icon {
        font-size: 36px;
      }

      .error-title {
        font-size: 18px;
      }

      .error-desc {
        font-size: 14px;
        margin-bottom: 24px;
      }

      .btn-back,
      .btn-home {
        padding: 11px 22px;
        font-size: 14px;
        width: 100%;
        justify-content: center;
      }

      .error-buttons {
        flex-direction: column;
      }
    }
  </style>
</head>

<body>

  <div class="error-container">
    <div class="error-icon">
      <i class="fa-solid fa-triangle-exclamation"></i>
    </div>
    <div class="error-code">404</div>
    <h1 class="error-title">Trang không tìm thấy</h1>
    <p class="error-desc">
      Xin lỗi, trang bạn đang tìm kiếm không tồn tại hoặc đã được di chuyển.
      Vui lòng quay lại hoặc về trang chủ.
    </p>

    <div class="error-buttons">
      <button class="btn-back" onclick="history.back();">
        <i class="fa-solid fa-arrow-left"></i> Quay lại
      </button>
      <a href="<?= $base ?>/" class="btn-home">
        <i class="fa-solid fa-house"></i> Trang chủ
      </a>
    </div>

    <div class="error-footer">
      &copy; 2026 <strong>VNPC</strong> — Tư vấn du học uy tín
    </div>
  </div>

</body>

</html>