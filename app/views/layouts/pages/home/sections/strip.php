<style>
/* ===============================
   STRIP SECTION – SEO OPTIMIZED
================================ */
.vnpc-strip{
  position:relative;
  padding:72px 0;
  overflow:hidden;
  color:#fff;
}

.vnpc-strip-bg{
  position:absolute;
  inset:0;
  background-size:cover;
  background-position:center;
  z-index:0;
}

/* overlay */
.vnpc-strip::before{
  content:"";
  position:absolute;
  inset:0;
  background:rgba(11,64,110,.9);
  z-index:1;
}

.vnpc-strip .container-xxl{ z-index:2; }

.strip-item{
  display:flex;
  flex-direction:column;
  align-items:center;
  gap:16px;
  padding:16px;
}

.strip-item img{
  width:64px;
  height:64px;
  object-fit:contain;
}

.strip-item h3{
  font-size:18px;
  font-weight:600;
  line-height:1.4;
  color:#fff;
  margin:0;
}
</style>

<section
  class="vnpc-section vnpc-strip"
  aria-labelledby="vnpc-strip-title"
>
  <div
    class="vnpc-strip-bg"
    style="background-image:url('<?= $base ?>/assets/img/client/strip/strip.png');"
    aria-hidden="true"
  ></div>

  <div class="container-xxl position-relative">
    <header class="text-center mb-4">
      <h2 id="vnpc-strip-title" class="visually-hidden">
        Lý do chọn trung tâm tư vấn du học VNPC
      </h2>
    </header>

    <div class="row text-center g-4">

      <!-- ITEM 1 -->
      <article class="col-md-4">
        <div class="strip-item">
          <img
            src="<?= $base ?>/assets/img/client/strip/icon_1.png"
            alt="Đội ngũ tư vấn du học chuyên nghiệp và tận tâm"
            loading="lazy"
          >
          <h3>Đội Ngũ Tư Vấn<br>Chuyên Nghiệp, Tận Tâm</h3>
        </div>
      </article>

      <!-- ITEM 2 -->
      <article class="col-md-4">
        <div class="strip-item">
          <img
            src="<?= $base ?>/assets/img/client/strip/icon_2.png"
            alt="Đối tác hơn 1.000 trường đại học và cao đẳng quốc tế"
            loading="lazy"
          >
          <h3>Đối Tác Của Hơn 1.000+<br>Trường Trên Thế Giới</h3>
        </div>
      </article>

      <!-- ITEM 3 -->
      <article class="col-md-4">
        <div class="strip-item">
          <img
            src="<?= $base ?>/assets/img/client/strip/icon_3.png"
            alt="Gần 20 năm kinh nghiệm tư vấn du học quốc tế"
            loading="lazy"
          >
          <h3>Gần 20 Năm Kinh Nghiệm<br>Tư Vấn Du Học</h3>
        </div>
      </article>

    </div>
  </div>
</section>
