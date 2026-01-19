<?php if (!isset($base))
    $base = ''; 

$overview_checks = [
    'Đội ngũ nhân sự gồm những cựu du học sinh và chuyên viên tư vấn thân thiện, dày dặn kinh nghiệm, am hiểu sâu về dịch vụ du học, luôn tận tình hỗ trợ mọi lúc mọi nơi mang đến những thông tin nhanh nhất, mới nhất về học bổng, trường, ngành học,....',
    'Là đối tác và đại diện tuyển sinh chính thức của nhiều trường THPT, cao đẳng, đại học, tổ chức giáo dục danh tiếng ở hơn 30 quốc gia và vùng lãnh thổ trên toàn thế giới.',
    'Hỗ trợ giải đáp mọi thắc mắc trước, trong và sau khi du học giúp học sinh, sinh viên hiện thực hóa giấc mơ du học.',
    'Tỷ lệ học sinh, sinh viên nộp hồ sơ đạt visa cao, săn thành công học bổng giá trị lên tới 100%.',
    'Quy trình tư vấn, xử lý hồ sơ nhanh chóng, minh bạch mọi thông tin và chi phí.'
];

$vision_mission_values = [
    [
        'title' => 'TẦM NHÌN',
        'desc' => 'Trở thành công ty tư vấn du học uy tín hàng đầu tại Việt Nam, được học sinh, phụ huynh và đối tác tin cậy nhờ chất lượng dịch vụ chuyên sâu, minh bạch và hiệu quả. Không ngừng mở rộng và củng cố mạng lưới đối tác giáo dục trên toàn thế giới, hợp tác chặt chẽ với các trường học, tổ chức giáo dục và cơ quan đào tạo quốc tế nhằm mang đến nhiều lựa chọn học tập đa dạng, chất lượng cao cho học sinh Việt Nam.',
        'icon' => 'ic_home13.svg',
        'class' => 'vnpc-card-dashed'
    ],
    [
        'title' => 'SỨ MỆNH',
        'desc' => 'Với học sinh, sinh viên: Hỗ trợ học sinh, sinh viên Việt Nam nhanh chóng tiếp cận và hội nhập với nền văn minh thế giới thông qua con đường giáo dục, học tập và chia sẻ kiến thức. Đối với các đối tác: Đảm bảo chất lượng học sinh, sinh viên phù hợp với các tiêu chí giáo dục quốc tế nói chung và tiêu chí của từng trường đối tác nói riêng. Đối với nhân viên: Tạo ra môi trường làm việc năng động, thoải mái về vật chất và tinh thần nhằm khuyến khích nhân viên tạo ra những giá trị mới cho khách hàng.',
        'icon' => 'ic_home14.svg',
        'class' => 'vnpc-card-highlight'
    ],
    [
        'title' => 'GIÁ TRỊ CỐT LÕI',
        'desc' => 'Uy tín: Chúng tôi chiếm được cảm tình và gây dựng uy tín với khách hàng, đối tác bởi quy trình làm việc minh bạch với thái độ tôn trọng. Tận Tâm: Chúng tôi quan tâm và sát sao đến yêu cầu cụ thể của từng cá nhân, đặt lợi ích khách hàng lên hàng đầu bởi thành công của khách hàng là mục tiêu của chúng tôi. Chuyên nghiệp: Với kinh nghiệm lâu năm, chúng tôi đảm bảo mang lại cho khách hàng dịch vụ và giải pháp nhanh chóng, hợp lý và hiệu quả nhất.',
        'icon' => 'ic_home15.svg',
        'class' => 'vnpc-card-dashed'
    ]
];

$services_before = [
    'Kiểm tra trình độ ngoại ngữ miễn phí, tư vấn lộ trình luyện thi các chứng chỉ ngoại ngữ IELTS - Tiếng Anh, Nat-Test - Tiếng Nhật, Topik - Tiếng Hàn cấp tốc.',
    'Dịch thuật đa ngôn ngữ.',
    'Tư vấn, cung cấp tài liệu, chọn trường, ngành phù hợp with năng lực và sở thích.',
    'Hỗ trợ làm thủ tục và luyện phỏng vấn xin visa, đảm bảo tỷ lệ đỗ cao.',
    'Tư vấn lộ trình du học và định cư.',
    'Xin thư mời nhập học các trường, hướng dẫn thủ tục tài chính xin Visa du học, thăm thân, công tác.',
    'Hướng dẫn xây dựng bài luận cá nhân và luyện phỏng vấn xin học bổng xuất sắc.',
    'Hướng dẫn đóng học phí và sinh hoạt phí cho du học sinh.',
    'Hỗ trợ tìm nhà ở, đặt vé máy bay, đưa đón sân bay.',
    'Mua bảo hiểm y tế, bảo hiểm tai nạn cho du học sinh.'
];

$services_during = [
    'Hỗ trợ gia đình và học sinh trong quá trình học tập tại nước ngoài, hướng dẫn hồ sơ pháp lý, xin gia hạn hồ sơ Visa.',
    'Hỗ trợ làm hồ sơ thăm thân, du lịch, công tác.',
    'Giữ liên lạc và hỗ trợ du học sinh và gia đình qua Email/ Facebook/ Viber/ Zalo/ Điện thoại 24/07.',
    'Hỗ trợ chuyển trường cho du học sinh.'
];

$services_after = [
    'Cung cấp thông tin các khóa học phù hợp khi học sinh muốn tiếp tục chương trình.',
    'Tư vấn chuyển trường, chuyển lớp, chuyển khóa học, chuyển đất nước du học.',
    'Hỗ trợ xin gia hạn Visa cho du học sinh.',
    'Giới thiệu học sinh với những bên có nhu cầu làm việc tại nước ngoài.'
];
?>

<!-- Hero / Breadcrumb Section -->
<?php partial('layouts/pages/base/base_hero', ['title' => 'Giới thiệu']) ?>

<!-- Overview Section -->
<section class="vnpc-about-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="vnpc-about-img-group">
                    <img src="<?= $base ?>/assets/img/client/img_home31.png" class="vnpc-about-img-1" alt="Overview 1">
                    <img src="<?= $base ?>/assets/img/client/img_home30.png" class="vnpc-about-img-2" alt="Overview 2">
                    <img src="<?= $base ?>/assets/img/client/img_home29.png" class="vnpc-about-deco" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="vnpc-about-content">
                    <h2 class="section-title-blue">Tổng quan về văn phòng tư vấn du học</h2>
                    <p class="section-desc">
                        Thành lập năm 2006 cùng mạng lưới đối tác rộng khắp thế giới, tư vấn du học VNPC đã và đang là
                        một trong những "con chim đầu đàn" trong lĩnh vực du học. Không chỉ đồng hành cùng nhiều bạn trẻ
                        chinh phục giấc mơ trở thành du học sinh, VNPC còn là đối tác đáng tin cậy của các trường đại
                        học và cao đẳng danh tiếng ở Úc, Thụy Sỹ, Anh, Singapore, New Zealand, Mỹ, Canada, … VNPC cam
                        kết mang đến cho Quý khách hàng những dịch vụ toàn diện, đáng tin cậy và chất lượng nhất. Trong
                        gần 20 năm hoạt động, VNPC được hàng ngàn học sinh, sinh viên tin tưởng và lựa chọn bởi sở hữu
                        nhiều ưu điểm vượt trội như:
                    </p>
                    <div class="vnpc-about-check-group">
                        <?php foreach($overview_checks as $check): ?>
                        <div class="check-item">
                            <img src="<?= $base ?>/assets/svgs/clients/ic_home7.svg" class="check-icon" alt="Check">
                            <span class="check-text"><?= $check ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision - Mission Section -->
<section class="vnpc-vision-section"
    style="background-image: url('<?= $base ?>/assets/img/client/img_background2.png'); background-size: cover; background-position: center;">
    <div class="container text-center vnpc-vision-header">
        <h2 class="vnpc-vision-main-title">Tầm nhìn - Sứ mệnh - Giá trị cốt lõi</h2>
    </div>
    <div class="container">
        <div class="row g-4 vnpc-vision-cards-row">
            <?php foreach($vision_mission_values as $item): ?>
            <div class="col-lg-4 col-md-6 <?= $item['class'] === 'vnpc-card-highlight' ? 'text-white' : '' ?>">
                <div class="vnpc-vision-card <?= $item['class'] ?>">
                    <div class="vnpc-vision-icon-outer">
                        <div class="vnpc-vision-icon-inner">
                            <img src="<?= $base ?>/assets/svgs/clients/<?= $item['icon'] ?>" alt="<?= $item['title'] ?>">
                        </div>
                    </div>
                    <h4 class="vnpc-vision-card-title"><?= $item['title'] ?></h4>
                    <p class="vnpc-vision-card-desc"><?= $item['desc'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Services Before Study Abroad -->
<section class="vnpc-services-before">
    <!-- Decorative background elements -->
    <div class="vnpc-before-deco-red"></div>
    <img src="<?= $base ?>/assets/svgs/clients/ic_home19.svg" class="vnpc-before-deco-green-1">
    <img src="<?= $base ?>/assets/svgs/clients/ic_home18.svg" class="vnpc-before-deco-green-2">
    <img src="<?= $base ?>/assets/svgs/clients/ic_home17.svg" class="vnpc-before-deco-orange">
    <div class="vnpc-before-dots-group">
        <?php for ($i = 0; $i < 45; $i++): ?><span></span><?php endfor; ?>
    </div>

    <div class="container position-relative z-index-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="vnpc-services-content">
                    <h2 class="vnpc-services-title">Những dịch vụ cung cấp trước du học</h2>
                    <div class="vnpc-services-list">
                        <?php foreach($services_before as $service): ?>
                        <div class="vnpc-service-item-new">
                            <img src="<?= $base ?>/assets/svgs/clients/ic_home16.svg" class="service-icon-new">
                            <p class="service-text-new"><?= $service ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="vnpc-services-img-group">
                    <img src="<?= $base ?>/assets/img/client/img_home32.png" class="vnpc-services-img-main"
                        alt="Services">
                    <div class="vnpc-services-img-dots"></div>
                </div>
            </div>
        </div> 
    </div>
</section>

<!-- Services During & After -->
<section class="vnpc-services-after">
    <div class="container text-center mb-5">
        <h2 class="vnpc-services-main-title">Những dịch vụ cung cấp trong và sau quá trình du học</h2>
    </div>
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-6">
                <div class="vnpc-card-service-v2">
                    <h3 class="vnpc-card-service-v2-title">dịch vụ cung cấp trong quá trình du học</h3>
                    <div class="vnpc-card-service-v2-list">
                        <?php foreach($services_during as $service): ?>
                        <div class="vnpc-card-service-v2-item">
                            <img src="<?= $base ?>/assets/svgs/clients/ic_home7.svg" class="service-icon-v2"
                                alt="Check">
                            <p class="service-text-v2"><?= $service ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="vnpc-card-service-v2">
                    <h3 class="vnpc-card-service-v2-title">dịch vụ cung cấp sau quá trình du học</h3>
                    <div class="vnpc-card-service-v2-list">
                        <?php foreach($services_after as $service): ?>
                        <div class="vnpc-card-service-v2-item">
                            <img src="<?= $base ?>/assets/svgs/clients/ic_home7.svg" class="service-icon-v2"
                                alt="Check">
                            <p class="service-text-v2"><?= $service ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>