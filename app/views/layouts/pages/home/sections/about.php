<?php if (!isset($base)) $base = ''; ?>

<section class="vnpc-section vnpc-about" aria-labelledby="about-vnpc">
  <div class="container-xxl position-relative">
    <div class="row align-items-center g-5">

      <!-- LEFT: IMAGE GRID -->
      <div class="col-lg-6">
        <div class="vnpc-about-photos">

          <img
            class="a1"
            src="<?= $base ?>/assets/img/client/img_home8.png"
            alt="Tư vấn du học VNPC đồng hành cùng du học sinh"
            loading="lazy"
          >

          <img
            class="a2"
            src="<?= $base ?>/assets/img/client/img_home9.png"
            alt="Học sinh VNPC tại các trường đại học quốc tế"
            loading="lazy"
          >

          <img
            class="a-badge"
            src="<?= $base ?>/assets/svgs/clients/ic_home1.svg"
            alt="Gần 20 năm kinh nghiệm tư vấn du học"
            loading="lazy"
          >

          <!-- Decorative Frame -->
          <div class="about-frame" aria-hidden="true">
            <div class="frame-dot" style="left: 0; top: 0;"></div>
            <div class="frame-dot" style="right: 0; top: 0;"></div>
            <div class="frame-dot" style="left: 0; bottom: 0;"></div>
            <div class="frame-dot" style="right: 0; bottom: 0;"></div>
            <div class="frame-border"></div>
            <img
              src="<?= $base ?>/assets/svgs/clients/ic_home2.svg"
              alt=""
              class="frame-icon"
              loading="lazy"
            >
          </div>

        </div>
      </div>

      <!-- RIGHT: CONTENT -->
      <div class="col-lg-6">
        <h2 id="about-vnpc" class="vnpc-h2 mb-3">
          Về Trung Tâm Tư Vấn Du Học VNPC
        </h2>

        <p class="vnpc-p mb-4" style="text-align: justify;">
          Thành lập năm 2006, <strong>VNPC</strong> là trung tâm <strong>tư vấn du học uy tín</strong> với gần 20 năm kinh
          nghiệm và mạng lưới đối tác toàn cầu. Chúng tôi đã đồng hành cùng hàng nghìn học sinh, sinh viên chinh phục
          ước mơ du học tại các quốc gia như <strong>Úc, Mỹ, Anh, Canada, Đức, Thụy Sỹ, New Zealand, Hàn Quốc,
          Nhật Bản, Singapore</strong> và nhiều nước khác.
          <br><br>
          VNPC cung cấp dịch vụ <strong>tư vấn chọn trường – chọn ngành, xử lý hồ sơ, xin học bổng và visa du học</strong>
          với quy trình minh bạch, chi phí rõ ràng và tỷ lệ đậu visa cao, được thực hiện bởi đội ngũ chuyên viên giàu
          kinh nghiệm và tận tâm.
        </p>

        <a
          href="<?= $base ?>/gioi-thieu"
          class="btn vnpc-btn-primary d-inline-flex align-items-center gap-2"
          title="Giới thiệu trung tâm tư vấn du học VNPC"
        >
          <span>Tìm hiểu thêm về VNPC</span>
         
        </a>
      </div>

    </div>
  </div>
</section>
