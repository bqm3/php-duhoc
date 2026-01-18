<style>
  /* ===============================
   STRIP SECTION
================================ */

.vnpc-strip {
  position: relative;
  padding: 72px 0;
  overflow: hidden;
  color: #fff;
}

.vnpc-strip-bg {
  position: absolute;
  inset: 0;
  background-size: cover;
  background-position: center;
  z-index: 0;
}

/* overlay xanh */
.vnpc-strip::before {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(11, 64, 110, 0.9);
  z-index: 1;
}

.vnpc-strip .container-xxl {
  z-index: 2;
}

.strip-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 16px;
  padding: 16px;
}

.strip-item img {
  width: 64px;
  height: 64px;
  object-fit: contain;
}

.strip-item h4 {
  font-size: 18px;
  font-weight: 600;
  line-height: 1.4;
  color: #ffffff;
}

</style>

<section class="vnpc-section vnpc-strip">
  <div class="vnpc-strip-bg"
       style="background-image: url('<?= $base ?>/assets/img/client/strip/strip.png');">
  </div>

  <div class="container-xxl position-relative">
    <div class="row text-center g-4">

      <!-- ITEM 1 -->
      <div class="col-md-4">
        <div class="strip-item">
          <img src="<?= $base ?>/assets/img/client/strip/icon_1.png" alt="">
          <h4>Đội Ngũ Tư Vấn<br>Chuyên Nghiệp, Tận Tâm</h4>
        </div>
      </div>

      <!-- ITEM 2 -->
      <div class="col-md-4">
        <div class="strip-item">
          <img src="<?= $base ?>/assets/img/client/strip/icon_2.png" alt="">
          <h4>Đối Tác Của Hơn 1.000+<br>Trường Trên Thế Giới</h4>
        </div>
      </div>

      <!-- ITEM 3 -->
      <div class="col-md-4">
        <div class="strip-item">
          <img src="<?= $base ?>/assets/img/client/strip/icon_3.png" alt="">
          <h4>Gần 20 Năm Kinh Nghiệm<br>Tư Vấn Du Học</h4>
        </div>
      </div>

    </div>
  </div>
</section>
