<!-- <?php if (!isset($base)) $base = ''; ?> -->

<style>
.vnpc-countries { padding: 72px 0; }

.countries-grid{
  display:grid;
  grid-template-columns:repeat(12,1fr);
  gap:12px;

  /* ✅ key: tạo “lưới hàng” cố định để không lệch */
  grid-auto-rows: 200px; /* chỉnh 84–110 tùy bạn */
  align-items: stretch;
}

.country-card{
  position:relative;
  display:block;
  overflow:hidden;
  border-radius:10px;
  background:#0b0b0b;

  /* ✅ key: card phải fill đúng grid cell */
  height:100%;
}

.country-card img{
  width:100%;
  height:100%;
  object-fit:cover;
  display:block;
  transition:transform .25s ease;
}

.country-card::after{
  content:"";
  position:absolute;
  inset:0;
  background:linear-gradient(180deg,rgba(0,0,0,.10),rgba(0,0,0,.55));
  pointer-events:none;
}

.country-card:hover img{ transform:scale(1.03); }

.country-label{
  position:absolute;
  left:10px;
  top:10px;
  z-index:2;
  font-size:13px;
  font-weight:600;
  color:#fff;
  background:rgba(14,63,110,.85);
  padding:6px 10px;
  border-radius:8px;
}

/* ✅ span theo cột + theo hàng */
.span-4{ grid-column: span 4; }
.span-6{ grid-column: span 6; }
.span-8{ grid-column: span 8; }

/* chiều cao: 2/3/4 hàng */
.h-2{ grid-row: span 2; }
.h-3{ grid-row: span 3; }
.h-4{ grid-row: span 4; }

/* responsive */
@media (max-width: 992px){
  .countries-grid{ grid-template-columns:repeat(6,1fr); grid-auto-rows: 88px; }
  .span-8{ grid-column: span 6; }
  .span-6{ grid-column: span 6; }
  .span-4{ grid-column: span 3; }
}

@media (max-width: 576px){
  .countries-grid{ grid-template-columns:repeat(2,1fr); grid-auto-rows: 84px; }
  .span-8,.span-6,.span-4{ grid-column: span 2; }
}

</style>

<section class="vnpc-section vnpc-countries">
  <div class="container-xxl">
    <div class="text-center mb-4">
      <h2 class="vnpc-h2 mb-1">Du Học Quốc Tế</h2>
      <p class="vnpc-p mb-0">Tư vấn &amp; hỗ trợ hồ sơ du học các nước: Châu Âu, Châu Úc, Châu Mỹ...</p>
    </div>

    <div class="countries-grid">

      <!-- Row 1: 2 cards -->
      <?php
      $row1 = [
        ['title' => 'Du Học Canada', 'img' => 'dh_canada.png'],
        ['title' => 'Du Học Mỹ', 'img' => 'dh_my.png'],
      ];
      foreach ($row1 as $it): ?>
        <a class="country-card span-6" href="#">
          <img src="<?= $base ?>/assets/img/client/countries/<?= $it['img'] ?>" alt="<?= htmlspecialchars($it['title']) ?>">
          <span class="country-label"><?= htmlspecialchars($it['title']) ?></span>
        </a>
      <?php endforeach; ?>

      <!-- Row 2: 3 cards -->
      <?php
      $row2 = [
        ['title' => 'Du Học New Zealand', 'img' => 'dh_new_zealand.png'],
        ['title' => 'Du Học Úc', 'img' => 'dh_uc.png'],
        ['title' => 'Du Học Đức', 'img' => 'dh_duc.png'],
      ];
      foreach ($row2 as $it): ?>
        <a class="country-card span-4" href="#">
          <img src="<?= $base ?>/assets/img/client/countries/<?= $it['img'] ?>" alt="<?= htmlspecialchars($it['title']) ?>">
          <span class="country-label"><?= htmlspecialchars($it['title']) ?></span>
        </a>
      <?php endforeach; ?>

      <!-- Row 3: 1 small + 1 wide -->
      <a class="country-card span-4" href="#">
        <img src="<?= $base ?>/assets/img/client/countries/dh_phap.png" alt="Du Học Pháp">
        <span class="country-label">Du Học Pháp</span>
      </a>

      <a class="country-card span-8" href="#">
        <img src="<?= $base ?>/assets/img/client/countries/dh_ha_lan.png" alt="Du Học Hà Lan">
        <span class="country-label">Du Học Hà Lan</span>
      </a>

      <!-- Row 4: 3 cards -->
      <?php
      $row4 = [
        ['title' => 'Du Học Phần Lan', 'img' => 'dh_phan_lan.png'],
        ['title' => 'Du Học Anh', 'img' => 'dh_anh.png'],
        ['title' => 'Du Học Tây Ban Nha', 'img' => 'dh_tay_ban_nha.png'],
      ];
      foreach ($row4 as $it): ?>
        <a class="country-card span-4" href="#">
          <img src="<?= $base ?>/assets/img/client/countries/<?= $it['img'] ?>" alt="<?= htmlspecialchars($it['title']) ?>">
          <span class="country-label"><?= htmlspecialchars($it['title']) ?></span>
        </a>
      <?php endforeach; ?>

      <!-- Row 5: 2 wide cards -->
      <a class="country-card span-6" href="#">
        <img src="<?= $base ?>/assets/img/client/countries/dh_thuy_si.png" alt="Du Học Thụy Sĩ">
        <span class="country-label">Du Học Thụy Sĩ</span>
      </a>

      <a class="country-card span-6" href="#">
        <img src="<?= $base ?>/assets/img/client/countries/dh_singapore.png" alt="Du Học Singapore">
        <span class="country-label">Du Học Singapore</span>
      </a>

      <!-- Bạn thêm các nước khác tương tự ở dưới nếu muốn -->
    </div>

    <div class="text-center mt-4">
      <a href="#" class="btn vnpc-btn-primary btn-sm px-4">More</a>
    </div>
  </div>
</section>
