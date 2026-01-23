<?php
// =======================
// CONTACT DATA (edit here)
// =======================
$contact_info = [
  'title' => 'Liên Hệ Với Chúng Tôi',
  'hotline' => '0979 000 888',
  'phone_2' => '0911 434 373',
  'social' => 'Zalo/ Viber/ Whatsapp : 0979 000 888',
  'offices' => [
    [
      'name' => 'Văn Phòng Tại Hà Nội',
      'address' => '359 P. Vũ Tông Phan, Khương Đình, Thanh Xuân, Hà Nội, Việt Nam',
    ],
    [
      'name' => 'Văn Phòng Tại TPHCM',
      'address' => 'TTTM Thăng Lợi, 2 Đ. Trường Chinh, P. Tân Phú, Thành phố Hồ Chí Minh, Việt Nam',
    ],
    [
      'name' => 'Văn Phòng Tại Đà Nẵng',
      'address' => '149 Núi Thành, Hòa Cường Bắc, Hải Châu, Đà Nẵng, Việt Nam',
    ],
  ],
  // Dán iframe google map của bạn vào đây
  'map_iframe' => 'https://www.google.com/maps?q=359%20V%C5%A9%20T%C3%B4ng%20Phan%20H%C3%A0%20N%E1%BB%99i&output=embed',
];
?>

<style>
  /* ===============================
     CONTACT SECTION
  =============================== */
  .vnpc-contact-section{
    padding: 64px 0;
    background: #fff;
  }
  .vnpc-contact-card{
    border: 1px solid rgba(15, 23, 42, 0.08);
    border-radius: 18px;
    background: #fff;
    box-shadow: 0 10px 30px rgba(2, 6, 23, 0.06);
    overflow: hidden;
  }
  .vnpc-contact-left{
    padding: 28px 28px 24px;
  }
  .vnpc-contact-title{
    color: #0B5ED7;
    font-weight: 800;
    font-size: 20px;
    margin-bottom: 14px;
    letter-spacing: .2px;
  }
  .vnpc-contact-block-title{
    font-weight: 800;
    font-size: 12px;
    letter-spacing: .8px;
    color: #0f172a;
    text-transform: uppercase;
    margin-bottom: 10px;
  }
  .vnpc-contact-line{
    display: flex;
    gap: 10px;
    align-items: flex-start;
    margin-bottom: 8px;
    color: #334155;
    font-size: 14px;
    line-height: 1.5;
  }
  .vnpc-contact-line strong{
    color: #0f172a;
    font-weight: 700;
  }
  .vnpc-contact-office{
    margin-top: 14px;
  }
  .vnpc-contact-office-name{
    font-weight: 800;
    color: #0f172a;
    margin: 14px 0 6px;
    font-size: 14px;
  }
  .vnpc-contact-office-addr{
    color: #475569;
    font-size: 13.5px;
    line-height: 1.55;
    margin: 0;
  }

  .vnpc-contact-actions{
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 18px;
  }
  .vnpc-contact-btn{
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 14px;
    border-radius: 999px;
    border: 1px solid rgba(15, 23, 42, 0.12);
    text-decoration: none;
    font-weight: 700;
    font-size: 14px;
    color: #0f172a;
    background: #fff;
    transition: .2s ease;
  }
  .vnpc-contact-btn:hover{
    transform: translateY(-1px);
    box-shadow: 0 10px 18px rgba(2, 6, 23, 0.08);
    border-color: rgba(11, 94, 215, 0.35);
    color: #0B5ED7;
  }
  .vnpc-contact-btn img{
    width: 18px;
    height: 18px;
    object-fit: contain;
  }

  .vnpc-contact-map{
    height: 100%;
    min-height: 360px;
    background: #f1f5f9;
  }
  .vnpc-contact-map iframe{
    width: 100%;
    height: 100%;
    border: 0;
    display: block;
  }

  @media (max-width: 991.98px){
    .vnpc-contact-map{ min-height: 320px; }
  }
</style>
<!-- Hero / Breadcrumb Section -->
<?php partial('layouts/pages/base/base_hero', ['title' => 'Liên Hệ']) ?>

<section class="vnpc-contact-section">
  <div class="container">
    <div class="vnpc-contact-card">
      <div class="row g-0">
        <!-- LEFT: INFO -->
        <div class="col-lg-5">
          <div class="vnpc-contact-left">
            <h2 class="vnpc-contact-title"><?= htmlspecialchars($contact_info['title']) ?></h2>

            <div class="vnpc-contact-block-title">Văn phòng tư vấn du học</div>

            <div class="vnpc-contact-line">
              <strong>Số điện thoại:</strong>
              <span>
                <a href="tel:<?= preg_replace('/\s+/', '', $contact_info['hotline']) ?>" class="text-decoration-none">
                  <?= htmlspecialchars($contact_info['hotline']) ?>
                </a>
                <?php if (!empty($contact_info['phone_2'])): ?>
                  <span> | </span>
                  <a href="tel:<?= preg_replace('/\s+/', '', $contact_info['phone_2']) ?>" class="text-decoration-none">
                    <?= htmlspecialchars($contact_info['phone_2']) ?>
                  </a>
                <?php endif; ?>
              </span>
            </div>

            <?php if (!empty($contact_info['social'])): ?>
              <div class="vnpc-contact-line">
                <strong></strong>
                <span><?= htmlspecialchars($contact_info['social']) ?></span>
              </div>
            <?php endif; ?>

            <div class="vnpc-contact-office">
              <?php foreach ($contact_info['offices'] as $of): ?>
                <div class="vnpc-contact-office-name"><?= htmlspecialchars($of['name']) ?></div>
                <p class="vnpc-contact-office-addr">
                  <strong>Địa chỉ:</strong> <?= htmlspecialchars($of['address']) ?>
                </p>
              <?php endforeach; ?>
            </div>

            <div class="vnpc-contact-actions">
              <a class="vnpc-contact-btn" href="tel:<?= preg_replace('/\s+/', '', $contact_info['hotline']) ?>">
                <img src="<?= $base ?>/assets/svgs/clients/ic_phone.svg" alt="Call">
                Gọi ngay
              </a>
              <a class="vnpc-contact-btn" target="_blank" rel="noopener"
                 href="https://zalo.me/<?= preg_replace('/\D+/', '', $contact_info['hotline']) ?>">
                <img src="https://page.widget.zalo.me/static/images/2.0/Logo.svg" alt="Zalo">
                Chat Zalo
              </a>
            </div>
          </div>
        </div>

        <!-- RIGHT: MAP -->
        <div class="col-lg-7">
          <div class="vnpc-contact-map">
            <iframe
              src="<?= htmlspecialchars($contact_info['map_iframe']) ?>"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              allowfullscreen
              title="Bản đồ văn phòng"
            ></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
