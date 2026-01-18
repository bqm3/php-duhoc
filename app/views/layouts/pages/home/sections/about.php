<style>
  .about-images {
    position: relative;
    max-width: 520px;
  }

  .about-img {
    width: 100%;
    border-radius: 12px;
    object-fit: cover;
  }

  .about-img.img-1 {
    width: 50%;
    z-index: 1;
  }

  .about-img.img-2 {
    width: 55%;
    position: absolute;
    bottom: -40px;
    right: -60px;
    z-index: 2;
    box-shadow: 0 30px 60px rgba(0, 0, 0, .4);
  }

  /* BADGE IMAGE */
  .about-badge {
    position: absolute;
    top: 24px;
    right: 40px;
    z-index: 3;
  }

  .about-badge img {
    width: 180px;
    height: auto;
    display: block;
  }
</style>
<section class="vnpc-section vnpc-about">
  <div class="container-xxl">
    <div class="row align-items-center g-5">

      <!-- LEFT: IMAGE GRID -->
      <div class="col-lg-6 position-relative">
        <div class="about-images">
          <img
            src="<?= $base ?>/assets/img/client/about_1.png"
            class="about-img img-1"
            alt="" />
          <img
            src="<?= $base ?>/assets/img/client/about_2.png"
            class="about-img img-2"
            alt="" />

          <!-- BADGE IMAGE -->
          <div class="about-badge">
            <img
              src="<?= $base ?>/assets/img/client/about_3.png"
              alt="15+ năm kinh nghiệm" />
          </div>
        </div>
      </div>

      <!-- RIGHT: CONTENT -->
      <div class="col-lg-6">
        <h2 class="vnpc-h2">Về Chúng Tôi</h2>
        <p class="vnpc-p">
          Thành lập năm 2006, với gần 20 năm kinh nghiệm tư vấn du học cùng mạng lưới đối tác rộng khắp thế giới, Tư vấn du học VNPC đã và đang là một trong những đơn vị đồng hành cùng các bạn trẻ trên chặng đường chinh phục giấc mơ du học. Cho đến hiện tại, VNPC là đối tác đáng tin cậy của rất nhiều trường đại học và cao đẳng ở các nước Úc, Thụy Sỹ, Anh, Mỹ, Canada, Đức, New Zealand, Síp, Phần Lan, Hà Lan, Tây Ban Nha, Singapore, Hàn Quốc, Nhật Bản, Trung Quốc, Đài Loan .... Chúng tôi cam kết mang đến cho Quý khách hàng dịch vụ toàn diện, đáng tin cậy và chất lượng. Các dịch vụ tư vấn, xử lý hồ sơ du học nhanh chóng với thông tin chi phí minh bạch và tỷ lệ đậu visa cao được thực hiện bởi đội ngũ chuyên viên chuyên môn cao, giàu kinh nghiệm và nhiệt tình hết mình
        </p>

        <a href="#" class="btn vnpc-btn-primary">
          Xem Thêm <span class="ms-2">→</span>
        </a>
      </div>

    </div>
  </div>
</section>