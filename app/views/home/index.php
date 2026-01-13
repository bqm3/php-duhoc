<?php
if (!isset($base)) $base = ''; 

$country_groups = [
    'row1' => [ // Grid 2-1
        ['name' => 'Canada', 'img' => 'dh_canada.png', 'height' => '411px'],
        ['name' => 'Mỹ', 'img' => 'dh_my.png', 'height' => '411px'],
    ],
    'row2' => [ // Grid 1-1-1
        ['name' => 'New Zealand', 'img' => 'dh_new_zealand.png', 'height' => '308px'],
        ['name' => 'Úc', 'img' => 'dh_uc.png', 'height' => '308px'],
        ['name' => 'Đức', 'img' => 'dh_duc.png', 'height' => '308px'],
    ],
    'row3' => [ // Grid 1-2
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

$grid_classes = [
    'row1' => 'grid-2-1',
    'row2' => 'grid-1-1-1',
    'row3' => 'grid-1-2',
    'row4' => 'grid-1-1-1',
    'row5' => 'grid-2-1-no-margin',
];

$features = [
    ['title' => 'Kinh Nghiệm', 'desc' => 'Gần 20 năm kinh nghiệm trong lĩnh vực du học, đối tác đáng tin cậy của 1.000 + trường trên thế giới.'],
    ['title' => 'Tư vấn 24/7', 'desc' => 'Đội ngũ chuyên viên tư vấn chuyên môn cao, xây dựng lộ trình giáo dục tốt nhất, tận tình giải đáp 24/7'],
    ['title' => 'Đào tạo Chuyên Sâu', 'desc' => 'Đào tạo ngoại ngữ, kiểm tra trình độ miễn phí, luyện thi chứng chỉ tiếng Anh đạt chuẩn đầu vào'],
    ['title' => 'Chuyên Nghiệp, Minh Bạch', 'desc' => 'Quy trình làm việc minh bạch, luôn tôn trọng và đặt lợi ích của khách hàng lên hàng đầu.'],
    ['title' => 'Hướng dẫn nhiệt Tình', 'desc' => 'Hướng dẫn làm hồ sơ chứng minh tài chính, xin visa với tỷ lệ đạt cao, săn học bổng giá trị lên đến 100%'],
    ['title' => 'Luôn Kết Nối', 'desc' => 'Giữ kết nối, chăm sóc và hỗ trợ học sinh trước khi bay, trong khi bay và sau khi bay'],
];

$process_steps = [
    ['step' => '01', 'title' => 'Đăng ký<br>thông tin cơ bản', 'desc' => 'Điền thông tin cá nhân, tài chính, nguyện vọng và khả năng ngoại ngữ.'],
    ['step' => '02', 'title' => 'Đăng ký mã<br>hồ sơ', 'desc' => 'Đăng ký mã hồ sơ du học để có tên trên hệ thống và nhận hỗ trợ.'],
    ['step' => '03', 'title' => 'Tư vấn<br>chuyên sâu', 'desc' => 'Đánh giá hồ sơ, tư vấn trường, ngành, xin thư mời nhập học, xin học bổng.'],
    ['step' => '04', 'title' => 'Xin Visa', 'desc' => 'Hoàn thiện hồ sơ, luyện phỏng vấn xin visa, học bổng và hướng dẫn đóng phí.'],
    ['step' => '05', 'title' => 'Nhận Visa', 'desc' => 'Hướng dẫn trước bay, thanh lý hợp đồng du học, nhận visa và chụp ảnh lưu niệm.'],
    ['step' => '06', 'title' => 'Hỗ trợ<br>quá trình học', 'desc' => 'Điền thông tin cá nhân, tài chính, nguyện vọng và khả năng ngoại ngữ.'],
];

$testimonials = [
    ['name' => 'Minh Khoa', 'img' => 'https://placehold.co/56x56', 'content' => 'Em vô tình biết đến VNPC qua Facebook, bản thân lại không tin tưởng mấy trung tâm tư vấn lắm nhưng vẫn liều tới thử xem sao. Nhưng thật sự, em đã bị thuyết phục bởi sự tận tâm, nhiệt tình, tính minh bạch và tốc độ xử lý hồ sơ của trung tâm. Cảm ơn trung tâm đã giúp em sớm thực hiện được giấc mơ du học Úc.'],
    ['name' => 'Hải Yến', 'img' => 'https://placehold.co/56x56', 'content' => 'Tôi có đưa con trai trai đến VNPC nhận tư vấn du học Úc và thấy khá hài lòng với cách tư vấn nhiệt tình, chuyên nghiệp của công ty. Công ty còn xử lý hồ sơ rất nhanh, minh bạch mọi khoản chi phí và rất có trách nhiệm.'],
    ['name' => 'Hoàng Quân', 'img' => 'https://placehold.co/56x56', 'content' => 'Luôn ủng hộ VNPC, các bạn rất tận tình và có tâm trong công việc. Mình được bạn thân giới thiệu đến VNPC và vô cùng ấn tượng với phong cách làm việc chuyên nghiệp tại đây. Từ không gian văn phòng, thái độ nhân viên đến quy trình làm việc đều rất tốt. Chúc VNPC ngày càng phát triển hơn nữa trong tương lai.'],
];
?>

<style>
.grid-2-1 {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 24px;
    margin-bottom: 24px;
}

.grid-1-1-1 {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 24px;
    margin-bottom: 24px;
}

.grid-1-2 {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 24px;
    margin-bottom: 24px;
}

.grid-2-1-no-margin {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 24px;
}

@media (max-width: 768px) {

    .grid-2-1,
    .grid-1-1-1,
    .grid-1-2,
    .grid-2-1-no-margin {
        grid-template-columns: 1fr !important;
    }
}
</style>
<div
    style="width: 100%; height: 750px; position: relative; overflow: hidden; background-image: url(<?= $base ?>/assets/img/client/img_banner.png)">
    <div
        style="padding-left: 20px; padding-right: 20px; padding-top: 12px; padding-bottom: 12px; left: 506px; top: 565px; position: absolute; background: #FE543D; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25); border-radius: 30px; justify-content: center; align-items: center; gap: 10px; display: inline-flex">
        <div
            style="justify-content: center; display: flex; flex-direction: column; color: var(--Backgrounds-Primary, white); font-size: 20px; font-family: Inter; font-weight: 500; line-height: 24px; word-wrap: break-word">
            Đăng ký du học ngay</div>
    </div>
    <div
        style="width: 741px; height: 239px; left: 320px; top: 149px; position: absolute; justify-content: center; display: flex; flex-direction: column; color: #17254E; font-size: 54px; font-family: Sora; font-weight: 600; text-transform: capitalize; line-height: 80px; word-wrap: break-word">
        tư vấn miễn phí,<br />cơ hội du học các trường hàng đầu thế giới</div>
    <div
        style="left: 320px; top: 391.50px; position: absolute; justify-content: center; display: flex; flex-direction: column; color: #333931; font-size: 24px; font-family: Inter; font-weight: 500; line-height: 32px; word-wrap: break-word">
        Nhận học bổng, nhiều chương trình khác</div>
    <div
        style="width: 610px; height: 60px; left: 320px; top: 457px; position: absolute; background: white; border-radius: 40px">
        <div
            style="left: 20px; top: 21px; position: absolute; justify-content: center; display: flex; flex-direction: column; color: #4D5756; font-size: 16px; font-family: Inter; font-weight: 400; word-wrap: break-word">
            Nhập tên trường, thành phố bạn muốn đến</div>
    </div>
    <div
        style="width: 100px; height: 60px; left: 830px; top: 457px; position: absolute; background: #2777C4; border-radius: 29px">
        <div style="width: 15px; height: 15px; left: 42.50px; top: 22.97px; position: absolute">
            <img src="<?= $base ?>/assets/svgs/clients/ic_search.svg"
                style="width: 20px; height: 20px; left: -2.50px; top: -2.97px; position: absolute" />
        </div>
    </div>
    <img style="width: 28px; height: 28px; left: 1716.75px; top: 88.06px; position: absolute"
        src="<?= $base ?>/assets/img/client/img_home6.png" />
    <img style="width: 15px; height: 15px; left: 1074.88px; top: 248.48px; position: absolute"
        src="<?= $base ?>/assets/img/client/img_home7.png" />
    <img style="width: 15px; height: 15px; left: 1636.61px; top: 648.64px; position: absolute"
        src="<?= $base ?>/assets/img/client/img_home7.png" />
    <img style="width: 327px; height: 593px; left: 1350px; top: 63px; position: absolute; border-radius: 100px"
        src="<?= $base ?>/assets/img/client/img_home4.png" />
    <img style="width: 327px; height: 592px; left: 1357px; top: 56px; position: absolute; border-radius: 100px"
        src="<?= $base ?>/assets/img/client/img_home2.png" />
    <img style="width: 236px; height: 429px; left: 1080.83px; top: 276.11px; position: absolute; border-radius: 100px"
        src="<?= $base ?>/assets/img/client/img_home5.png" />
    <img style="width: 237px; height: 429px; left: 1087.83px; top: 269.11px; position: absolute; border-radius: 100px"
        src="<?= $base ?>/assets/img/client/img_home3.png" />
    <div
        style="width: 339.20px; height: 94px; left: 1068.39px; top: 103.36px; position: absolute; background: white; box-shadow: 0px 0px 20px rgba(2, 52, 117, 0.15); border-radius: 1000px">
        <div
            style="width: 125px; height: 64px; left: 35.61px; top: 15.64px; position: absolute; justify-content: center; display: flex; flex-direction: column">
            <span
                style="color: #704FE6; font-size: 24px; font-family: Inter; font-weight: 600; line-height: 24px; word-wrap: break-word">+5.000<br /></span><span
                style="color: #17254E; font-size: 20px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">VISA
                du học</span>
        </div>
        <img style="width: 136px; height: 40px; left: 172.20px; top: 26.64px; position: absolute"
            src="<?= $base ?>/assets/img/client/img_home1.png" />
    </div>
    <div
        style="width: 238.91px; height: 100px; left: 1574.69px; top: 527.48px; position: absolute; background: white; box-shadow: 0px 0px 20px rgba(19, 39, 66, 0.15); border-radius: 50px">
        <div
            style="left: 34px; top: 20px; position: absolute; justify-content: center; display: flex; flex-direction: column; color: #2777C4; font-size: 34px; font-family: Inter; font-weight: 600; text-transform: capitalize; line-height: 32px; word-wrap: break-word">
            +2.500</div>
        <div
            style="left: 50px; top: 54.50px; position: absolute; justify-content: center; display: flex; flex-direction: column; color: #333931; font-size: 24px; font-family: Inter; font-weight: 500; line-height: 32px; word-wrap: break-word">
            Đối tác</div>
    </div>
</div>
<div style="width: 100%; height: 840px; position: relative; overflow: hidden">
    <img style="width: 230px; height: 500px; left: 320px; top: 159.80px; position: absolute"
        src="<?= $base ?>/assets/img/client/img_home8.png" />
    <img style="width: 370px; height: 400px; left: 578px; top: 366px; position: absolute"
        src="<?= $base ?>/assets/img/client/img_home9.png" />
    <!-- <div style="width: 73px; height: 81.50px; left: 262px; top: 100px; position: absolute; background: #2777C4"></div> -->
    <img style="width: 73px; height: 81.50px; left: 262px; top: 100px; position: absolute"
        src="<?= $base ?>/assets/svgs/clients/ic_home1.svg" />
    <div
        style="width: 628px; left: 972px; top: 262px; position: absolute; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 12px; display: inline-flex">
        <div
            style="align-self: stretch; justify-content: center; display: flex; flex-direction: column; color: #0E2A46; font-size: 32px; font-family: Inter; font-weight: 700; text-transform: capitalize; line-height: 40px; word-wrap: break-word">
            về chúng tôi</div>
        <div
            style="align-self: stretch; text-align: justify; color: #0E2A46; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
            Thành lập năm 2006, với gần 20 năm kinh nghiệm tư vấn du học cùng mạng lưới đối tác rộng khắp thế giới, Tư
            vấn du học VNPC đã và đang là một trong những đơn vị đồng hành cùng các bạn trẻ trên chặng đường chinh phục
            giấc mơ du học. Cho đến hiện tại, VNPC là đối tác đáng tin cậy của rất nhiều trường đại học và cao đẳng ở
            các nước Úc, Thụy Sỹ, Anh, Mỹ, Canada, Đức, New Zealand, Síp, Phần Lan, Hà Lan, Tây Ban Nha, Singapore, Hàn
            Quốc, Nhật Bản, Trung Quốc, Đài Loan .... Chúng tôi cam kết mang đến cho Quý khách hàng dịch vụ toàn diện,
            đáng tin cậy và chất lượng. Các dịch vụ tư vấn, xử lý hồ sơ du học nhanh chóng với thông tin chi phí minh
            bạch và tỷ lệ đậu visa cao được thực hiện bởi đội ngũ chuyên viên chuyên môn cao, giàu kinh nghiệm và nhiệt
            tình hết mình</div>
    </div>

    <img style="padding-left: 24px; left: 972px; top: 578px; position: absolute; background: #2777C4; border-radius: 200px; justify-content: flex-start; align-items: center; gap: 20px; display: inline-flex"
        src="<?= $base ?>/assets/svgs/clients/ic_home3.svg" />


    <div style="width: 220px; height: 220px; left: 588px; top: 105px; position: absolute; background: #F5F5F5">
        <div
            style="width: 10px; height: 10px; left: 0px; top: 0px; position: absolute; background: #FE543D; border: 1px #FE543D solid">
        </div>
        <div
            style="width: 10px; height: 10px; left: 210px; top: 0px; position: absolute; background: #FE543D; border: 1px #FE543D solid">
        </div>
        <div
            style="width: 10px; height: 10px; left: 0px; top: 210px; position: absolute; background: #FE543D; border: 1px #FE543D solid">
        </div>
        <div
            style="width: 10px; height: 10px; left: 210px; top: 210px; position: absolute; background: #FE543D; border: 1px #FE543D solid">
        </div>
        <div style="width: 200px; height: 200px; left: 10px; top: 10px; position: absolute; border: 1px #FE543D solid">
        </div>
        <img src="<?= $base ?>/assets/svgs/clients/ic_home2.svg" />
    </div>
</div>
<div
    style="width: 100%; height: 400px; position: relative; overflow: hidden; background-image: url(<?= $base ?>/assets/img/client/img_home10.png)">
    <div
        style="width: 100%; height: 400px; left: 0px; top: 0px; position: absolute; opacity: 0.85; background: #0C4073">
    </div>
    <img style="width: 325px; height: 238px; left: 1595px; top: -40px; position: absolute"
        src="<?= $base ?>/assets/img/client/img_home11.png" />
    <!-- <img style="width: 41px; height: 37px; left: 69px; top: 51px; position: absolute"
        src="https://placehold.co/41x37" /> -->
    <img style="width: 85px; height: 24px; left: 1662px; top: 313.47px; position: absolute"
        src="<?= $base ?>/assets/img/client/img_home12.png" />
    <div
        style="width: 320px; left: 380px; top: 120px; position: absolute; flex-direction: column; justify-content: flex-start; align-items: center; gap: 24px; display: inline-flex">
        <div style="width: 90px; height: 90px; position: relative; background: white; border-radius: 45px">
            <div style="width: 50px; height: 50px; left: 20px; top: 20px; position: absolute; overflow: hidden">
                <img style="width: 43.98px; height: 48.33px; left: 3.01px; top: 0.83px; position: absolute"
                    src="<?= $base ?>/assets/svgs/clients/ic_home4.svg" />
            </div>
            <div
                style="width: 108px; height: 108px; left: -9px; top: -9px; position: absolute; border-radius: 54px; border: 1px white solid">
            </div>
        </div>
        <div
            style="width: 318px; text-align: center; justify-content: center; display: flex; flex-direction: column; color: white; font-size: 24px; font-family: Inter; font-weight: 600; text-transform: capitalize; line-height: 36px; word-wrap: break-word">
            Đội ngũ tư vấn<br />chuyên nghiệp, tận tâm</div>
    </div>
    <div
        style="width: 320px; left: 800px; top: 120px; position: absolute; flex-direction: column; justify-content: flex-start; align-items: center; gap: 24px; display: inline-flex">
        <div style="width: 90px; height: 90px; position: relative; background: white; border-radius: 45px">
            <div style="width: 50.03px; height: 50px; left: 20px; top: 20px; position: absolute; overflow: hidden">
                <img style="width: 43.98px; height: 48.33px; left: 3.01px; top: 0.83px; position: absolute"
                    src="<?= $base ?>/assets/svgs/clients/ic_home5.svg" />
            </div>
            <div
                style="width: 108px; height: 108px; left: -9px; top: -9px; position: absolute; border-radius: 54px; border: 1px white solid">
            </div>
        </div>
        <div
            style="width: 280px; text-align: center; justify-content: center; display: flex; flex-direction: column; color: white; font-size: 24px; font-family: Inter; font-weight: 600; text-transform: capitalize; line-height: 36px; word-wrap: break-word">
            Đối tác của hơn 1.000+<br />trường trên thế giới</div>
    </div>
    <div
        style="width: 320px; left: 1220px; top: 120px; position: absolute; flex-direction: column; justify-content: flex-start; align-items: center; gap: 24px; display: inline-flex">
        <div style="width: 90px; height: 90px; position: relative; background: white; border-radius: 45px">
            <div style="width: 50px; height: 50px; left: 20px; top: 20px; position: absolute">
                <img style="width: 43.98px; height: 48.33px; left: 3.01px; top: 0.83px; position: absolute"
                    src="<?= $base ?>/assets/svgs/clients/ic_home6.svg" />
            </div>
            <div
                style="width: 108px; height: 108px; left: -9px; top: -9px; position: absolute; border-radius: 54px; border: 1px white solid">
            </div>
        </div>
        <div
            style="width: 304px; text-align: center; justify-content: center; display: flex; flex-direction: column; color: white; font-size: 24px; font-family: Inter; font-weight: 600; text-transform: capitalize; line-height: 36px; word-wrap: break-word">
            Gần 20 năm kinh nghiệm<br />tư vấn du học</div>
    </div>
</div>
<div style="width: 100%; max-width: 628px; margin: 0 auto; text-align: center; padding: 40px 0;">
    <div
        style="color: #0E2A46; font-size: 32px; font-family: Inter; font-weight: 700; text-transform: capitalize; line-height: 40px; margin-bottom: 12px;">
        Du học quốc tế
    </div>
    <div style="color: #0E2A46; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px;">
        Tư vấn du học quốc tế các nước tại Châu Úc, Châu Âu, Châu Á, Châu Mỹ ...
    </div>
</div>

<div style="max-width: 1290px; margin: 40px auto; padding: 0 20px;">

    <!-- Row 1: Canada (2 phần) + Mỹ (1 phần) -->
    <div class="grid-2-1">
        <!-- 1. Du Học Canada -->
        <div style="position: relative; border-radius: 8px; overflow: hidden; height: 411px;">
            <img style="width: 100%; height: 100%; object-fit: cover; position: absolute;"
                src="<?= $base ?>/assets/img/client/dh_canada.png" />
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%);">
            </div>
            <div
                style="left: 30px; top: 20px; position: absolute; color: white; font-size: 24px; font-family: Inter; font-weight: 600; line-height: 40px;">
                Du Học Canada
            </div>
        </div>

        <!-- 2. Du học Mỹ -->
        <div style="position: relative; border-radius: 8px; overflow: hidden; height: 411px;">
            <img style="width: 100%; height: 100%; object-fit: cover; position: absolute;"
                src="<?= $base ?>/assets/img/client/dh_my.png" />
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%);">
            </div>
            <div
                style="left: 30px; top: 20px; position: absolute; color: white; font-size: 24px; font-family: Inter; font-weight: 600; line-height: 40px;">
                Du học Mỹ
            </div>
        </div>
    </div>

    <!-- Row 2: New Zealand (1 phần) + Úc (1 phần) + Đức (1 phần) -->
    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 24px; margin-bottom: 24px;">
        <!-- 3. Du Học New Zealand -->
        <div style="position: relative; border-radius: 8px; overflow: hidden; height: 308px;">
            <img style="width: 100%; height: 100%; object-fit: cover; position: absolute;"
                src="<?= $base ?>/assets/img/client/dh_new_zealand.png" />
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%);">
            </div>
            <div
                style="left: 30px; top: 20px; position: absolute; color: white; font-size: 24px; font-family: Inter; font-weight: 600; line-height: 40px;">
                Du Học New Zealand
            </div>
        </div>

        <!-- 4. Du Học Úc -->
        <div style="position: relative; border-radius: 8px; overflow: hidden; height: 308px;">
            <img style="width: 100%; height: 100%; object-fit: cover; position: absolute;"
                src="<?= $base ?>/assets/img/client/dh_uc.png" />
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%);">
            </div>
            <div
                style="left: 30px; top: 20px; position: absolute; color: white; font-size: 24px; font-family: Inter; font-weight: 600; line-height: 40px;">
                Du Học Úc
            </div>
        </div>

        <!-- 5. Du Học Đức -->
        <div style="position: relative; border-radius: 8px; overflow: hidden; height: 308px;">
            <img style="width: 100%; height: 100%; object-fit: cover; position: absolute;"
                src="<?= $base ?>/assets/img/client/dh_duc.png" />
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%);">
            </div>
            <div
                style="left: 30px; top: 20px; position: absolute; color: white; font-size: 24px; font-family: Inter; font-weight: 600; line-height: 40px;">
                Du Học Đức
            </div>
        </div>
    </div>

    <!-- Row 3: Phần Lan (1 phần) + Hà Lan (2 phần) -->
    <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 24px; margin-bottom: 24px;">
        <!-- 7. Du học Phần Lan -->
        <div style="position: relative; border-radius: 8px; overflow: hidden; height: 308px;">
            <img style="width: 100%; height: 100%; object-fit: cover; position: absolute;"
                src="<?= $base ?>/assets/img/client/dh_phan_lan.png" />
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%);">
            </div>
            <div
                style="left: 30px; top: 20px; position: absolute; color: white; font-size: 24px; font-family: Inter; font-weight: 600; line-height: 40px;">
                Du học Phần Lan
            </div>
        </div>

        <!-- 6. Du Học Hà Lan -->
        <div style="position: relative; border-radius: 8px; overflow: hidden; height: 308px;">
            <img style="width: 100%; height: 100%; object-fit: cover; position: absolute;"
                src="<?= $base ?>/assets/img/client/dh_ha_lan.png" />
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%);">
            </div>
            <div
                style="left: 30px; top: 20px; position: absolute; color: white; font-size: 24px; font-family: Inter; font-weight: 600; line-height: 40px;">
                Du Học Hà Lan
            </div>
        </div>
    </div>

    <!-- Row 4: Singapore (1 phần) + Anh (1 phần) + Tây Ban Nha (1 phần) -->
    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 24px; margin-bottom: 24px;">
        <!-- 8. Du Học Singapore -->
        <div style="position: relative; border-radius: 8px; overflow: hidden; height: 308px;">
            <img style="width: 100%; height: 100%; object-fit: cover; position: absolute;"
                src="<?= $base ?>/assets/img/client/dh_singapore.png" />
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%);">
            </div>
            <div
                style="left: 30px; top: 20px; position: absolute; color: white; font-size: 24px; font-family: Inter; font-weight: 600; line-height: 40px;">
                Du Học Singapore
            </div>
        </div>

        <!-- 9. Du Học Anh -->
        <div style="position: relative; border-radius: 8px; overflow: hidden; height: 308px;">
            <img style="width: 100%; height: 100%; object-fit: cover; position: absolute;"
                src="<?= $base ?>/assets/img/client/dh_anh.png" />
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%);">
            </div>
            <div
                style="left: 30px; top: 20px; position: absolute; color: white; font-size: 24px; font-family: Inter; font-weight: 600; line-height: 40px;">
                Du Học Anh
            </div>
        </div>

        <!-- 10. Du học Tây Ban Nha -->
        <div style="position: relative; border-radius: 8px; overflow: hidden; height: 308px;">
            <img style="width: 100%; height: 100%; object-fit: cover; position: absolute;"
                src="<?= $base ?>/assets/img/client/dh_tay_ban_nha.png" />
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%);">
            </div>
            <div
                style="left: 30px; top: 20px; position: absolute; color: white; font-size: 24px; font-family: Inter; font-weight: 600; line-height: 40px;">
                Du học Tây Ban Nha
            </div>
        </div>
    </div>

    <!-- Row 5: Hàn Quốc (2 phần) + Thụy Sĩ (1 phần) -->
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px;">
        <!-- 11. Du Học Hàn Quốc -->
        <div style="position: relative; border-radius: 8px; overflow: hidden; height: 308px;">
            <img style="width: 100%; height: 100%; object-fit: cover; position: absolute;"
                src="<?= $base ?>/assets/img/client/dh_han_quoc.png" />
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%);">
            </div>
            <div
                style="left: 30px; top: 20px; position: absolute; color: white; font-size: 24px; font-family: Inter; font-weight: 600; line-height: 40px;">
                Du Học Hàn Quốc
            </div>
        </div>

        <!-- 12. Du học Thụy Sĩ -->
        <div style="position: relative; border-radius: 8px; overflow: hidden; height: 308px;">
            <img style="width: 100%; height: 100%; object-fit: cover; position: absolute;"
                src="<?= $base ?>/assets/img/client/dh_thuy_si.png" />
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%);">
            </div>
            <div
                style="left: 30px; top: 20px; position: absolute; color: white; font-size: 24px; font-family: Inter; font-weight: 600; line-height: 40px;">
                Du học Thụy Sĩ
            </div>
        </div>
    </div>

</div>
<div
    style="width: 100%; height: 780px; position: relative; background: #F2F2F2; background-image: url(<?= $base ?>/assets/img/client/img_home13.png)">
    <div
        style="width: 1281px; left: 320px; top: 100px; position: absolute; justify-content: flex-start; align-items: flex-end; gap: 24px; display: inline-flex; flex-wrap: wrap; align-content: flex-end">
        <div style="width: 1280px; justify-content: space-between; align-items: flex-end; display: flex">
            <div
                style="width: 398px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 12px; display: inline-flex">
                <div
                    style="align-self: stretch; justify-content: center; display: flex; flex-direction: column; color: #0E2A46; font-size: 32px; font-family: Inter; font-weight: 700; text-transform: capitalize; line-height: 40px; word-wrap: break-word">
                    Học bổng du học</div>
                <div
                    style="align-self: stretch; color: #0E2A46; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
                    Cập nhật thông tin học bổng hấp dẫn, chính xác</div>
            </div>
            <img style="padding-left: 24px; background: #2777C4; border-radius: 200px; justify-content: flex-start; align-items: center; gap: 20px; display: flex"
                src="<?= $base ?>/assets/svgs/clients/ic_home3.svg" />
        </div>
        <div
            style="flex: 1 1 0; padding: 16px; background: white; box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.25); border-radius: 12px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 20px; display: inline-flex">
            <div style="width: 379px; height: 260px; position: relative">
                <img style="width: 379px; height: 260px; left: 0px; top: 0px; position: absolute; border-radius: 8px"
                    src="https://placehold.co/379x260" />
                <div
                    style="padding-left: 10px; padding-right: 10px; left: 16px; top: 16px; position: absolute; background: #FE543D; border-radius: 4px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex">
                    <div
                        style="justify-content: center; display: flex; flex-direction: column; color: white; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 32px; word-wrap: break-word">
                        HOT</div>
                </div>
            </div>
            <div
                style="align-self: stretch; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 8px; display: flex">
                <div
                    style="height: 24px; justify-content: flex-start; align-items: center; gap: 2px; display: inline-flex">
                    <div
                        style="width: 79.07px; height: 14px; justify-content: center; display: flex; flex-direction: column; color: #FFD25D; font-size: 14px; font-family: Font Awesome 5 Pro; font-weight: 900; line-height: 14px; word-wrap: break-word">
                        </div>
                    <div
                        style="justify-content: center; display: flex; flex-direction: column; color: #4D5756; font-size: 14px; font-family: Inter; font-weight: 500; line-height: 20px; word-wrap: break-word">
                        (4.7)</div>
                </div>
                <div
                    style="align-self: stretch; height: 90px; color: #0E2A46; font-size: 20px; font-family: Inter; font-weight: 600; text-transform: capitalize; line-height: 30px; word-wrap: break-word">
                    Sẵn sàng trở thành chủ nhân học bổng vùng Regional của Úc lên đến 15000 AUD</div>
                <div
                    style="width: 10.70px; height: 14px; justify-content: center; display: flex; flex-direction: column; color: black; font-size: 14px; font-family: Font Awesome 5 Pro; font-weight: 900; text-transform: capitalize; line-height: 14px; word-wrap: break-word">
                    </div>
                <div
                    style="justify-content: center; display: flex; flex-direction: column; color: #4D5756; font-size: 14px; font-family: Inter; font-weight: 400; text-transform: capitalize; line-height: 32px; word-wrap: break-word">
                    Người xem: 10+</div>
                <div
                    style="width: 58.13px; height: 14px; justify-content: center; display: flex; flex-direction: column; color: black; font-size: 14px; font-family: Font Awesome 5 Pro; font-weight: 900; text-transform: capitalize; line-height: 14px; word-wrap: break-word">
                    </div>
                <div
                    style="width: 60.19px; height: 32px; justify-content: center; display: flex; flex-direction: column; color: #4D5756; font-size: 14px; font-family: Inter; font-weight: 400; text-transform: capitalize; line-height: 32px; word-wrap: break-word">
                    19h 30m</div>
                <div
                    style="width: 56.39px; height: 14px; justify-content: center; display: flex; flex-direction: column; color: black; font-size: 14px; font-family: Font Awesome 5 Pro; font-weight: 900; text-transform: capitalize; line-height: 14px; word-wrap: break-word">
                    </div>
                <div
                    style="justify-content: center; display: flex; flex-direction: column; color: #4D5756; font-size: 14px; font-family: Inter; font-weight: 400; text-transform: capitalize; line-height: 32px; word-wrap: break-word">
                    Tìm kiếm 20+</div>
            </div>
        </div>
        <div
            style="flex: 1 1 0; padding: 16px; background: white; box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.25); border-radius: 12px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 20px; display: inline-flex">
            <div style="width: 379px; height: 260px; position: relative">
                <img style="width: 379px; height: 260px; left: 0px; top: 0px; position: absolute; border-radius: 8px"
                    src="https://placehold.co/379x260" />
                <div
                    style="padding-left: 10px; padding-right: 10px; left: 16px; top: 16px; position: absolute; background: #FE543D; border-radius: 4px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex">
                    <div
                        style="justify-content: center; display: flex; flex-direction: column; color: white; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 32px; word-wrap: break-word">
                        HOT</div>
                </div>
            </div>
            <div
                style="align-self: stretch; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 8px; display: flex">
                <div
                    style="height: 24px; justify-content: flex-start; align-items: center; gap: 2px; display: inline-flex">
                    <div
                        style="width: 79.07px; height: 14px; justify-content: center; display: flex; flex-direction: column; color: #FFD25D; font-size: 14px; font-family: Font Awesome 5 Pro; font-weight: 900; line-height: 14px; word-wrap: break-word">
                        </div>
                    <div
                        style="justify-content: center; display: flex; flex-direction: column; color: #4D5756; font-size: 14px; font-family: Inter; font-weight: 500; line-height: 20px; word-wrap: break-word">
                        (4.7)</div>
                </div>
                <div
                    style="align-self: stretch; height: 90px; color: #0E2A46; font-size: 20px; font-family: Inter; font-weight: 600; text-transform: capitalize; line-height: 30px; word-wrap: break-word">
                    Tham Dự Hội Thảo Du Học: Cơ Hội Nhận Học Bổng 14.000 AUD/Năm Tại La Trobe Sydney</div>
                <div
                    style="width: 10.70px; height: 14px; justify-content: center; display: flex; flex-direction: column; color: black; font-size: 14px; font-family: Font Awesome 5 Pro; font-weight: 900; text-transform: capitalize; line-height: 14px; word-wrap: break-word">
                    </div>
                <div
                    style="justify-content: center; display: flex; flex-direction: column; color: #4D5756; font-size: 14px; font-family: Inter; font-weight: 400; text-transform: capitalize; line-height: 32px; word-wrap: break-word">
                    Người xem: 10+</div>
                <div
                    style="width: 58.13px; height: 14px; justify-content: center; display: flex; flex-direction: column; color: black; font-size: 14px; font-family: Font Awesome 5 Pro; font-weight: 900; text-transform: capitalize; line-height: 14px; word-wrap: break-word">
                    </div>
                <div
                    style="width: 60.19px; height: 32px; justify-content: center; display: flex; flex-direction: column; color: #4D5756; font-size: 14px; font-family: Inter; font-weight: 400; text-transform: capitalize; line-height: 32px; word-wrap: break-word">
                    19h 30m</div>
                <div
                    style="width: 56.39px; height: 14px; justify-content: center; display: flex; flex-direction: column; color: black; font-size: 14px; font-family: Font Awesome 5 Pro; font-weight: 900; text-transform: capitalize; line-height: 14px; word-wrap: break-word">
                    </div>
                <div
                    style="justify-content: center; display: flex; flex-direction: column; color: #4D5756; font-size: 14px; font-family: Inter; font-weight: 400; text-transform: capitalize; line-height: 32px; word-wrap: break-word">
                    Tìm kiếm 20+</div>
            </div>
        </div>
        <div
            style="flex: 1 1 0; padding: 16px; background: white; box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.25); border-radius: 12px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 20px; display: inline-flex">
            <div style="width: 379px; height: 260px; position: relative">
                <img style="width: 379px; height: 260px; left: 0px; top: 0px; position: absolute; border-radius: 8px"
                    src="https://placehold.co/379x260" />
                <div
                    style="padding-left: 10px; padding-right: 10px; left: 16px; top: 16px; position: absolute; background: #FE543D; border-radius: 4px; justify-content: flex-start; align-items: center; gap: 10px; display: inline-flex">
                    <div
                        style="justify-content: center; display: flex; flex-direction: column; color: white; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 32px; word-wrap: break-word">
                        Development</div>
                </div>
            </div>
            <div
                style="align-self: stretch; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 8px; display: flex">
                <div
                    style="height: 24px; justify-content: flex-start; align-items: center; gap: 2px; display: inline-flex">
                    <div
                        style="width: 79.07px; height: 14px; justify-content: center; display: flex; flex-direction: column; color: #FFD25D; font-size: 14px; font-family: Font Awesome 5 Pro; font-weight: 900; line-height: 14px; word-wrap: break-word">
                        </div>
                    <div
                        style="justify-content: center; display: flex; flex-direction: column; color: #4D5756; font-size: 14px; font-family: Inter; font-weight: 500; line-height: 20px; word-wrap: break-word">
                        (4.7)</div>
                </div>
                <div
                    style="align-self: stretch; height: 90px; color: #0E2A46; font-size: 20px; font-family: Inter; font-weight: 600; text-transform: capitalize; line-height: 30px; word-wrap: break-word">
                    Các loại học bổng du học THPT Mỹ và điều kiện xin học bổng</div>
                <div
                    style="width: 10.70px; height: 14px; justify-content: center; display: flex; flex-direction: column; color: black; font-size: 14px; font-family: Font Awesome 5 Pro; font-weight: 900; text-transform: capitalize; line-height: 14px; word-wrap: break-word">
                    </div>
                <div
                    style="justify-content: center; display: flex; flex-direction: column; color: #4D5756; font-size: 14px; font-family: Inter; font-weight: 400; text-transform: capitalize; line-height: 32px; word-wrap: break-word">
                    Người xem: 10+</div>
                <div
                    style="width: 58.13px; height: 14px; justify-content: center; display: flex; flex-direction: column; color: black; font-size: 14px; font-family: Font Awesome 5 Pro; font-weight: 900; text-transform: capitalize; line-height: 14px; word-wrap: break-word">
                    </div>
                <div
                    style="width: 60.19px; height: 32px; justify-content: center; display: flex; flex-direction: column; color: #4D5756; font-size: 14px; font-family: Inter; font-weight: 400; text-transform: capitalize; line-height: 32px; word-wrap: break-word">
                    19h 30m</div>
                <div
                    style="width: 56.39px; height: 14px; justify-content: center; display: flex; flex-direction: column; color: black; font-size: 14px; font-family: Font Awesome 5 Pro; font-weight: 900; text-transform: capitalize; line-height: 14px; word-wrap: break-word">
                    </div>
                <div
                    style="justify-content: center; display: flex; flex-direction: column; color: #4D5756; font-size: 14px; font-family: Inter; font-weight: 400; text-transform: capitalize; line-height: 32px; word-wrap: break-word">
                    Tìm kiếm 20+</div>
            </div>
        </div>
    </div>
</div>
<div style="width: 100%; height: 860px; position: relative; background: white; overflow: hidden">
    <div
        style="width: 85px; height: 24px; position: absolute; top: 162px; left: 50%; transform: translateX(-50%); background-color: purple; -webkit-mask: url(<?= $base ?>/assets/img/client/img_home12.png) center/contain no-repeat; mask: url(<?= $base ?>/assets/img/client/img_home12.png) center/contain no-repeat;">
    </div>

    <!-- Card 1 -->
    <div
        style="display: flex; flex-direction: column; align-items: flex-start; padding: 12px; gap: 8px; position: absolute; width: 302px; height: 128px; left: 320px; top: 291.53px; background: #E6E9FC; border-radius: 12px;">
        <div style="display: flex; align-items: center; gap: 8px;">
            <img src="<?= $base ?>/assets/svgs/clients/ic_home7.svg" style="width: 17.40px; height: 17px;" />
            <div
                style="color: #0E2A46; font-size: 16px; font-family: Inter; font-weight: 600; text-transform: capitalize; line-height: 24px;">
                Kinh Nghiệm</div>
        </div>
        <div style="color: #4D5756; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px;">
            Gần 20 năm kinh nghiệm trong lĩnh vực du học, đối tác đáng tin cậy của 1.000 + trường trên thế giới.</div>
    </div>

    <!-- Card 2 -->
    <div
        style="display: flex; flex-direction: column; align-items: flex-start; padding: 12px; gap: 8px; position: absolute; width: 302px; height: 128px; left: 320px; top: 443.53px; background: #E6E9FC; border-radius: 12px;">
        <div style="display: flex; align-items: center; gap: 8px;">
            <img src="<?= $base ?>/assets/svgs/clients/ic_home7.svg" style="width: 17.40px; height: 17px;" />
            <div
                style="color: #0E2A46; font-size: 16px; font-family: Inter; font-weight: 600; text-transform: capitalize; line-height: 24px;">
                Tư vấn 24/7</div>
        </div>
        <div style="color: #4D5756; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px;">
            Đội ngũ chuyên viên tư vấn chuyên môn cao, xây dựng lộ trình giáo dục tốt nhất, tận tình giải đáp 24/7</div>
    </div>

    <!-- Card 3 -->
    <div
        style="display: flex; flex-direction: column; align-items: flex-start; padding: 12px; gap: 8px; position: absolute; width: 302px; height: 128px; left: 320px; top: 595.53px; background: #E6E9FC; border-radius: 12px;">
        <div style="display: flex; align-items: center; gap: 8px;">
            <img src="<?= $base ?>/assets/svgs/clients/ic_home7.svg" style="width: 17.40px; height: 17px;" />
            <div
                style="color: #0E2A46; font-size: 16px; font-family: Inter; font-weight: 600; text-transform: capitalize; line-height: 24px;">
                Đào tạo Chuyên Sâu</div>
        </div>
        <div style="color: #4D5756; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px;">
            Đào tạo ngoại ngữ, kiểm tra trình độ miễn phí, luyện thi chứng chỉ tiếng Anh đạt chuẩn đầu vào</div>
    </div>

    <!-- Card 4 -->
    <div
        style="display: flex; flex-direction: column; align-items: flex-start; padding: 12px; gap: 8px; position: absolute; width: 302px; height: 128px; left: 646px; top: 291.53px; background: #E6E9FC; border-radius: 12px;">
        <div style="display: flex; align-items: center; gap: 8px;">
            <img src="<?= $base ?>/assets/svgs/clients/ic_home7.svg" style="width: 17.40px; height: 17px;" />
            <div
                style="color: #0E2A46; font-size: 16px; font-family: Inter; font-weight: 600; text-transform: capitalize; line-height: 24px;">
                Chuyên Nghiệp, Minh Bạch</div>
        </div>
        <div style="color: #4D5756; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px;">
            Quy trình làm việc minh bạch, luôn tôn trọng và đặt lợi ích của khách hàng lên hàng đầu.</div>
    </div>

    <!-- Card 5 -->
    <div
        style="display: flex; flex-direction: column; align-items: flex-start; padding: 12px; gap: 8px; position: absolute; width: 302px; height: 128px; left: 646px; top: 443.53px; background: #E6E9FC; border-radius: 12px;">
        <div style="display: flex; align-items: center; gap: 8px;">
            <img src="<?= $base ?>/assets/svgs/clients/ic_home7.svg" style="width: 17.40px; height: 17px;" />
            <div
                style="color: #0E2A46; font-size: 16px; font-family: Inter; font-weight: 600; text-transform: capitalize; line-height: 24px;">
                Hướng dẫn nhiệt Tình</div>
        </div>
        <div style="color: #4D5756; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px;">
            Hướng dẫn làm hồ sơ chứng minh tài chính, xin visa với tỷ lệ đạt cao, săn học bổng giá trị lên đến 100%
        </div>
    </div>

    <!-- Card 6 -->
    <div
        style="display: flex; flex-direction: column; align-items: flex-start; padding: 12px; gap: 8px; position: absolute; width: 302px; height: 128px; left: 646px; top: 595.53px; background: #E6E9FC; border-radius: 12px;">
        <div style="display: flex; align-items: center; gap: 8px;">
            <img src="<?= $base ?>/assets/svgs/clients/ic_home7.svg" style="width: 17.40px; height: 17px;" />
            <div
                style="color: #0E2A46; font-size: 16px; font-family: Inter; font-weight: 600; text-transform: capitalize; line-height: 24px;">
                Luôn Kết Nối</div>
        </div>
        <div style="color: #4D5756; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px;">
            Giữ kết nối, chăm sóc và hỗ trợ học sinh trước khi bay, trong khi bay và sau khi bay</div>
    </div>

    <img style="width: 277px; height: 271px; left: 1378.50px; top: 66px; position: absolute"
        src="<?= $base ?>/assets/img/client/img_home14.png" />

    <div style="position: absolute; left: 320px; top: 179.53px; display: flex; align-items: center; gap: 18px;">
        <div
            style="width: 333px; height: 80px; font-family: 'Inter'; font-style: normal; font-weight: 700; font-size: 32px; line-height: 40px; display: flex; align-items: center; text-transform: capitalize; color: #0E2A46;">
            Tại sao nên chọn <br /> du học tại chúng tôi
        </div>
        <div
            style="width: 72px; height: 99px; font-family: 'Inter'; font-style: normal; font-weight: 700; font-size: 128px; line-height: 40px; display: flex; align-items: center; text-transform: capitalize; color: #2777C4;">
            ?
        </div>
    </div>

    <div style="width: 356.50px; height: 305px; left: 1243.50px; top: 491px; position: absolute; background: #FFD25D">
    </div>
    <div
        style="width: 356.50px; height: 305px; left: 1366.50px; top: 421px; position: absolute; transform: rotate(-180deg); transform-origin: top left; background: #FFD25D">
    </div>
    <img style="width: 530px; height: 620px; left: 1040px; top: 146px; position: absolute; outline: 10px white solid"
        src="<?= $base ?>/assets/img/client/img_home15.png" />
</div>


<div
    style="width: 100%; height: 575.89px; position: relative; overflow: hidden; background-image: url(<?= $base ?>/assets/img/client/img_home18.png)">
    <div
        style="width: 100%; height: 576px; left: 0px; top: 0px; position: absolute; opacity: 0.85; background: #0C4073">
    </div>
    <img style="width: 85px; height: 24px; left: 1758px; top: 111px; position: absolute"
        src="<?= $base ?>/assets/img/client/img_home12.png" />
    <img style="position: absolute;width: 431.93px;height: 591.13px;left: 1550px;"
        src="<?= $base ?>/assets/svgs/clients/ic_home8.svg" />
    <div
        style="width: 80px; height: 80px; left: 377px; top: 260px; position: absolute; background: #2FC7A1; border-radius: 9999px">
    </div>
    <div
        style="width: 193px; height: 210px; left: 321px; top: 300px; position: absolute; background: white; box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.50); border-radius: 12px; border-bottom: 2px #2FC7A1 solid">
    </div>
    <div
        style="width: 74px; height: 74px; left: 380px; top: 263px; position: absolute; background: white; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25); border-radius: 9999px">
    </div>
    <div
        style="width: 66px; height: 66px; left: 384px; top: 267px; position: absolute; background: white; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.25) inset; border-radius: 9999px">
    </div>
    <div
        style="left: 404px; top: 284px; position: absolute; text-align: center; justify-content: center; display: flex; flex-direction: column; color: #2FC7A1; font-size: 22px; font-family: Inter; font-weight: 700; line-height: 32px; word-wrap: break-word">
        01</div>
    <div
        style="left: 342px; top: 346px; position: absolute; text-align: center; justify-content: center; display: flex; flex-direction: column; color: black; font-size: 20px; font-family: Inter; font-weight: 600; line-height: 24px; word-wrap: break-word">
        Đăng ký<br />thông tin cơ bản</div>
    <div
        style="width: 169px; left: 333px; top: 402px; position: absolute; text-align: justify; justify-content: center; display: flex; flex-direction: column; color: #0E2A46; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
        Điền thông tin cá nhân, tài chính, nguyện vọng và khả năng ngoại ngữ.</div>
    <div
        style="width: 80px; height: 80px; left: 594px; top: 260px; position: absolute; background: #2FC7A1; border-radius: 9999px">
    </div>
    <div
        style="width: 193px; height: 210px; left: 538px; top: 300px; position: absolute; background: white; box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.50); border-radius: 12px; border-bottom: 2px #2FC7A1 solid">
    </div>
    <div
        style="width: 74px; height: 74px; left: 597px; top: 263px; position: absolute; background: white; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25); border-radius: 9999px">
    </div>
    <div
        style="width: 66px; height: 66px; left: 601px; top: 267px; position: absolute; background: white; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.25) inset; border-radius: 9999px">
    </div>
    <div
        style="left: 619px; top: 284px; position: absolute; text-align: center; justify-content: center; display: flex; flex-direction: column; color: #2FC7A1; font-size: 22px; font-family: Inter; font-weight: 700; line-height: 32px; word-wrap: break-word">
        02</div>
    <div
        style="left: 577px; top: 346px; position: absolute; text-align: center; justify-content: center; display: flex; flex-direction: column; color: black; font-size: 20px; font-family: Inter; font-weight: 600; line-height: 24px; word-wrap: break-word">
        Đăng ký mã<br />hồ sơ</div>
    <div
        style="width: 169px; left: 550px; top: 402px; position: absolute; text-align: justify; color: #0E2A46; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
        Đăng ký mã hồ sơ du học để có tên trên hệ thống và nhận hỗ trợ.</div>
    <div
        style="width: 80px; height: 80px; left: 811px; top: 260px; position: absolute; background: #2FC7A1; border-radius: 9999px">
    </div>
    <div
        style="width: 193px; height: 210px; left: 755px; top: 300px; position: absolute; background: white; box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.50); border-radius: 12px; border-bottom: 2px #2FC7A1 solid">
    </div>
    <div
        style="width: 74px; height: 74px; left: 814px; top: 263px; position: absolute; background: white; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25); border-radius: 9999px">
    </div>
    <div
        style="width: 66px; height: 66px; left: 818px; top: 267px; position: absolute; background: white; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.25) inset; border-radius: 9999px">
    </div>
    <div
        style="left: 836px; top: 284px; position: absolute; text-align: center; justify-content: center; display: flex; flex-direction: column; color: #2FC7A1; font-size: 22px; font-family: Inter; font-weight: 700; line-height: 32px; word-wrap: break-word">
        03</div>
    <div
        style="left: 796px; top: 346px; position: absolute; text-align: center; justify-content: center; display: flex; flex-direction: column; color: black; font-size: 20px; font-family: Inter; font-weight: 600; line-height: 24px; word-wrap: break-word">
        Tư vấn<br />chuyên sâu</div>
    <div
        style="width: 169px; left: 767px; top: 402px; position: absolute; text-align: justify; color: #0E2A46; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
        Đánh giá hồ sơ, tư vấn trường, ngành, xin thư mời nhập học, xin học bổng.</div>
    <div
        style="width: 80px; height: 80px; left: 1028px; top: 260px; position: absolute; background: #2FC7A1; border-radius: 9999px">
    </div>
    <div
        style="width: 193px; height: 210px; left: 972px; top: 300px; position: absolute; background: white; box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.50); border-radius: 12px; border-bottom: 2px #2FC7A1 solid">
    </div>
    <div
        style="width: 74px; height: 74px; left: 1031px; top: 263px; position: absolute; background: white; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25); border-radius: 9999px">
    </div>
    <div
        style="width: 66px; height: 66px; left: 1035px; top: 267px; position: absolute; background: white; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.25) inset; border-radius: 9999px">
    </div>
    <div
        style="left: 1053px; top: 284px; position: absolute; text-align: center; justify-content: center; display: flex; flex-direction: column; color: #2FC7A1; font-size: 22px; font-family: Inter; font-weight: 700; line-height: 32px; word-wrap: break-word">
        04</div>
    <div
        style="left: 1033px; top: 358px; position: absolute; text-align: center; justify-content: center; display: flex; flex-direction: column; color: black; font-size: 20px; font-family: Inter; font-weight: 600; line-height: 24px; word-wrap: break-word">
        Xin Visa</div>
    <div
        style="width: 169px; left: 984px; top: 402px; position: absolute; text-align: justify; color: #0E2A46; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
        Hoàn thiện hồ sơ, luyện phỏng vấn xin visa, học bổng và hướng dẫn đóng phí.</div>
    <div
        style="width: 80px; height: 80px; left: 1245px; top: 260px; position: absolute; background: #2FC7A1; border-radius: 9999px">
    </div>
    <div
        style="width: 193px; height: 210px; left: 1189px; top: 300px; position: absolute; background: white; box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.50); border-radius: 12px; border-bottom: 2px #2FC7A1 solid">
    </div>
    <div
        style="width: 74px; height: 74px; left: 1248px; top: 263px; position: absolute; background: white; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25); border-radius: 9999px">
    </div>
    <div
        style="width: 66px; height: 66px; left: 1252px; top: 267px; position: absolute; background: white; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.25) inset; border-radius: 9999px">
    </div>
    <div
        style="left: 1270px; top: 284px; position: absolute; text-align: center; justify-content: center; display: flex; flex-direction: column; color: #2FC7A1; font-size: 22px; font-family: Inter; font-weight: 700; line-height: 32px; word-wrap: break-word">
        05</div>
    <div
        style="left: 1236px; top: 358px; position: absolute; text-align: center; justify-content: center; display: flex; flex-direction: column; color: black; font-size: 20px; font-family: Inter; font-weight: 600; line-height: 24px; word-wrap: break-word">
        Nhận Visa</div>
    <div
        style="width: 169px; left: 1201px; top: 402px; position: absolute; text-align: justify; color: #0E2A46; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
        Hướng dẫn trước bay, thanh lý hợp đồng du học, nhận visa và chụp ảnh lưu niệm.</div>
    <div
        style="width: 80px; height: 80px; left: 1462px; top: 260px; position: absolute; background: #2FC7A1; border-radius: 9999px">
    </div>
    <div
        style="width: 193px; height: 210px; left: 1406px; top: 300px; position: absolute; background: white; box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.50); border-radius: 12px; border-bottom: 2px #2FC7A1 solid">
    </div>
    <div
        style="width: 74px; height: 74px; left: 1465px; top: 263px; position: absolute; background: white; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25); border-radius: 9999px">
    </div>
    <div
        style="width: 66px; height: 66px; left: 1469px; top: 267px; position: absolute; background: white; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.25) inset; border-radius: 9999px">
    </div>
    <div
        style="left: 1487px; top: 284px; position: absolute; text-align: center; justify-content: center; display: flex; flex-direction: column; color: #2FC7A1; font-size: 22px; font-family: Inter; font-weight: 700; line-height: 32px; word-wrap: break-word">
        06</div>
    <div
        style="left: 1439px; top: 346px; position: absolute; text-align: center; justify-content: center; display: flex; flex-direction: column; color: black; font-size: 20px; font-family: Inter; font-weight: 600; line-height: 24px; word-wrap: break-word">
        Hỗ trợ<br />quá trình học</div>
    <div
        style="width: 169px; left: 1418px; top: 402px; position: absolute; text-align: justify; color: #0E2A46; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
        Điền thông tin cá nhân, tài chính, nguyện vọng và khả năng ngoại ngữ.</div>
    <div
        style="width: 50.19px; height: 50.63px; left: 1573.63px; top: 195px; position: absolute; transform-origin: top left">
        <img src="<?= $base ?>/assets/svgs/clients/ic_home9.svg" />
    </div>
    <div style="width: 22px; height: 32.15px; left: 359px; top: 183px; position: absolute"><img
            src="<?= $base ?>/assets/svgs/clients/ic_location_2.svg"></div>
    <!-- Thanh ngang nối từ location đến target -->
    <svg style="position: absolute; left: 370px; top: 199px; width: 1229px; height: 6px; z-index: 1;"
        viewBox="0 0 1229 6" fill="none">
        <!-- Đường kẻ chính -->
        <line x1="0" y1="3" x2="1229" y2="3" stroke="#2FC7A1" stroke-width="3" stroke-linecap="round" />

        <!-- Các chấm nối tại vị trí icon location -->
        <circle cx="0" cy="3" r="5" fill="white" stroke="#2FC7A1" stroke-width="2" />

        <!-- Các chấm nối tại vị trí các card (từ card 01 đến 06) -->
        <circle cx="47" cy="3" r="5" fill="white" stroke="#2FC7A1" stroke-width="2" />
        <circle cx="264" cy="3" r="5" fill="white" stroke="#2FC7A1" stroke-width="2" />
        <circle cx="481" cy="3" r="5" fill="white" stroke="#2FC7A1" stroke-width="2" />
        <circle cx="698" cy="3" r="5" fill="white" stroke="#2FC7A1" stroke-width="2" />
        <circle cx="915" cy="3" r="5" fill="white" stroke="#2FC7A1" stroke-width="2" />
        <circle cx="1132" cy="3" r="5" fill="white" stroke="#2FC7A1" stroke-width="2" />

        <!-- Chấm cuối tại vị trí icon target -->
        <circle cx="1229" cy="3" r="5" fill="white" stroke="#2FC7A1" stroke-width="2" />
    </svg>

    <!-- Đường kẻ dọc nối từ thanh ngang xuống các số trong circle -->
    <svg style="position: absolute; left: 417px; top: 202px; width: 2px; height: 65px; z-index: 1;" viewBox="0 0 2 65">
        <line x1="1" y1="0" x2="1" y2="65" stroke="#2FC7A1" stroke-width="2" stroke-dasharray="4 4" />
    </svg>

    <svg style="position: absolute; left: 634px; top: 202px; width: 2px; height: 65px; z-index: 1;" viewBox="0 0 2 65">
        <line x1="1" y1="0" x2="1" y2="65" stroke="#2FC7A1" stroke-width="2" stroke-dasharray="4 4" />
    </svg>

    <svg style="position: absolute; left: 851px; top: 202px; width: 2px; height: 65px; z-index: 1;" viewBox="0 0 2 65">
        <line x1="1" y1="0" x2="1" y2="65" stroke="#2FC7A1" stroke-width="2" stroke-dasharray="4 4" />
    </svg>

    <svg style="position: absolute; left: 1068px; top: 202px; width: 2px; height: 65px; z-index: 1;" viewBox="0 0 2 65">
        <line x1="1" y1="0" x2="1" y2="65" stroke="#2FC7A1" stroke-width="2" stroke-dasharray="4 4" />
    </svg>

    <svg style="position: absolute; left: 1285px; top: 202px; width: 2px; height: 65px; z-index: 1;" viewBox="0 0 2 65">
        <line x1="1" y1="0" x2="1" y2="65" stroke="#2FC7A1" stroke-width="2" stroke-dasharray="4 4" />
    </svg>

    <svg style="position: absolute; left: 1502px; top: 202px; width: 2px; height: 65px; z-index: 1;" viewBox="0 0 2 65">
        <line x1="1" y1="0" x2="1" y2="65" stroke="#2FC7A1" stroke-width="2" stroke-dasharray="4 4" />
    </svg>
    <img style="width: 49px; height: 49px; left: 42px; top: 473px; position: absolute"
        src="<?= $base ?>/assets/img/client/img_home17.png" />
    <img style="width: 104px; height: 99px; left: 273px; top: 60px; position: absolute"
        src="<?= $base ?>/assets/img/client/img_home19.png" />
    <div
        style="left: 909px; top: 87px; position: absolute; justify-content: center; display: flex; flex-direction: column; color: white; font-size: 32px; font-family: Inter; font-weight: 600; text-transform: capitalize; line-height: 44px; word-wrap: break-word">
        Bước<br />du học cùng tôi</div>
    <div
        style="left: 753px; top: 99px; position: absolute; text-align: right; justify-content: center; display: flex; flex-direction: column; color: white; font-size: 24px; font-family: Inter; font-weight: 600; text-transform: capitalize; line-height: 32px; word-wrap: break-word">
        hành<br />trình</div>
    <img style="width: 152px; height: 48px; left: 999px; top: 78px; position: absolute"
        src="<?= $base ?>/assets/img/client/img_home16.png" />
    <div
        style="left: 821px; top: 90px; position: absolute; justify-content: center; display: flex; flex-direction: column; color: white; font-size: 120px; font-family: Inter; font-weight: 700; text-transform: capitalize; line-height: 80px; word-wrap: break-word">
        6</div>
</div>

<div
    style="width: 100%; height: 800px; position: relative; overflow: hidden; background-image: url(<?= $base ?>/assets/img/client/img_home20.png)">
    <!-- <img style="width: 225px; height: 225px; left: 698px; top: 70.11px; position: absolute"
        src="https://placehold.co/225x225" /> -->
    <div
        style="width: 699px; height: 364px; left: 373px; top: 345.11px; position: absolute; overflow: hidden; border-radius: 10px; background-image: url(https://placehold.co/699x364)">
        <img style="width: 800px; height: 500px; left: -84px; top: -127px; position: absolute"
            src="<?= $base ?>/assets/img/client/img_home23.png" />
    </div>
    <img style="width: 259px; height: 235px; left: 326px; top: 70.11px; position: absolute; border-radius: 10px"
        src="<?= $base ?>/assets/img/client/img_home21.png" />
    <img style="width: 174px; height: 174px; left: 627px; top: 131.11px; position: absolute; border-radius: 10px"
        src="<?= $base ?>/assets/img/client/img_home22.png" />
    <div style="width: 317px; height: 298px; left: 1313px; top: 410px; position: absolute; border-radius: 3px">
        <img src="<?= $base ?>/assets/svgs/clients/ic_home10.svg" />
    </div>
    <form id="consultation-form"
        style="width: 478px; padding-left: 20px; padding-right: 20px; padding-top: 24px; padding-bottom: 24px; left: 1122px; top: 170.11px; position: absolute; background: white; border-radius: 16px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 32px; display: inline-flex">
        <div
            style="align-self: stretch; flex-direction: column; justify-content: flex-start; align-items: center; gap: 12px; display: flex">
            <div
                style="justify-content: center; display: flex; flex-direction: column; color: #252525; font-size: 32px; font-family: Inter; font-weight: 700; line-height: 33.60px; word-wrap: break-word">
                Bạn muốn đi du học</div>
            <div
                style="justify-content: center; display: flex; flex-direction: column; color: rgba(37, 37, 37, 0.70); font-size: 18px; font-family: Inter; font-weight: 400; line-height: 25px; word-wrap: break-word">
                Hãy trao đổi với chuyên gia tư vấn ngay hôm nay</div>
        </div>
        <div
            style="align-self: stretch; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 24px; display: flex">
            <div
                style="align-self: stretch; padding-top: 12.50px; padding-bottom: 12.50px; padding-left: 12px; background: white; border-radius: 5px; outline: 1px #D4D4D4 solid; justify-content: flex-start; align-items: flex-start; display: inline-flex">
                <input type="text" name="full_name" required placeholder="Họ Tên *"
                    style="border: none; outline: none; width: 100%; font-size: 16px; font-family: Inter;">
            </div>
            <div
                style="align-self: stretch; padding-top: 12.50px; padding-bottom: 12.50px; padding-left: 12px; background: white; border-radius: 5px; outline: 1px #D4D4D4 solid; justify-content: flex-start; align-items: flex-start; display: inline-flex">
                <input type="tel" name="phone" required placeholder="Phone *"
                    style="border: none; outline: none; width: 100%; font-size: 16px; font-family: Inter;">
            </div>
            <div
                style="align-self: stretch; padding-top: 12.50px; padding-bottom: 12.50px; padding-left: 12px; background: white; border-radius: 5px; outline: 1px #D4D4D4 solid; justify-content: flex-start; align-items: flex-start; display: inline-flex">
                <input type="email" name="email" required placeholder="E-mail *"
                    style="border: none; outline: none; width: 100%; font-size: 16px; font-family: Inter;">
            </div>
            <div
                style="align-self: stretch; height: 49px; position: relative; background: white; border-radius: 5px; outline: 1px #D4D4D4 solid">
                <textarea name="message" placeholder="Mong muốn của bạn"
                    style="border: none; outline: none; width: 100%; height: 100%; padding: 12px; font-size: 16px; font-family: Inter; resize: none;"></textarea>
            </div>
        </div>
        <button type="submit"
            style="align-self: stretch; padding: 12px; background: #1B99D4; border-radius: 8px; justify-content: center; align-items: center; gap: 8px; display: inline-flex; border: none; cursor: pointer;">
            <div
                style="justify-content: center; display: flex; flex-direction: column; color: white; font-size: 16px; font-family: Inter; font-weight: 600; line-height: 24px; word-wrap: break-word">
                Đăng ký ngay</div>
            <img src="<?= $base ?>/assets/svgs/clients/ic_home11.svg" style="width: 12px; height: 11px" />
        </button>
    </form>
</div>
<div
    style="width: 100%; height: 600px; position: relative; overflow: hidden; background-image: url(<?= $base ?>/assets/img/client/img_home24.png)">
    <div
        style="width: 411px; padding: 24px; left: 320px; top: 211px; position: absolute; border-radius: 20px; outline: 1px #17254E solid; outline-offset: -1px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 16px; display: inline-flex">
        <div
            style="align-self: stretch; text-align: justify; color: #333931; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
            Em vô tình biết đến VNPC qua Facebook, bản thân lại không tin tưởng mấy trung tâm tư vấn lắm nhưng vẫn liều
            tới thử xem sao. Nhưng thật sự, em đã bị thuyết phục bởi sự tận tâm, nhiệt tình, tính minh bạch và tốc độ xử
            lý hồ sơ của trung tâm. Cảm ơn trung tâm đã giúp em sớm thực hiện được giấc mơ du học Úc.</div>
        <div style="justify-content: flex-start; align-items: center; gap: 12px; display: inline-flex">
            <div
                style="width: 50px; height: 50px; position: relative; overflow: hidden; border-radius: 50px; background-image: url(https://placehold.co/50x50)">
                <img style="width: 56px; height: 56px; left: -3px; top: -3px; position: absolute"
                    src="https://placehold.co/56x56" />
            </div>
            <div
                style="width: 120.67px; height: 18.70px; justify-content: center; display: flex; flex-direction: column; color: #0E2A46; font-size: 16px; font-family: Inter; font-weight: 700; line-height: 18.70px; word-wrap: break-word">
                Minh Khoa</div>
        </div>
        <div
            style="left: -19px; top: -24px; position: absolute; justify-content: flex-start; align-items: center; gap: 4px; display: inline-flex">
            <div style="width: 33.41px; height: 45.03px; background: #75777E"></div>
            <div style="width: 33.41px; height: 45.03px; background: #75777E"></div>
        </div>
    </div>
    <div
        style="width: 411px; padding: 24px; left: 755px; top: 211px; position: absolute; border-radius: 20px; outline: 1px #17254E solid; outline-offset: -1px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 16px; display: inline-flex">
        <div
            style="align-self: stretch; text-align: justify; color: #333931; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
            Tôi có đưa con trai trai đến VNPC nhận tư vấn du học Úc và thấy khá hài lòng với cách tư vấn nhiệt tình,
            chuyên nghiệp của công ty. Công ty còn xử lý hồ sơ rất nhanh, minh bạch mọi khoản chi phí và rất có trách
            nhiệm.</div>
        <div style="justify-content: flex-start; align-items: center; gap: 12px; display: inline-flex">
            <div
                style="width: 50px; height: 50px; position: relative; overflow: hidden; border-radius: 50px; background-image: url(https://placehold.co/50x50)">
                <img style="width: 56px; height: 56px; left: -3px; top: -3px; position: absolute"
                    src="https://placehold.co/56x56" />
                <img style="width: 50px; height: 50px; left: 0px; top: 0.11px; position: absolute"
                    src="https://placehold.co/50x50" />
            </div>
            <div
                style="width: 120.67px; height: 18.70px; justify-content: center; display: flex; flex-direction: column; color: #0E2A46; font-size: 16px; font-family: Inter; font-weight: 700; text-transform: capitalize; line-height: 18.70px; word-wrap: break-word">
                hải yến</div>
        </div>
        <div
            style="left: -19px; top: -24px; position: absolute; justify-content: flex-start; align-items: center; gap: 4px; display: inline-flex">
            <div style="width: 33.41px; height: 45.03px; background: #75777E"></div>
            <div style="width: 33.41px; height: 45.03px; background: #75777E"></div>
        </div>
    </div>
    <div
        style="width: 411px; padding: 24px; left: 1190px; top: 211px; position: absolute; border-radius: 20px; outline: 1px #17254E solid; outline-offset: -1px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 16px; display: inline-flex">
        <div
            style="align-self: stretch; text-align: justify; color: #333931; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
            Luôn ủng hộ VNPC, các bạn rất tận tình và có tâm trong công việc. Mình được bạn thân giới thiệu đến VNPC và
            vô cùng ấn tượng với phong cách làm việc chuyên nghiệp tại đây. Từ không gian văn phòng, thái độ nhân viên
            đến quy trình làm việc đều rất tốt. Chúc VNPC ngày càng phát triển hơn nữa trong tương lai.</div>
        <div style="justify-content: flex-start; align-items: center; gap: 12px; display: inline-flex">
            <div
                style="width: 50px; height: 50px; position: relative; overflow: hidden; border-radius: 50px; background-image: url(https://placehold.co/50x50)">
                <img style="width: 56px; height: 56px; left: -3px; top: -3px; position: absolute"
                    src="https://placehold.co/56x56" />
                <img style="width: 86px; height: 115px; left: -29px; top: -42.89px; position: absolute"
                    src="https://placehold.co/86x115" />
            </div>
            <div
                style="justify-content: center; display: flex; flex-direction: column; color: #0E2A46; font-size: 16px; font-family: Inter; font-weight: 700; text-transform: capitalize; line-height: 18.70px; word-wrap: break-word">
                hoàng quân</div>
        </div>
        <div
            style="left: -19px; top: -24px; position: absolute; justify-content: flex-start; align-items: center; gap: 4px; display: inline-flex">
            <div style="width: 33.41px; height: 45.03px; background: #75777E"></div>
            <div style="width: 33.41px; height: 45.03px; background: #75777E"></div>
        </div>
    </div>
    <div
        style="left: 926px; top: 539.11px; position: absolute; justify-content: flex-start; align-items: flex-start; gap: 4px; display: inline-flex">
        <div style="width: 33px; height: 8px; background: #1B99D4; border-radius: 4px"></div>
        <div style="width: 8px; height: 8px; background: #6E6E6E; border-radius: 9999px"></div>
        <div style="width: 8px; height: 8px; background: #6E6E6E; border-radius: 9999px"></div>
        <div style="width: 8px; height: 8px; background: #6E6E6E; border-radius: 9999px"></div>
    </div>
    <div
        style="left: 693px; top: 71.11px; position: absolute; flex-direction: column; justify-content: flex-start; align-items: center; gap: 12px; display: inline-flex">
        <div
            style="justify-content: center; display: flex; flex-direction: column; color: #0E2A46; font-size: 32px; font-family: Inter; font-weight: 700; text-transform: capitalize; line-height: 40px; word-wrap: break-word">
            ý kiến Khách hàng</div>
        <div
            style="color: #0E2A46; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
            Cùng xem khách hàng nói gì về chúng tôi sau những trải nghiệm thú vị.</div>
    </div>
</div>

<!-- <div
    style="width: 1280px; flex-direction: column; justify-content: flex-start; align-items: center; gap: 30px; display: inline-flex">
    <div style="flex-direction: column; justify-content: flex-start; align-items: center; gap: 12px; display: flex">
        <div
            style="justify-content: center; display: flex; flex-direction: column; color: #0E2A46; font-size: 32px; font-family: Inter; font-weight: 700; text-transform: capitalize; line-height: 40px; word-wrap: break-word">
            thông tin Du học quốc tế</div>
        <div
            style="color: #0E2A46; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
            Chia sẻ thông tin du học, học bổng của các trường đại học hàng đầu thế giới</div>
    </div>
    <div
        style="width: 519px; padding: 12px; background: white; box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.25); border-radius: 8px; justify-content: flex-start; align-items: flex-start; gap: 12px; display: inline-flex">
        <div style="width: 190px; height: 190px; position: relative; overflow: hidden; border-radius: 8px">
            <div style="width: 190px; height: 207.55px; left: 0px; top: 0px; position: absolute">
                <img style="width: 190px; height: 207.55px; left: 0px; top: 0px; position: absolute; border-radius: 10px"
                    src="https://placehold.co/190x208" />
            </div>
            <img style="width: 350px; height: 196px; left: -72px; top: -5px; position: absolute"
                src="https://placehold.co/350x196" />
        </div>
        <div
            style="flex: 1 1 0; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 8px; display: inline-flex">
            <div
                style="width: 13.48px; height: 9.38px; justify-content: center; display: flex; flex-direction: column; color: #0E2A46; font-size: 15px; font-family: Font Awesome 5 Pro; font-weight: 900; line-height: 15px; word-wrap: break-word">
                </div>
            <div
                style="width: 77px; height: 20px; justify-content: center; display: flex; flex-direction: column; color: #4D5756; font-size: 14px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
                30/12/2025</div>
            <div
                style="width: 17.08px; height: 9.38px; justify-content: center; display: flex; flex-direction: column; color: #0E2A46; font-size: 15px; font-family: Font Awesome 5 Pro; font-weight: 900; line-height: 15px; word-wrap: break-word">
                </div>
            <div
                style="width: 92px; height: 20px; justify-content: center; display: flex; flex-direction: column; color: #4D5756; font-size: 14px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
                Bình luận (06)</div>
            <div
                style="align-self: stretch; height: 84px; justify-content: center; display: flex; flex-direction: column; color: black; font-size: 20px; font-family: Inter; font-weight: 600; line-height: 28px; word-wrap: break-word">
                Ngày hội du học toàn cầu 2026: Săn học bổng – Tiết kiệm chi phí – Định hướng nghề nghiệp quốc tế</div>
            <div
                style="width: 289px; height: 70px; color: black; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 22px; word-wrap: break-word">
                Ngày hội Du học Toàn cầu 2026 của chính thức trở lại, mở ra không gian trải nghiệm giáo dục quốc tế đầy
                cảm hứng và cơ hội. Sự kiện cung cấp thông tin từ các quốc gia Úc, Anh, Canada, New Zealand, Singapore,
                Đức, Hà Lan, Phần Lan, Thụy Sĩ, Tây Ban Nha và Hàn Quốc, giúp sinh viên tìm hiểu chi tiết về chương
                trình học, học bổng, lộ trình du học và cơ hội nghề nghiệp. </div>
        </div>
    </div>
    <div
        style="width: 519px; padding: 12px; background: white; box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.25); border-radius: 8px; justify-content: flex-start; align-items: flex-start; gap: 12px; display: inline-flex">
        <div style="width: 190px; height: 190px; position: relative; overflow: hidden; border-radius: 8px">
            <div style="width: 190px; height: 207.55px; left: 0px; top: 0px; position: absolute">
                <img style="width: 190px; height: 207.55px; left: 0px; top: 0px; position: absolute; border-radius: 10px"
                    src="https://placehold.co/190x208" />
            </div>
            <img style="width: 336px; height: 197px; left: -130px; top: -5px; position: absolute"
                src="https://placehold.co/336x197" />
        </div>
        <div
            style="flex: 1 1 0; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 8px; display: inline-flex">
            <div
                style="width: 13.48px; height: 9.38px; justify-content: center; display: flex; flex-direction: column; color: #0E2A46; font-size: 15px; font-family: Font Awesome 5 Pro; font-weight: 900; line-height: 15px; word-wrap: break-word">
                </div>
            <div
                style="width: 77px; height: 20px; justify-content: center; display: flex; flex-direction: column; color: #4D5756; font-size: 14px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
                30/12/2025</div>
            <div
                style="width: 17.08px; height: 9.38px; justify-content: center; display: flex; flex-direction: column; color: #0E2A46; font-size: 15px; font-family: Font Awesome 5 Pro; font-weight: 900; line-height: 15px; word-wrap: break-word">
                </div>
            <div
                style="width: 92px; height: 20px; justify-content: center; display: flex; flex-direction: column; color: #4D5756; font-size: 14px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
                Bình luận (06)</div>
            <div
                style="align-self: stretch; height: 84px; justify-content: center; display: flex; flex-direction: column; color: black; font-size: 20px; font-family: Inter; font-weight: 600; line-height: 28px; word-wrap: break-word">
                Du học Anh tại University of Winchester: Học bổng và cơ hội nghề nghiệp</div>
            <div
                style="width: 289px; height: 70px; color: black; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 22px; word-wrap: break-word">
                Giữa lòng nước Anh cổ kính, University of Winchester nổi bật như một lựa chọn thông minh cho những ai
                tìm kiếm nền giáo dục chất lượng cao nhưng không muốn bị cuốn vào nhịp sống đắt đỏ và áp lực của London.
                Tọa lạc tại Winchester – thủ đô đầu tiên của Vương quốc Anh và chỉ cách London khoảng một giờ di chuyển,
                trường mang đến môi trường học tập an toàn, yên bình cùng cơ hội nghề nghiệp rộng mở. Với hơn 185 năm
                lịch sử đào tạo, Đại học Winchester chinh phục sinh viên quốc tế nhờ quy mô lớp học nhỏ, định hướng
                giảng dạy thực tiễn và tỷ lệ sinh viên tốt nghiệp có việc làm thuộc nhóm cao tại Anh.</div>
        </div>
    </div>
    <div
        style="width: 519px; padding: 12px; background: white; box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.25); border-radius: 8px; justify-content: flex-start; align-items: flex-start; gap: 12px; display: inline-flex">
        <div style="width: 190px; height: 190px; position: relative; overflow: hidden; border-radius: 8px">
            <div style="width: 190px; height: 207.55px; left: 0px; top: 0px; position: absolute">
                <img style="width: 190px; height: 207.55px; left: 0px; top: 0px; position: absolute; border-radius: 10px"
                    src="https://placehold.co/190x208" />
            </div>
            <img style="width: 297px; height: 198px; left: -99px; top: -4px; position: absolute"
                src="https://placehold.co/297x198" />
        </div>
        <div
            style="flex: 1 1 0; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 8px; display: inline-flex">
            <div
                style="width: 13.48px; height: 9.38px; justify-content: center; display: flex; flex-direction: column; color: #0E2A46; font-size: 15px; font-family: Font Awesome 5 Pro; font-weight: 900; line-height: 15px; word-wrap: break-word">
                </div>
            <div
                style="width: 77px; height: 20px; justify-content: center; display: flex; flex-direction: column; color: #4D5756; font-size: 14px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
                30/12/2025</div>
            <div
                style="width: 17.08px; height: 9.38px; justify-content: center; display: flex; flex-direction: column; color: #0E2A46; font-size: 15px; font-family: Font Awesome 5 Pro; font-weight: 900; line-height: 15px; word-wrap: break-word">
                </div>
            <div
                style="width: 92px; height: 20px; justify-content: center; display: flex; flex-direction: column; color: #4D5756; font-size: 14px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
                Bình luận (06)</div>
            <div
                style="align-self: stretch; height: 84px; justify-content: center; display: flex; flex-direction: column; color: black; font-size: 20px; font-family: Inter; font-weight: 600; line-height: 28px; word-wrap: break-word">
                Du học trường Health Sciences University: Điều kiện, chi phí và học bổng</div>
            <div
                style="width: 289px; height: 70px; color: black; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 22px; word-wrap: break-word">
                Giữa trung tâm London sôi động, Health Sciences University (HSU) nổi bật như điểm đến lý tưởng cho những
                ai theo đuổi sự nghiệp trong lĩnh vực y tế và chăm sóc sức khỏe. Với định hướng đào tạo gắn liền thực
                tiễn, chương trình học chuyên sâu và vị trí chiến lược gần các bệnh viện, tổ chức y tế lớn, HSU không
                chỉ trang bị cho sinh viên nền tảng học thuật vững chắc mà còn mở ra cơ hội việc làm, thực tập và định
                cư lâu dài tại Vương quốc Anh. Đây là lựa chọn thông minh cho những ai mong muốn xây dựng sự nghiệp bền
                vững trong hệ thống y tế toàn cầu. </div>
        </div>
    </div>
    <div
        style="width: 737px; padding: 12px; background: white; box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.25); border-radius: 8px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 8px; display: flex">
        <div style="align-self: stretch; height: 486px; position: relative; overflow: hidden; border-radius: 8px">
            <div style="width: 713px; height: 207.55px; left: 0px; top: 0px; position: absolute">
                <img style="width: 713px; height: 207.55px; left: 0px; top: 0px; position: absolute; border-radius: 10px"
                    src="https://placehold.co/713x208" />
            </div>
            <img style="width: 993px; height: 605px; left: -3px; top: -40px; position: absolute"
                src="https://placehold.co/993x605" />
        </div>
        <div
            style="width: 13.48px; height: 9.38px; justify-content: center; display: flex; flex-direction: column; color: #0E2A46; font-size: 15px; font-family: Font Awesome 5 Pro; font-weight: 900; line-height: 15px; word-wrap: break-word">
            </div>
        <div
            style="width: 77px; height: 20px; justify-content: center; display: flex; flex-direction: column; color: #4D5756; font-size: 14px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
            30/12/2025</div>
        <div
            style="width: 17.08px; height: 9.38px; justify-content: center; display: flex; flex-direction: column; color: #0E2A46; font-size: 15px; font-family: Font Awesome 5 Pro; font-weight: 900; line-height: 15px; word-wrap: break-word">
            </div>
        <div
            style="width: 92px; height: 20px; justify-content: center; display: flex; flex-direction: column; color: #4D5756; font-size: 14px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
            Bình luận (06)</div>
        <div
            style="align-self: stretch; color: black; font-size: 20px; font-family: Inter; font-weight: 600; line-height: 28px; word-wrap: break-word">
            Học bổng NZSS 2026: 56 trường được nhận học bổng chỉnh phủ New Zealand bậc trung học</div>
        <div
            style="align-self: stretch; height: 72px; color: black; font-size: 16px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word">
            Học bổng NZSS là chương trình học bổng danh giá dành cho học sinh quốc tế mong muốn theo học tại các trường
            trung học hàng đầu New Zealand. Đây là “tấm vé vàng” giúp bạn tiếp cận nền giáo dục hiện đại trong môi
            trường học an toàn, thân thiện và giàu trải nghiệm quốc tế. Đặc biệt, chương trình chỉ áp dụng cho 56 trường
            trung học uy tín trên toàn New Zealand, đảm bảo chất lượng đào tạo và lộ trình phát triển vững chắc cho học
            sinh. Nếu bạn quan tâm đến học bổng NZSS , hãy tiếp tục khám phá chi tiết chương trình, danh sách các trường
            tham gia và mốc thời gian đăng ký để không bỏ lỡ cơ hội tuyệt vời này!</div>
    </div>
</div> -->

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
            const btn = form.querySelector('button[type="submit"]');
            const originalText = btn.innerHTML;
            // btn.innerHTML = 'Đang gửi...';
            // btn.disabled = true;

            const formData = new FormData(this);

            // Adjust the URL if your project is in a subdirectory
            fetch('/php-duhoc/public/consultation/register', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);

                        // Send notification to Firebase
                        if (typeof firebase !== 'undefined') {
                            const newRef = firebase.database().ref('notifications').push();
                            newRef.set({
                                type: 'new_consultation',
                                data: {
                                    name: formData.get('full_name'),
                                    phone: formData.get('phone'),
                                    email: formData.get('email'),
                                    message: formData.get('message')
                                },
                                timestamp: firebase.database.ServerValue.TIMESTAMP,
                                read: false
                            });
                        } else {
                            console.error('Firebase not loaded');
                        }

                        form.reset();
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => {
                    console.error('hihi:', error);
                    alert('Có lỗi xảy ra khi gửi đăng ký.');
                })
                .finally(() => {
                    // btn.innerHTML = originalText;
                    // btn.disabled = false;
                });
        });
    }
});
</script>