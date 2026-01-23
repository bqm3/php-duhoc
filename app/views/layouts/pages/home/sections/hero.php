<?php if (!isset($base)) $base = ''; ?>

<section 
  class="vnpc-hero"
  style="background-image:url('<?= $base ?>/assets/img/client/img_banner.png')"
  aria-label="Tư vấn du học quốc tế miễn phí"
>
  <div class="container-xxl">
    <div class="row align-items-center g-4">

      <!-- CONTENT -->
      <div class="col-lg-7">
        <h1 class="vnpc-hero-title animate-fade-in-up">
          Tư vấn du học miễn phí –<br>
          Cơ hội vào các trường<br>
          hàng đầu thế giới
        </h1>

        <p class="vnpc-hero-sub animate-fade-in-up" style="animation-delay: 0.2s;">
          Nhận học bổng du học, hỗ trợ VISA, chọn trường & ngành học phù hợp
        </p>

        <!-- SEARCH -->
        <div 
          class="vnpc-hero-search animate-fade-in-up"
          style="animation-delay: 0.4s;"
          role="search"
        >
          <label for="study-search" class="visually-hidden">
            Tìm trường, thành phố hoặc quốc gia du học
          </label>

          <input
            id="study-search"
            class="form-control vnpc-input"
            list="countrySuggestions"
            placeholder="Nhập tên trường, thành phố hoặc quốc gia"
            aria-label="Tìm kiếm thông tin du học"
            autocomplete="off"
          >

          <datalist id="countrySuggestions"></datalist>

          <button 
            class="btn vnpc-btn-primary"
            type="button"
            aria-label="Tìm kiếm du học"
          >
            <img 
              src="<?= $base ?>/assets/svgs/clients/ic_search.svg"
              width="18"
              height="18"
              alt="Tìm kiếm du học"
              loading="lazy"
            >
          </button>
        </div>

        <!-- LOAD DATA -->
        <script>
          document.addEventListener('DOMContentLoaded', function () {
            const datalist = document.getElementById('countrySuggestions');

            fetch('<?= $base ?>/api/study-abroad-menu')
              .then(res => res.json())
              .then(data => {
                data.forEach(continent => {
                  continent.countries.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.name;
                    datalist.appendChild(option);
                  });
                });
              })
              .catch(() => {});
          });
        </script>

        <!-- CTA -->
        <a
          class="btn vnpc-btn-orange mt-4 animate-fade-in-up"
          style="animation-delay: 0.6s;"
          href="#consult"
          title="Đăng ký tư vấn du học miễn phí"
        >
          Đăng ký tư vấn du học ngay
        </a>
      </div>

      <!-- IMAGE BLOCK -->
      <div class="col-lg-5 position-relative">
        <div class="vnpc-hero-photos">

          <img 
            class="p1 animate-fade-in"
            style="animation-delay: 0.3s;"
            src="<?= $base ?>/assets/img/client/img_home4.png"
            alt="Sinh viên du học quốc tế"
            loading="lazy"
          >

          <img 
            class="p2 animate-fade-in"
            style="animation-delay: 0.4s;"
            src="<?= $base ?>/assets/img/client/img_home2.png"
            alt="Cuộc sống du học nước ngoài"
            loading="lazy"
          >

          <img 
            class="p3 animate-fade-in"
            style="animation-delay: 0.5s;"
            src="<?= $base ?>/assets/img/client/img_home5.png"
            alt="Du học sinh tại trường đại học quốc tế"
            loading="lazy"
          >

          <img 
            class="p4 animate-fade-in"
            style="animation-delay: 0.6s;"
            src="<?= $base ?>/assets/img/client/img_home3.png"
            alt="Tư vấn chọn trường du học"
            loading="lazy"
          >

          <!-- DECOR -->
          <img 
            class="p5 animate-float"
            src="<?= $base ?>/assets/img/client/img_home6.png"
            alt=""
            aria-hidden="true"
            loading="lazy"
          >

          <img 
            class="p6 animate-float"
            style="animation-delay: 0.5s;"
            src="<?= $base ?>/assets/img/client/img_home7.png"
            alt=""
            aria-hidden="true"
            loading="lazy"
          >

          <img 
            class="p7 animate-float"
            style="animation-delay: 1s;"
            src="<?= $base ?>/assets/img/client/img_home7.png"
            alt=""
            aria-hidden="true"
            loading="lazy"
          >

          <!-- STATS -->
          <div 
            class="vnpc-pill vnpc-pill-left animate-slide-in-left"
            style="animation-delay: 0.8s;"
          >
            <div class="d-flex flex-column">
              <strong class="pill-num">+5.000</strong>
              <span class="pill-text">Hồ sơ VISA du học</span>
            </div>
            <img 
              src="<?= $base ?>/assets/img/client/img_home1.png"
              alt="Thành công VISA du học"
              loading="lazy"
            >
          </div>

          <div 
            class="vnpc-pill vnpc-pill-right animate-slide-in-right"
            style="animation-delay: 1s;"
          >
            <strong class="pill-num blue">+2.500</strong>
            <span class="pill-text dark">Đối tác </span>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
