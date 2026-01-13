<?php
// =========================================================================
// 1. DATA & CONFIGURATION
// =========================================================================

// Giả lập biến $base nếu chưa có (để tránh lỗi khi chạy độc lập)
if (!isset($base)) $base = ''; 

// Dữ liệu danh sách các nước (Chia theo nhóm để khớp với Grid Layout cũ)
$country_groups = [
    'row1' => [ // Grid 2-1
        ['name' => 'Canada', 'img' => 'dh_canada.png', 'height' => '308px'],
        ['name' => 'Mỹ', 'img' => 'dh_my.png', 'height' => '308px'],
    ],
    'row2' => [ // Grid 1-1-1
        ['name' => 'New Zealand', 'img' => 'dh_new_zealand.png', 'height' => '308px'],
        ['name' => 'Úc', 'img' => 'dh_uc.png', 'height' => '308px'],
        ['name' => 'Đức', 'img' => 'dh_duc.png', 'height' => '308px'],
    ],
    'row3' => [ // Grid 1-2 (Đảo ngược logic tên class cũ nhưng giữ layout)
        ['name' => 'Phần Lan', 'img' => 'dh_phan_lan.png', 'height' => '308px'],
        ['name' => 'Hà Lan', 'img' => 'dh_ha_lan.png', 'height' => '308px'],
    ],
    'row4' => [ // Grid 1-1-1
        ['name' => 'Singapore', 'img' => 'dh_singapore.png', 'height' => '308px'],
        ['name' => 'Anh', 'img' => 'dh_anh.png', 'height' => '308px'],
        ['name' => 'Tây Ban Nha', 'img' => 'dh_tay_ban_nha.png', 'height' => '308px'],
    ],
    'row5' => [ // Grid 2-1-no-margin
        ['name' => 'Hàn Quốc', 'img' => 'dh_han_quoc.png', 'height' => '308px'],
        ['name' => 'Thụy Sĩ', 'img' => 'dh_thuy_si.png', 'height' => '308px'],
    ]
];

// Dữ liệu "Tại sao chọn chúng tôi"
$benefits = [
    ['title' => 'Kinh Nghiệm', 'desc' => 'Gần 20 năm kinh nghiệm trong lĩnh vực du học, đối tác đáng tin cậy của 1.000 + trường trên thế giới.', 'top' => '291.53px', 'left' => '320px'],
    ['title' => 'Tư vấn 24/7', 'desc' => 'Đội ngũ chuyên viên tư vấn chuyên môn cao, xây dựng lộ trình giáo dục tốt nhất, tận tình giải đáp 24/7', 'top' => '443.53px', 'left' => '320px'],
    ['title' => 'Đào tạo Chuyên Sâu', 'desc' => 'Đào tạo ngoại ngữ, kiểm tra trình độ miễn phí, luyện thi chứng chỉ tiếng Anh đạt chuẩn đầu vào', 'top' => '595.53px', 'left' => '320px'],
    ['title' => 'Chuyên Nghiệp, Minh Bạch', 'desc' => 'Quy trình làm việc minh bạch, luôn tôn trọng và đặt lợi ích của khách hàng lên hàng đầu.', 'top' => '291.53px', 'left' => '646px'],
    ['title' => 'Hướng dẫn nhiệt Tình', 'desc' => 'Hướng dẫn làm hồ sơ chứng minh tài chính, xin visa với tỷ lệ đạt cao, săn học bổng giá trị lên đến 100%', 'top' => '443.53px', 'left' => '646px'],
    ['title' => 'Luôn Kết Nối', 'desc' => 'Giữ kết nối, chăm sóc và hỗ trợ học sinh trước khi bay, trong khi bay và sau khi bay', 'top' => '595.53px', 'left' => '646px'],
];

// Dữ liệu Quy trình 6 bước (Toạ độ Absolute giữ nguyên từ bản gốc)
$steps = [
    ['num' => '01', 'title' => 'Đăng ký<br />thông tin cơ bản', 'desc' => 'Điền thông tin cá nhân, tài chính, nguyện vọng và khả năng ngoại ngữ.', 'left_card' => '321px', 'left_circle' => '377px', 'left_icon' => '380px', 'left_num' => '404px', 'left_title' => '342px', 'left_desc' => '333px'],
    ['num' => '02', 'title' => 'Đăng ký mã<br />hồ sơ', 'desc' => 'Đăng ký mã hồ sơ du học để có tên trên hệ thống và nhận hỗ trợ.', 'left_card' => '538px', 'left_circle' => '594px', 'left_icon' => '597px', 'left_num' => '619px', 'left_title' => '577px', 'left_desc' => '550px'],
    ['num' => '03', 'title' => 'Tư vấn<br />chuyên sâu', 'desc' => 'Đánh giá hồ sơ, tư vấn trường, ngành, xin thư mời nhập học, xin học bổng.', 'left_card' => '755px', 'left_circle' => '811px', 'left_icon' => '814px', 'left_num' => '836px', 'left_title' => '796px', 'left_desc' => '767px'],
    ['num' => '04', 'title' => 'Xin Visa', 'desc' => 'Hoàn thiện hồ sơ, luyện phỏng vấn xin visa, học bổng và hướng dẫn đóng phí.', 'left_card' => '972px', 'left_circle' => '1028px', 'left_icon' => '1031px', 'left_num' => '1053px', 'left_title' => '1033px', 'left_desc' => '984px'],
    ['num' => '05', 'title' => 'Nhận Visa', 'desc' => 'Hướng dẫn trước bay, thanh lý hợp đồng du học, nhận visa và chụp ảnh lưu niệm.', 'left_card' => '1189px', 'left_circle' => '1245px', 'left_icon' => '1248px', 'left_num' => '1270px', 'left_title' => '1236px', 'left_desc' => '1201px'],
    ['num' => '06', 'title' => 'Hỗ trợ<br />quá trình học', 'desc' => 'Điền thông tin cá nhân, tài chính, nguyện vọng và khả năng ngoại ngữ.', 'left_card' => '1406px', 'left_circle' => '1462px', 'left_icon' => '1465px', 'left_num' => '1487px', 'left_title' => '1439px', 'left_desc' => '1418px'],
];
?>

<style>
    /* CSS Variables để đồng bộ màu sắc */
    :root {
        --c-primary: #0E2A46;
        --c-secondary: #2777C4;
        --c-accent: #FE543D;
        --c-text: #4D5756;
        --c-bg-light: #E6E9FC;
        --font-inter: 'Inter', sans-serif;
    }

    /* Helper Classes */
    .pos-abs { position: absolute; }
    .w-full { width: 100%; }
    .h-full { height: 100%; }
    .img-cover { object-fit: cover; }
    .flex-center { display: flex; justify-content: center; align-items: center; }
    .flex-col { display: flex; flex-direction: column; }
    .text-justify { text-align: justify; }
    .word-break { word-wrap: break-word; }

    /* Grid Layouts (Giữ nguyên class cũ) */
    .grid-container { max-width: 1290px; margin: 40px auto; padding: 0 20px; }
    .grid-2-1 { display: grid; grid-template-columns: 2fr 1fr; gap: 24px; margin-bottom: 24px; }
    .grid-1-1-1 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 24px; margin-bottom: 24px; }
    .grid-1-2 { display: grid; grid-template-columns: 1fr 2fr; gap: 24px; margin-bottom: 24px; }
    .grid-2-1-no-margin { display: grid; grid-template-columns: 2fr 1fr; gap: 24px; }

    @media (max-width: 768px) {
        .grid-2-1, .grid-1-1-1, .grid-1-2, .grid-2-1-no-margin { grid-template-columns: 1fr !important; }
    }

    /* Component: Country Card */
    .country-card {
        position: relative; border-radius: 8px; overflow: hidden;
    }
    .country-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%);
    }
    .country-text {
        left: 30px; top: 20px; position: absolute; color: white; 
        font-size: 24px; font-family: var(--font-inter); font-weight: 600; line-height: 40px;
    }

    /* Component: Benefit Card (Tại sao chọn chúng tôi) */
    .benefit-card {
        display: flex; flex-direction: column; align-items: flex-start;
        padding: 12px; gap: 8px; position: absolute; width: 302px; height: 128px;
        background: var(--c-bg-light); border-radius: 12px;
    }
    .benefit-title {
        color: var(--c-primary); font-size: 16px; font-family: var(--font-inter); 
        font-weight: 600; text-transform: capitalize; line-height: 24px;
    }
    .benefit-desc {
        color: var(--c-text); font-size: 16px; font-family: var(--font-inter); 
        font-weight: 400; line-height: 24px;
    }

    /* Component: Stats Item (Blue section) */
    .stat-circle-outer {
        width: 90px; height: 90px; position: relative; background: white; border-radius: 45px;
    }
    .stat-circle-inner {
        width: 108px; height: 108px; left: -9px; top: -9px; position: absolute; 
        border-radius: 54px; border: 1px white solid;
    }
    .stat-text {
        text-align: center; justify-content: center; display: flex; flex-direction: column; 
        color: white; font-size: 24px; font-family: var(--font-inter); 
        font-weight: 600; text-transform: capitalize; line-height: 36px;
    }

    /* Form Styles */
    .form-box {
        width: 478px; padding: 24px 20px; left: 1122px; top: 170.11px; 
        position: absolute; background: white; border-radius: 16px; 
        gap: 32px; display: inline-flex;
    }
    .input-wrapper {
        align-self: stretch; padding: 12.50px 12px; background: white; 
        border-radius: 5px; outline: 1px #D4D4D4 solid; display: inline-flex;
    }
    .input-field {
        border: none; outline: none; width: 100%; font-size: 16px; font-family: var(--font-inter);
    }
    .btn-submit {
        align-self: stretch; padding: 12px; background: #1B99D4; border-radius: 8px; 
        justify-content: center; align-items: center; gap: 8px; display: inline-flex; 
        border: none; cursor: pointer; color: white; font-weight: 600; font-family: var(--font-inter);
    }
</style>

<div class="pos-abs" style="width: 100%; height: 750px; overflow: hidden; background-image: url(<?= $base ?>/assets/img/client/img_banner.png)">
    <div style="padding: 12px 20px; left: 506px; top: 565px; position: absolute; background: var(--c-accent); box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25); border-radius: 30px; display: inline-flex; gap: 10px;">
        <div style="color: white; font-size: 20px; font-family: var(--font-inter); font-weight: 500;">Đăng ký du học ngay</div>
    </div>
    
    <div style="width: 741px; left: 320px; top: 149px; position: absolute; color: #17254E; font-size: 54px; font-family: Sora; font-weight: 600; text-transform: capitalize; line-height: 80px;">
        tư vấn miễn phí,<br />cơ hội du học các trường hàng đầu thế giới
    </div>
    
    <div style="left: 320px; top: 391.50px; position: absolute; color: #333931; font-size: 24px; font-family: var(--font-inter); font-weight: 500; line-height: 32px;">
        Nhận học bổng, nhiều chương trình khác
    </div>

    <div style="width: 610px; height: 60px; left: 320px; top: 457px; position: absolute; background: white; border-radius: 40px">
        <div style="left: 20px; top: 21px; position: absolute; color: var(--c-text); font-size: 16px; font-family: var(--font-inter); font-weight: 400;">
            Nhập tên trường, thành phố bạn muốn đến
        </div>
    </div>
    <div style="width: 100px; height: 60px; left: 830px; top: 457px; position: absolute; background: var(--c-secondary); border-radius: 29px">
        <img src="<?= $base ?>/assets/svgs/clients/ic_search.svg" style="width: 20px; height: 20px; left: 40px; top: 20px; position: absolute" />
    </div>

    <img src="<?= $base ?>/assets/img/client/img_home6.png" style="width: 28px; left: 1716.75px; top: 88.06px; position: absolute" />
    <img src="<?= $base ?>/assets/img/client/img_home7.png" style="width: 15px; left: 1074.88px; top: 248.48px; position: absolute" />
    <img src="<?= $base ?>/assets/img/client/img_home7.png" style="width: 15px; left: 1636.61px; top: 648.64px; position: absolute" />
    
    <img src="<?= $base ?>/assets/img/client/img_home4.png" style="width: 327px; height: 593px; left: 1350px; top: 63px; position: absolute; border-radius: 100px" />
    <img src="<?= $base ?>/assets/img/client/img_home2.png" style="width: 327px; height: 592px; left: 1357px; top: 56px; position: absolute; border-radius: 100px" />
    <img src="<?= $base ?>/assets/img/client/img_home5.png" style="width: 236px; height: 429px; left: 1080.83px; top: 276.11px; position: absolute; border-radius: 100px" />
    <img src="<?= $base ?>/assets/img/client/img_home3.png" style="width: 237px; height: 429px; left: 1087.83px; top: 269.11px; position: absolute; border-radius: 100px" />

    <div style="width: 339.20px; height: 94px; left: 1068.39px; top: 103.36px; position: absolute; background: white; box-shadow: 0px 0px 20px rgba(2, 52, 117, 0.15); border-radius: 1000px">
        <div style="left: 35.61px; top: 15.64px; position: absolute; display: flex; flex-direction: column">
            <span style="color: #704FE6; font-size: 24px; font-family: var(--font-inter); font-weight: 600;">+5.000<br /></span>
            <span style="color: #17254E; font-size: 20px; font-family: var(--font-inter);">VISA du học</span>
        </div>
        <img src="<?= $base ?>/assets/img/client/img_home1.png" style="width: 136px; height: 40px; left: 172.20px; top: 26.64px; position: absolute" />
    </div>

    <div style="width: 238.91px; height: 100px; left: 1574.69px; top: 527.48px; position: absolute; background: white; box-shadow: 0px 0px 20px rgba(19, 39, 66, 0.15); border-radius: 50px">
        <div style="left: 34px; top: 20px; position: absolute; color: var(--c-secondary); font-size: 34px; font-family: var(--font-inter); font-weight: 600;">+2.500</div>
        <div style="left: 50px; top: 54.50px; position: absolute; color: #333931; font-size: 24px; font-family: var(--font-inter); font-weight: 500;">Đối tác</div>
    </div>
</div>

<div style="width: 100%; height: 840px; position: relative; overflow: hidden">
    <img src="<?= $base ?>/assets/img/client/img_home8.png" style="width: 230px; height: 500px; left: 320px; top: 159.80px; position: absolute" />
    <img src="<?= $base ?>/assets/img/client/img_home9.png" style="width: 370px; height: 400px; left: 578px; top: 366px; position: absolute" />
    <img src="<?= $base ?>/assets/svgs/clients/ic_home1.svg" style="width: 73px; height: 81.50px; left: 262px; top: 100px; position: absolute" />
    
    <div style="width: 628px; left: 972px; top: 262px; position: absolute; flex-direction: column; gap: 12px; display: inline-flex">
        <div style="color: var(--c-primary); font-size: 32px; font-family: var(--font-inter); font-weight: 700; text-transform: capitalize; line-height: 40px;">về chúng tôi</div>
        <div class="text-justify" style="color: var(--c-primary); font-size: 16px; font-family: var(--font-inter); font-weight: 400; line-height: 24px;">
            Thành lập năm 2006, với gần 20 năm kinh nghiệm tư vấn du học cùng mạng lưới đối tác rộng khắp thế giới, Tư vấn du học VNPC đã và đang là một trong những đơn vị đồng hành cùng các bạn trẻ trên chặng đường chinh phục giấc mơ du học. Cho đến hiện tại, VNPC là đối tác đáng tin cậy của rất nhiều trường đại học và cao đẳng ở các nước Úc, Thụy Sỹ, Anh, Mỹ, Canada, Đức, New Zealand, Síp, Phần Lan, Hà Lan, Tây Ban Nha, Singapore, Hàn Quốc, Nhật Bản, Trung Quốc, Đài Loan .... Chúng tôi cam kết mang đến cho Quý khách hàng dịch vụ toàn diện, đáng tin cậy và chất lượng. Các dịch vụ tư vấn, xử lý hồ sơ du học nhanh chóng với thông tin chi phí minh bạch và tỷ lệ đậu visa cao được thực hiện bởi đội ngũ chuyên viên chuyên môn cao, giàu kinh nghiệm và nhiệt tình hết mình
        </div>
    </div>

    <img style="padding-left: 24px; left: 972px; top: 578px; position: absolute; background: var(--c-secondary); border-radius: 200px;" src="<?= $base ?>/assets/svgs/clients/ic_home3.svg" />

    <div style="width: 220px; height: 220px; left: 588px; top: 105px; position: absolute; background: #F5F5F5">
        <div style="width: 10px; height: 10px; left: 0px; top: 0px; position: absolute; background: var(--c-accent);"></div>
        <div style="width: 10px; height: 10px; left: 210px; top: 0px; position: absolute; background: var(--c-accent);"></div>
        <div style="width: 10px; height: 10px; left: 0px; top: 210px; position: absolute; background: var(--c-accent);"></div>
        <div style="width: 10px; height: 10px; left: 210px; top: 210px; position: absolute; background: var(--c-accent);"></div>
        <div style="width: 200px; height: 200px; left: 10px; top: 10px; position: absolute; border: 1px var(--c-accent) solid"></div>
        <img src="<?= $base ?>/assets/svgs/clients/ic_home2.svg" />
    </div>
</div>

<div style="width: 100%; height: 400px; position: relative; overflow: hidden; background-image: url(<?= $base ?>/assets/img/client/img_home10.png)">
    <div style="width: 100%; height: 400px; left: 0px; top: 0px; position: absolute; opacity: 0.85; background: #0C4073"></div>
    <img src="<?= $base ?>/assets/img/client/img_home11.png" style="width: 325px; height: 238px; left: 1595px; top: -40px; position: absolute" />
    <img src="<?= $base ?>/assets/img/client/img_home12.png" style="width: 85px; height: 24px; left: 1662px; top: 313.47px; position: absolute" />
    
    <div style="width: 320px; left: 380px; top: 120px; position: absolute; flex-direction: column; align-items: center; gap: 24px; display: inline-flex">
        <div class="stat-circle-outer">
            <div style="width: 50px; height: 50px; left: 20px; top: 20px; position: absolute; overflow: hidden">
                <img src="<?= $base ?>/assets/svgs/clients/ic_home4.svg" style="width: 44px; height: 48.33px; position: absolute" />
            </div>
            <div class="stat-circle-inner"></div>
        </div>
        <div class="stat-text" style="width: 318px;">Đội ngũ tư vấn<br />chuyên nghiệp, tận tâm</div>
    </div>

    <div style="width: 320px; left: 800px; top: 120px; position: absolute; flex-direction: column; align-items: center; gap: 24px; display: inline-flex">
        <div class="stat-circle-outer">
            <div style="width: 50px; height: 50px; left: 20px; top: 20px; position: absolute; overflow: hidden">
                <img src="<?= $base ?>/assets/svgs/clients/ic_home5.svg" style="width: 44px; height: 48.33px; position: absolute" />
            </div>
            <div class="stat-circle-inner"></div>
        </div>
        <div class="stat-text" style="width: 280px;">Đối tác của hơn 1.000+<br />trường trên thế giới</div>
    </div>

    <div style="width: 320px; left: 1220px; top: 120px; position: absolute; flex-direction: column; align-items: center; gap: 24px; display: inline-flex">
        <div class="stat-circle-outer">
            <div style="width: 50px; height: 50px; left: 20px; top: 20px; position: absolute;">
                <img src="<?= $base ?>/assets/svgs/clients/ic_home6.svg" style="width: 44px; height: 48.33px; position: absolute" />
            </div>
            <div class="stat-circle-inner"></div>
        </div>
        <div class="stat-text" style="width: 304px;">Gần 20 năm kinh nghiệm<br />tư vấn du học</div>
    </div>
</div>

<div style="width: 100%; max-width: 628px; margin: 0 auto; text-align: center; padding: 40px 0;">
    <div style="color: var(--c-primary); font-size: 32px; font-family: var(--font-inter); font-weight: 700; text-transform: capitalize; line-height: 40px; margin-bottom: 12px;">Du học quốc tế</div>
    <div style="color: var(--c-primary); font-size: 16px; font-family: var(--font-inter); font-weight: 400; line-height: 24px;">Tư vấn du học quốc tế các nước tại Châu Úc, Châu Âu, Châu Á, Châu Mỹ ...</div>
</div>

<div class="grid-container">
    <div class="grid-2-1">
        <?php foreach($country_groups['row1'] as $c): ?>
        <div class="country-card" style="height: <?= $c['height'] ?>;">
            <img class="w-full h-full img-cover pos-abs" src="<?= $base ?>/assets/img/client/<?= $c['img'] ?>" />
            <div class="country-overlay"></div>
            <div class="country-text">Du Học <?= $c['name'] ?></div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <div class="grid-1-1-1">
        <?php foreach($country_groups['row2'] as $c): ?>
        <div class="country-card" style="height: <?= $c['height'] ?>;">
            <img class="w-full h-full img-cover pos-abs" src="<?= $base ?>/assets/img/client/<?= $c['img'] ?>" />
            <div class="country-overlay"></div>
            <div class="country-text">Du Học <?= $c['name'] ?></div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="grid-1-2">
        <?php foreach($country_groups['row3'] as $c): ?>
        <div class="country-card" style="height: <?= $c['height'] ?>;">
            <img class="w-full h-full img-cover pos-abs" src="<?= $base ?>/assets/img/client/<?= $c['img'] ?>" />
            <div class="country-overlay"></div>
            <div class="country-text">Du Học <?= $c['name'] ?></div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="grid-1-1-1">
        <?php foreach($country_groups['row4'] as $c): ?>
        <div class="country-card" style="height: <?= $c['height'] ?>;">
            <img class="w-full h-full img-cover pos-abs" src="<?= $base ?>/assets/img/client/<?= $c['img'] ?>" />
            <div class="country-overlay"></div>
            <div class="country-text">Du Học <?= $c['name'] ?></div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="grid-2-1-no-margin">
        <?php foreach($country_groups['row5'] as $c): ?>
        <div class="country-card" style="height: <?= $c['height'] ?>;">
            <img class="w-full h-full img-cover pos-abs" src="<?= $base ?>/assets/img/client/<?= $c['img'] ?>" />
            <div class="country-overlay"></div>
            <div class="country-text">Du Học <?= $c['name'] ?></div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div style="width: 100%; height: 780px; position: relative; background: #F2F2F2; background-image: url(<?= $base ?>/assets/img/client/img_home13.png)">
    <div style="width: 1281px; left: 320px; top: 100px; position: absolute; justify-content: flex-start; align-items: flex-end; gap: 24px; display: inline-flex; flex-wrap: wrap; align-content: flex-end">
        
        <div style="width: 1280px; justify-content: space-between; align-items: flex-end; display: flex">
            <div style="width: 398px; flex-direction: column; gap: 12px; display: inline-flex">
                <div style="color: var(--c-primary); font-size: 32px; font-family: var(--font-inter); font-weight: 700; text-transform: capitalize; line-height: 40px;">Học bổng du học</div>
                <div style="color: var(--c-primary); font-size: 16px; font-family: var(--font-inter); font-weight: 400; line-height: 24px;">Cập nhật thông tin học bổng hấp dẫn, chính xác</div>
            </div>
            <img style="padding-left: 24px; background: var(--c-secondary); border-radius: 200px; display: flex" src="<?= $base ?>/assets/svgs/clients/ic_home3.svg" />
        </div>

        <?php 
        $scholarships = [
            'Sẵn sàng trở thành chủ nhân học bổng vùng Regional của Úc lên đến 15000 AUD',
            'Tham Dự Hội Thảo Du Học: Cơ Hội Nhận Học Bổng 14.000 AUD/Năm Tại La Trobe Sydney',
            'Các loại học bổng du học THPT Mỹ và điều kiện xin học bổng'
        ];
        foreach($scholarships as $title): 
        ?>
        <div style="flex: 1 1 0; padding: 16px; background: white; box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.25); border-radius: 12px; flex-direction: column; gap: 20px; display: inline-flex">
            <div style="width: 379px; height: 260px; position: relative">
                <img style="width: 379px; height: 260px; left: 0px; top: 0px; position: absolute; border-radius: 8px" src="https://placehold.co/379x260" />
                <div style="padding: 0 10px; left: 16px; top: 16px; position: absolute; background: var(--c-accent); border-radius: 4px; display: inline-flex">
                    <div style="color: white; font-size: 16px; font-family: var(--font-inter); line-height: 32px;">HOT</div>
                </div>
            </div>
            <div style="align-self: stretch; flex-direction: column; gap: 8px; display: flex">
                <div style="height: 24px; align-items: center; gap: 2px; display: inline-flex">
                    <div style="width: 79px; height: 14px; color: #FFD25D; font-size: 14px; font-weight: 900;"></div>
                    <div style="color: var(--c-text); font-size: 14px; font-family: var(--font-inter); font-weight: 500;">(4.7)</div>
                </div>
                <div style="align-self: stretch; height: 90px; color: var(--c-primary); font-size: 20px; font-family: var(--font-inter); font-weight: 600; text-transform: capitalize; line-height: 30px; word-wrap: break-word"><?= $title ?></div>
                <div style="display:flex; align-items:center; gap: 5px; color: var(--c-text); font-size: 14px; font-family: var(--font-inter);">
                   <span style="color:black; font-weight:900"></span> Người xem: 10+
                   <span style="color:black; font-weight:900; margin-left:10px"></span> 19h 30m
                   <span style="color:black; font-weight:900; margin-left:10px"></span> Tìm kiếm 20+
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</div>

<div style="width: 100%; height: 860px; position: relative; background: white; overflow: hidden">
    <div style="width: 85px; height: 24px; position: absolute; top: 162px; left: 50%; transform: translateX(-50%); background-color: purple; -webkit-mask: url(<?= $base ?>/assets/img/client/img_home12.png) center/contain no-repeat; mask: url(<?= $base ?>/assets/img/client/img_home12.png) center/contain no-repeat;"></div>

    <?php foreach($benefits as $b): ?>
    <div class="benefit-card" style="left: <?= $b['left'] ?>; top: <?= $b['top'] ?>;">
        <div style="display: flex; align-items: center; gap: 8px;">
            <img src="<?= $base ?>/assets/svgs/clients/ic_home7.svg" style="width: 17.40px; height: 17px;" />
            <div class="benefit-title"><?= $b['title'] ?></div>
        </div>
        <div class="benefit-desc"><?= $b['desc'] ?></div>
    </div>
    <?php endforeach; ?>

    <img src="<?= $base ?>/assets/img/client/img_home14.png" style="width: 277px; height: 271px; left: 1378.50px; top: 66px; position: absolute" />

    <div style="position: absolute; left: 320px; top: 179.53px; display: flex; align-items: center; gap: 18px;">
        <div style="width: 333px; height: 80px; font-family: var(--font-inter); font-weight: 700; font-size: 32px; line-height: 40px; color: var(--c-primary);">Tại sao nên chọn <br /> du học tại chúng tôi</div>
        <div style="font-family: var(--font-inter); font-weight: 700; font-size: 128px; line-height: 40px; color: var(--c-secondary);">?</div>
    </div>

    <div style="width: 356.50px; height: 305px; left: 1243.50px; top: 491px; position: absolute; background: #FFD25D"></div>
    <div style="width: 356.50px; height: 305px; left: 1366.50px; top: 421px; position: absolute; transform: rotate(-180deg); transform-origin: top left; background: #FFD25D"></div>
    <img src="<?= $base ?>/assets/img/client/img_home15.png" style="width: 530px; height: 620px; left: 1040px; top: 146px; position: absolute; outline: 10px white solid" />
</div>


<div style="width: 100%; height: 575.89px; position: relative; overflow: hidden; background-image: url(<?= $base ?>/assets/img/client/img_home18.png)">
    <div style="width: 100%; height: 576px; left: 0px; top: 0px; position: absolute; opacity: 0.85; background: #0C4073"></div>
    <img src="<?= $base ?>/assets/img/client/img_home12.png" style="width: 85px; height: 24px; left: 1758px; top: 111px; position: absolute" />
    <img src="<?= $base ?>/assets/svgs/clients/ic_home8.svg" style="position: absolute; width: 431.93px; height: 591.13px; left: 1550px;" />

    <?php foreach($steps as $s): ?>
    <div style="width: 80px; height: 80px; left: <?= $s['left_circle'] ?>; top: 260px; position: absolute; background: #2FC7A1; border-radius: 9999px"></div>
    <div style="width: 193px; height: 210px; left: <?= $s['left_card'] ?>; top: 300px; position: absolute; background: white; box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.50); border-radius: 12px; border-bottom: 2px #2FC7A1 solid"></div>
    <div style="width: 74px; height: 74px; left: <?= $s['left_icon'] ?>; top: 263px; position: absolute; background: white; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25); border-radius: 9999px"></div>
    <div style="width: 66px; height: 66px; left: <?= str_replace('px', '', $s['left_icon']) + 4 ?>px; top: 267px; position: absolute; background: white; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.25) inset; border-radius: 9999px"></div>
    
    <div style="left: <?= $s['left_num'] ?>; top: 284px; position: absolute; text-align: center; color: #2FC7A1; font-size: 22px; font-family: var(--font-inter); font-weight: 700; line-height: 32px;"><?= $s['num'] ?></div>
    <div style="left: <?= $s['left_title'] ?>; top: 346px; width: 150px; position: absolute; text-align: center; color: black; font-size: 20px; font-family: var(--font-inter); font-weight: 600; line-height: 24px; display:flex; justify-content:center;"><?= $s['title'] ?></div>
    <div style="width: 169px; left: <?= $s['left_desc'] ?>; top: 402px; position: absolute; text-align: justify; color: var(--c-primary); font-size: 16px; font-family: var(--font-inter); font-weight: 400; line-height: 24px;"><?= $s['desc'] ?></div>
    <?php endforeach; ?>

    <div style="width: 50.19px; height: 50.63px; left: 1573.63px; top: 195px; position: absolute; transform-origin: top left"><img src="<?= $base ?>/assets/svgs/clients/ic_home9.svg" /></div>
    <div style="width: 22px; height: 32.15px; left: 359px; top: 183px; position: absolute"><img src="<?= $base ?>/assets/svgs/clients/ic_location_2.svg"></div>

    <svg style="position: absolute; left: 370px; top: 199px; width: 1229px; height: 6px; z-index: 1;" viewBox="0 0 1229 6" fill="none">
        <line x1="0" y1="3" x2="1229" y2="3" stroke="#2FC7A1" stroke-width="3" stroke-linecap="round" />
        <?php 
        $cx_points = [0, 47, 264, 481, 698, 915, 1132, 1229];
        foreach($cx_points as $cx) echo "<circle cx='$cx' cy='3' r='5' fill='white' stroke='#2FC7A1' stroke-width='2' />";
        ?>
    </svg>

    <?php 
    $lines_left = [417, 634, 851, 1068, 1285, 1502];
    foreach($lines_left as $lx): ?>
    <svg style="position: absolute; left: <?= $lx ?>px; top: 202px; width: 2px; height: 65px; z-index: 1;" viewBox="0 0 2 65">
        <line x1="1" y1="0" x2="1" y2="65" stroke="#2FC7A1" stroke-width="2" stroke-dasharray="4 4" />
    </svg>
    <?php endforeach; ?>

    <img src="<?= $base ?>/assets/img/client/img_home17.png" style="width: 49px; height: 49px; left: 42px; top: 473px; position: absolute" />
    <img src="<?= $base ?>/assets/img/client/img_home19.png" style="width: 104px; height: 99px; left: 273px; top: 60px; position: absolute" />
    <div style="left: 909px; top: 87px; position: absolute; color: white; font-size: 32px; font-family: var(--font-inter); font-weight: 600; line-height: 44px;">Bước<br />du học cùng tôi</div>
    <div style="left: 753px; top: 99px; position: absolute; text-align: right; color: white; font-size: 24px; font-family: var(--font-inter); font-weight: 600;">hành<br />trình</div>
    <img src="<?= $base ?>/assets/img/client/img_home16.png" style="width: 152px; height: 48px; left: 999px; top: 78px; position: absolute" />
    <div style="left: 821px; top: 90px; position: absolute; color: white; font-size: 120px; font-family: var(--font-inter); font-weight: 700; line-height: 80px;">6</div>
</div>

<div style="width: 100%; height: 800px; position: relative; overflow: hidden; background-image: url(<?= $base ?>/assets/img/client/img_home20.png)">
    <div style="width: 699px; height: 364px; left: 373px; top: 345.11px; position: absolute; overflow: hidden; border-radius: 10px;">
        <img src="<?= $base ?>/assets/img/client/img_home23.png" style="width: 800px; height: 500px; left: -84px; top: -127px; position: absolute" />
    </div>
    <img src="<?= $base ?>/assets/img/client/img_home21.png" style="width: 259px; height: 235px; left: 326px; top: 70.11px; position: absolute; border-radius: 10px" />
    <img src="<?= $base ?>/assets/img/client/img_home22.png" style="width: 174px; height: 174px; left: 627px; top: 131.11px; position: absolute; border-radius: 10px" />
    <div style="width: 317px; height: 298px; left: 1313px; top: 410px; position: absolute; border-radius: 3px"><img src="<?= $base ?>/assets/svgs/clients/ic_home10.svg" /></div>
    
    <form id="consultation-form" class="form-box" class="flex-col">
        <div class="flex-col" style="gap: 12px; align-items: center;">
            <div style="color: #252525; font-size: 32px; font-family: var(--font-inter); font-weight: 700;">Bạn muốn đi du học</div>
            <div style="color: rgba(37, 37, 37, 0.70); font-size: 18px; font-family: var(--font-inter);">Hãy trao đổi với chuyên gia tư vấn ngay hôm nay</div>
        </div>
        <div class="flex-col" style="gap: 24px;">
            <div class="input-wrapper"><input type="text" name="full_name" required placeholder="Họ Tên *" class="input-field"></div>
            <div class="input-wrapper"><input type="tel" name="phone" required placeholder="Phone *" class="input-field"></div>
            <div class="input-wrapper"><input type="email" name="email" required placeholder="E-mail *" class="input-field"></div>
            <div class="input-wrapper" style="height: 49px;">
                <textarea name="message" placeholder="Mong muốn của bạn" class="input-field" style="height: 100%; resize: none;"></textarea>
            </div>
        </div>
        <button type="submit" class="btn-submit">
            <div>Đăng ký ngay</div>
            <img src="<?= $base ?>/assets/svgs/clients/ic_home11.svg" style="width: 12px; height: 11px" />
        </button>
    </form>
</div>

<div style="width: 100%; height: 600px; position: relative; overflow: hidden; background-image: url(<?= $base ?>/assets/img/client/img_home24.png)">
    <div style="width: 411px; padding: 24px; left: 320px; top: 211px; position: absolute; border-radius: 20px; outline: 1px #17254E solid; outline-offset: -1px; flex-direction: column; gap: 16px; display: inline-flex">
        <div class="text-justify" style="color: #333931; font-size: 16px; font-family: var(--font-inter); line-height: 24px;">
            Em vô tình biết đến VNPC qua Facebook... (Nội dung mẫu)
        </div>
        <div style="justify-content: flex-start; align-items: center; gap: 12px; display: inline-flex">
            <div style="width: 50px; height: 50px; position: relative; overflow: hidden; border-radius: 50px; background-image: url(https://placehold.co/50x50)"><img style="width: 56px; height: 56px; left: -3px; top: -3px; position: absolute" src="https://placehold.co/56x56" /></div>
            <div style="width: 120.67px; height: 18.70px; display: flex; flex-direction: column; color: #0E2A46; font-size: 16px; font-family: var(--font-inter); font-weight: 700;">Minh Khoa</div>
        </div>
    </div>
    <div style="left: 693px; top: 71.11px; position: absolute; flex-direction: column; align-items: center; gap: 12px; display: inline-flex">
        <div style="color: #0E2A46; font-size: 32px; font-family: var(--font-inter); font-weight: 700; text-transform: capitalize; line-height: 40px;">ý kiến Khách hàng</div>
        <div style="color: #0E2A46; font-size: 16px; font-family: var(--font-inter); font-weight: 400; line-height: 24px;">Cùng xem khách hàng nói gì về chúng tôi sau những trải nghiệm thú vị.</div>
    </div>
</div>

<div style="width: 1280px; flex-direction: column; align-items: center; gap: 30px; display: inline-flex">
    <div style="flex-direction: column; align-items: center; gap: 12px; display: flex">
        <div style="color: #0E2A46; font-size: 32px; font-family: var(--font-inter); font-weight: 700; text-transform: capitalize; line-height: 40px;">thông tin Du học quốc tế</div>
        <div style="color: #0E2A46; font-size: 16px; font-family: var(--font-inter); font-weight: 400; line-height: 24px;">Chia sẻ thông tin du học, học bổng của các trường đại học hàng đầu thế giới</div>
    </div>
    </div>

<script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-database.js"></script>
<script src="/php-duhoc/public/assets/js/firebase-config.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('consultation-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const btn = form.querySelector('button[type="submit"]');

            // Optional: Disable button
            // btn.disabled = true;

            fetch('/php-duhoc/public/consultation/register', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    if (typeof firebase !== 'undefined') {
                        firebase.database().ref('notifications').push({
                            type: 'new_consultation',
                            data: Object.fromEntries(formData.entries()),
                            timestamp: firebase.database.ServerValue.TIMESTAMP,
                            read: false
                        });
                    }
                    form.reset();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Lỗi:', error);
                alert('Có lỗi xảy ra khi gửi đăng ký.');
            })
            .finally(() => {
                // btn.disabled = false;
            });
        });
    }
});
</script>