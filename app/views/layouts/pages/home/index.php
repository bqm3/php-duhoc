<!-- // views/layouts/pages/home/index.php -->
<?php if (!isset($base))
    $base = ''; ?>

<?php

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

<?php include __DIR__ . '/sections/hero.php'; ?>
<div class="d-none d-md-block">
    <?php include __DIR__ . '/sections/spacing.php'; ?>
</div>
<?php include __DIR__ . '/sections/about.php'; ?>
<div class="d-none d-md-block">
    <?php include __DIR__ . '/sections/spacing.php'; ?>
    <?php include __DIR__ . '/sections/strip.php'; ?>
    <?php include __DIR__ . '/sections/spacing.php'; ?>
</div>
<?php include __DIR__ . '/sections/countries.php'; ?>
<?php include __DIR__ . '/sections/scholarships.php'; ?>
<?php include __DIR__ . '/sections/why.php'; ?>
<?php include __DIR__ . '/sections/process.php'; ?>
<?php include __DIR__ . '/sections/consult.php'; ?>
<?php include __DIR__ . '/sections/testimonials.php'; ?>
<?php include __DIR__ . '/sections/blogs.php'; ?>

<?php
include __DIR__ . '/sections/partners.php';
?>