<!-- <?php if (!isset($base)) $base = ''; ?> -->

<style>
.vnpc-countries { padding: 72px 0; }

.countries-grid{
  display:grid;
  grid-template-columns:repeat(12,1fr);
  gap:12px;
  grid-auto-rows:200px;
  align-items:stretch;
}

.country-card{
  position:relative;
  display:block;
  overflow:hidden;
  border-radius:10px;
  background:#0b0b0b;
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

.span-4{ grid-column: span 4; }
.span-6{ grid-column: span 6; }
.span-8{ grid-column: span 8; }

@media (max-width: 992px){
  .countries-grid{ grid-template-columns:repeat(6,1fr); grid-auto-rows:88px; }
  .span-8,.span-6{ grid-column: span 6; }
  .span-4{ grid-column: span 3; }
}

@media (max-width: 576px){
  .countries-grid{ grid-template-columns:repeat(2,1fr); grid-auto-rows:84px; }
  .span-8,.span-6,.span-4{ grid-column: span 2; }
}
</style>

<section
  class="vnpc-section vnpc-countries"
  aria-labelledby="study-abroad-countries"
>
  <div class="container-xxl">

    <header class="text-center mb-4">
      <h2 id="study-abroad-countries" class="vnpc-h2 mb-1">
        Du Học Quốc Tế – Các Quốc Gia Hàng Đầu
      </h2>
      <p class="vnpc-p mb-0">
        Tư vấn du học, xử lý hồ sơ &amp; visa tại Châu Âu, Châu Úc, Châu Mỹ và Châu Á
      </p>
    </header>

    <nav class="countries-grid" aria-label="Danh sách quốc gia du học">

      <?php
      $countries = [
        ['title'=>'Du Học Canada','slug'=>'du-hoc-canada','img'=>'dh_canada.png','span'=>'span-6'],
        ['title'=>'Du Học Mỹ','slug'=>'du-hoc-my','img'=>'dh_my.png','span'=>'span-6'],

        ['title'=>'Du Học New Zealand','slug'=>'du-hoc-new-zealand','img'=>'dh_new_zealand.png','span'=>'span-4'],
        ['title'=>'Du Học Úc','slug'=>'du-hoc-uc','img'=>'dh_uc.png','span'=>'span-4'],
        ['title'=>'Du Học Đức','slug'=>'du-hoc-duc','img'=>'dh_duc.png','span'=>'span-4'],

        ['title'=>'Du Học Phần Lan','slug'=>'du-hoc-phan-lan','img'=>'dh_phan_lan.png','span'=>'span-4'],
        ['title'=>'Du Học Hà Lan','slug'=>'du-hoc-ha-lan','img'=>'dh_ha_lan.png','span'=>'span-8'],

        ['title'=>'Du Học Singapore','slug'=>'du-hoc-singapore','img'=>'dh_singapore.png','span'=>'span-4'],
        ['title'=>'Du Học Anh','slug'=>'du-hoc-anh','img'=>'dh_anh.png','span'=>'span-4'],
        ['title'=>'Du Học Tây Ban Nha','slug'=>'du-hoc-tay-ban-nha','img'=>'dh_tay_ban_nha.png','span'=>'span-4'],

        ['title'=>'Du Học Hàn Quốc','slug'=>'du-hoc-han-quoc','img'=>'dh_han_quoc.png','span'=>'span-8'],
        ['title'=>'Du Học Thụy Sĩ','slug'=>'du-hoc-thuy-si','img'=>'dh_thuy_si.png','span'=>'span-4'],
      ];

      foreach ($countries as $c): ?>
        <a
          class="country-card <?= $c['span'] ?>"
          href="/<?= $c['slug'] ?>"
          title="<?= htmlspecialchars($c['title']) ?>"
        >
          <img
            src="<?= $base ?>/assets/img/client/countries/<?= $c['img'] ?>"
            alt="<?= htmlspecialchars($c['title']) ?> – Tư vấn hồ sơ & visa"
            loading="lazy"
          >
          <span class="country-label"><?= htmlspecialchars($c['title']) ?></span>
        </a>
      <?php endforeach; ?>

    </nav>

    <div class="text-center mt-4">
      <a
        href="/du-hoc"
        class="btn vnpc-btn-primary btn-sm px-4"
        title="Xem toàn bộ chương trình du học quốc tế"
      >
        Xem tất cả quốc gia du học
      </a>
    </div>

  </div>
</section>
