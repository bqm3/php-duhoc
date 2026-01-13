<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $base ?>/php-duhoc/public/assets/css/app.css" rel="stylesheet">
</head>

<body>
    <!-- <nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="<?= $base ?: '/' ?>">MySite</a>
    <a class="btn btn-outline-primary" href="<?= $base ?>/admin/login">Admin</a>
  </div>
</nav> -->
    <div
        style="width: 100%; flex-direction: column; justify-content: flex-start; align-items: flex-start; display: inline-flex">
        <div
            style="align-self: stretch; padding-left: 320px; padding-right: 320px; padding-top: 12px; padding-bottom: 12px; background: #2777C4; justify-content: space-between; align-items: center; display: inline-flex">
            <div style="justify-content: flex-start; align-items: center; gap: 24px; display: flex">
                <div style="justify-content: flex-start; align-items: center; gap: 6px; display: flex">
                    <img src="<?= $base ?>/assets/svgs/clients/ic_clock.svg" alt="Clock icon"
                        style="width: 20px; height: 20px;" />
                    <div
                        style="justify-content: center; display: flex; flex-direction: column; color: white; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 17px; word-wrap: break-word">
                        Thứ 2 - Thứ 7 / 8:30 - 17:30</div>
                </div>
                <div style="justify-content: flex-start; align-items: center; gap: 6px; display: flex">
                    <img src="<?= $base ?>/assets/svgs/clients/ic_location.svg" alt="Clock icon"
                        style="width: 20px; height: 20px;" />
                    <div
                        style="justify-content: center; display: flex; flex-direction: column; color: white; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 17px; word-wrap: break-word">
                        Nhập địa chỉ</div>
                </div>
            </div>
            <div style="justify-content: flex-start; align-items: center; gap: 12px; display: flex">
                <div style="justify-content: flex-start; align-items: center; gap: 4px; display: flex">
                    <img src="<?= $base ?>/assets/svgs/clients/ic_person.svg" style="width: 20px; height: 20px;" />
                    <div
                        style="justify-content: center; display: flex; flex-direction: column; color: white; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 20px; word-wrap: break-word">
                        Đăng nhập/Đăng ký</div>
                </div>
                <div style="width: 1px; height: 24px; background: rgba(255, 255, 255, 0.20)"></div>
                <div style="justify-content: flex-start; align-items: center; gap: 8px; display: flex">
                    <img src="<?= $base ?>/assets/svgs/clients/ic_instagram.svg" style="width: 20px; height: 20px;" />
                    <img src="<?= $base ?>/assets/svgs/clients/ic_facebook.svg" style="width: 20px; height: 20px;" />
                    <img src="<?= $base ?>/assets/svgs/clients/ic_linkedin.svg" style="width: 20px; height: 20px;" />
                    <img src="<?= $base ?>/assets/svgs/clients/ic_youtube.svg" style="width: 20px; height: 20px;" />
                </div>
            </div>
        </div>
        <div
            style="align-self: stretch; padding-left: 320px; padding-right: 320px; padding-top: 20px; padding-bottom: 20px; background: linear-gradient(0deg, white 0%, white 100%), #111827; justify-content: space-between; align-items: center; display: inline-flex">
            <img style="width: 47px; height: 32px" src="<?= $base ?>/assets/svgs/clients/ic_traidat.svg" />
            <div style="justify-content: flex-start; align-items: center; gap: 24px; display: flex">
                <div
                    style="color: #2777C4; font-size: 18px; font-family: Inter; font-weight: 600; text-transform: capitalize; line-height: 30px; word-wrap: break-word">
                    Trang Chủ</div>
                <div
                    style="color: black; font-size: 18px; font-family: Inter; font-weight: 400; text-transform: capitalize; line-height: 30px; word-wrap: break-word">
                    Giới Thiệu</div>
                <div
                    style="color: black; font-size: 18px; font-family: Inter; font-weight: 400; text-transform: capitalize; line-height: 30px; word-wrap: break-word">
                    Tin Tức & Sự kiện</div>
                <div
                    style="color: black; font-size: 18px; font-family: Inter; font-weight: 400; text-transform: capitalize; line-height: 30px; word-wrap: break-word">
                    Du Học</div>
                <div
                    style="color: black; font-size: 18px; font-family: Inter; font-weight: 400; text-transform: capitalize; line-height: 30px; word-wrap: break-word">
                    Học bổng du học</div>
                <div
                    style="color: black; font-size: 18px; font-family: Inter; font-weight: 400; text-transform: capitalize; line-height: 30px; word-wrap: break-word">
                    Visa du học</div>
                <div
                    style="color: black; font-size: 18px; font-family: Inter; font-weight: 400; text-transform: capitalize; line-height: 30px; word-wrap: break-word">
                    Tìm trường</div>
                <div
                    style="color: black; font-size: 18px; font-family: Inter; font-weight: 400; text-transform: capitalize; line-height: 30px; word-wrap: break-word">
                    Tuyển Dụng </div>
                <div
                    style="color: black; font-size: 18px; font-family: Inter; font-weight: 400; text-transform: capitalize; line-height: 30px; word-wrap: break-word">
                    Liên hệ</div>
            </div>
        </div>
    </div>
    <?php include $viewFile; ?>
    <div
        style="width: 100%; display: flex; flex-direction: column; align-items: center; gap: 30px; margin-top: 40px; margin-bottom: 60px;">
        <div style="text-align: center; max-width: 800px; padding: 0 20px;">
            <div
                style="color: #0E2A46; font-size: 32px; font-family: Inter; font-weight: 700; text-transform: capitalize; line-height: 40px;">
                Đối tác tiêu biểu
            </div>
            <div
                style="color: #0E2A46; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px; margin-top: 12px;">
                Danh sách các trường đại học uy tín trải rộng tại các quốc gia như Mỹ, Úc, Canada, Anh, châu Âu, Nhật
                Bản, Hàn Quốc và nhiều quốc gia khác.
            </div>
        </div>

        <div
            style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap; gap: 40px; width: 100%; max-width: 1280px;">
            <img style="height: 60px; object-fit: contain;" src="<?= $base ?>/assets/img/client/img_main1.png"
                alt="Partner 1" />
            <img style="height: 60px; object-fit: contain;" src="<?= $base ?>/assets/img/client/img_main2.png"
                alt="Partner 2" />
            <img style="height: 60px; object-fit: contain;" src="<?= $base ?>/assets/img/client/img_main3.png"
                alt="Partner 3" />
            <img style="height: 60px; object-fit: contain;" src="<?= $base ?>/assets/img/client/img_main4.png"
                alt="Partner 4" />
            <img style="height: 60px; object-fit: contain;" src="<?= $base ?>/assets/img/client/img_main5.png"
                alt="Partner 5" />
            <img style="height: 60px; object-fit: contain;" src="<?= $base ?>/assets/img/client/img_main6.png"
                alt="Partner 6" />
        </div>
    </div>

    <div
        style="position: relative; z-index: 10; width: 100%; display: flex; justify-content: center; margin-bottom: -100px;">
        <div style="
            width: 90%; 
            max-width: 1000px; 
            background-color: #FC6441; 
            /* Nếu có ảnh nền cam vân vân như mẫu thì dùng dòng dưới, nếu không dùng màu trơn */
            background-image: url(<?= $base ?>/assets/img/client/img_main7.png); 
            background-size: cover;
            border-radius: 100px; 
            padding: 40px 20px; 
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
        ">
            <h2 style="color: white; font-size: 32px; font-family: Inter; font-weight: 700; margin-bottom: 8px;">
                Đăng Ký Nhận Thông Tin
            </h2>
            <p style="color: white; font-size: 16px; font-family: Inter; font-weight: 500; margin-bottom: 30px;">
                Nhập E-mail để đăng ký nhận thông tin học bổng du học mới nhất từ chúng tôi.
            </p>

            <form action="" method="POST"
                style="display: flex; justify-content: center; align-items: center; gap: 12px; flex-wrap: wrap;">
                <input type="email" placeholder="Nhập E-mail của bạn" required style="
                        width: 450px; 
                        max-width: 100%;
                        height: 50px; 
                        border-radius: 30px; 
                        border: 1px solid rgba(120, 120, 120, 0.20); 
                        padding: 0 24px; 
                        font-size: 16px; 
                        outline: none;
                    ">
                <button type="submit" style="
                        height: 50px; 
                        padding: 0 40px; 
                        background: #2777C4; /* Màu xanh giống ảnh */
                        color: white; 
                        border-radius: 30px; 
                        border: none; 
                        font-size: 16px; 
                        font-weight: 600; 
                        cursor: pointer;
                        transition: background 0.3s;
                    " onmouseover="this.style.background='#1b5ea8'" onmouseout="this.style.background='#2777C4'">
                    Đăng Ký
                </button>
            </form>
        </div>
    </div>

    <div
        style="width: 100%; background: #0C4073; color: white; padding-top: 140px; padding-bottom: 40px; position: relative;">
        <div
            style="max-width: 1280px; margin: 0 auto; padding: 0 20px; display: flex; flex-wrap: wrap; justify-content: space-between; gap: 40px;">

            <div style="flex: 1; min-width: 250px;">
                <h4 style="font-size: 20px; font-weight: 600; margin-bottom: 20px;">Văn Phòng Tư Vấn Du Học</h4>

                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                    <img style="width: 20px;" src="<?= $base ?>/assets/svgs/clients/ic_phone_white.svg"
                        onerror="this.style.display='none'" />
                    <span>0979 111 222 | 0902 888 999</span>
                </div>

                <div style="margin-bottom: 15px;">
                    <strong style="display:block; margin-bottom:5px;">Văn Phòng Tại Hà Nội</strong>
                    <div style="display: flex; gap: 10px;">
                        <img style="width: 16px; height: 20px;"
                            src="<?= $base ?>/assets/svgs/clients/ic_location_white.svg"
                            onerror="this.style.display='none'" />
                        <span style="font-size: 14px; opacity: 0.9;">Số 85 Vũ Tông Phan, Phường Khương Trung, Quận Thanh
                            Xuân, Hà Nội</span>
                    </div>
                </div>

                <div>
                    <strong style="display:block; margin-bottom:5px;">Văn Phòng Tại TPHCM</strong>
                    <div style="display: flex; gap: 10px;">
                        <img style="width: 16px; height: 20px;"
                            src="<?= $base ?>/assets/svgs/clients/ic_location_white.svg"
                            onerror="this.style.display='none'" />
                        <span style="font-size: 14px; opacity: 0.9;">Số 454 Nguyễn Thị Minh Khai, Phường 5, Quận 3, TP
                            HCM</span>
                    </div>
                </div>
            </div>

            <div style="flex: 0 0 150px;">
                <h4 style="font-size: 20px; font-weight: 600; margin-bottom: 20px;">Nổi bật</h4>
                <div style="display: flex; flex-direction: column; gap: 10px; font-size: 15px; opacity: 0.9;">
                    <a href="#" style="color: white; text-decoration: none;">Du học Úc</a>
                    <a href="#" style="color: white; text-decoration: none;">Du học Canada</a>
                    <a href="#" style="color: white; text-decoration: none;">Du học Thụy Sĩ</a>
                    <a href="#" style="color: white; text-decoration: none;">Du học Mỹ</a>
                </div>
            </div>

            <div style="flex: 0 0 180px;">
                <h4 style="font-size: 20px; font-weight: 600; margin-bottom: 20px;">Học bổng</h4>
                <div style="display: flex; flex-direction: column; gap: 10px; font-size: 15px; opacity: 0.9;">
                    <a href="#" style="color: white; text-decoration: none;">Học bổng Úc</a>
                    <a href="#" style="color: white; text-decoration: none;">Học bổng Canada</a>
                    <a href="#" style="color: white; text-decoration: none;">Học bổng Thụy Sĩ</a>
                    <a href="#" style="color: white; text-decoration: none;">Học bổng New Zealand</a>
                </div>
            </div>

            <div style="flex: 1; min-width: 250px;">
                <h4 style="font-size: 20px; font-weight: 600; margin-bottom: 20px;">Bản đồ</h4>
                <div
                    style="background: #ccc; width: 100%; height: 150px; border-radius: 8px; overflow: hidden; margin-bottom: 20px;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.344777231509!2d105.80651331153805!3d21.01888628803555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab66e64391b5%3A0xbab8be00cf4f44b7!2zNTcgSHXhu7NuaCBUaMO6YyBLaMOhbmcsIEzDoW5nIEjhuqEsIMSQ4buRbmcgxJBhLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1768300180245!5m2!1svi!2s"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <h5 style="font-size: 16px; margin-bottom: 10px;">Kết nối với chúng tôi</h5>
                <div style="display: flex; gap: 12px;">
                    <div
                        style="width: 36px; height: 36px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                        <span style="font-family: sans-serif;">f</span>
                    </div>
                    <div
                        style="width: 36px; height: 36px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                        <span style="font-family: sans-serif;">in</span>
                    </div>
                    <div
                        style="width: 36px; height: 36px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                        <span style="font-family: sans-serif;">yt</span>
                    </div>
                </div>
            </div>
        </div>

        <div
            style="border-top: 1px solid rgba(255,255,255,0.1); margin-top: 40px; padding-top: 20px; text-align: center; font-size: 14px; opacity: 0.7;">
            © 2025 Bản quyền thuộc về
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $base ?>/php-duhoc/public/assets/js/app.js"></script>
</body>

</html>