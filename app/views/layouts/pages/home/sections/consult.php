<?php if (!isset($base))
  $base = ''; ?>

<section id="consult" class="vnpc-consult"
  style="background-image: url('<?= $base ?>/assets/img/client/img_home20.png');">
  <div class="container-xxl position-relative">
    <div class="row align-items-center">

      <!-- Left: Images -->
      <div class="col-lg-6">
        <div class="vnpc-consult-photos">
          <img class="c1" src="<?= $base ?>/assets/img/client/img_home21.png" alt="">
          <img class="c2" src="<?= $base ?>/assets/img/client/img_home22.png" alt="">
          <img class="c3" src="<?= $base ?>/assets/img/client/img_home23.png" alt="">
        </div>
      </div>

      <!-- Right: Form -->
      <div class="col-lg-6">
        <div class="vnpc-form" style="z-index: 2">
          <h3 class="vnpc-form-title mb-2">Bạn muốn đi du học</h3>
          <p class="vnpc-form-sub mb-4">Hãy trao đổi với chuyên gia tư vấn ngay hôm nay</p>

          <form id="consultation-form" action="<?= $base ?>/consultation/register" method="post">
            <input type="text" name="full_name" class="form-control vnpc-input mb-3" placeholder="Họ Tên *" required>
            <input type="tel" name="phone" class="form-control vnpc-input mb-3" placeholder="Phone *" required>
            <input type="email" name="email" class="form-control vnpc-input mb-3" placeholder="Email (Không bắt buộc)">

            <div class="row g-2 mb-3">
              <div class="col-6">
                <select name="gender" class="form-control vnpc-input">
                  <option value="">Giới tính</option>
                  <option value="male">Nam</option>
                  <option value="female">Nữ</option>
                  <option value="other">Khác</option>
                </select>
              </div>
              <div class="col-6">
                <select name="country_id" class="form-control vnpc-input">
                  <option value="">Chọn nước</option>
                  <?php if (isset($countries)): ?>
                    <?php foreach ($countries as $country): ?>
                      <option value="<?= $country['id'] ?>"><?= htmlspecialchars($country['name']) ?></option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>
            </div>

            <textarea name="message" class="form-control vnpc-input mb-4" rows="3"
              placeholder="Mong muốn của bạn"></textarea>

            <button type="submit"
              class="btn vnpc-btn-primary w-100 d-flex align-items-center justify-content-center gap-2">
              <span>Đăng ký ngay</span>
              <img src="<?= $base ?>/assets/svgs/clients/ic_home11.svg" width="12" height="11" alt="">
            </button>
          </form>

        </div>

        <script>
          document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('consultation-form');
            if (form) {
              form.addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(this);
                const submitBtn = this.querySelector('button[type="submit"]');
                const btnText = submitBtn.querySelector('span');
                const originalText = btnText.innerText;

                btnText.innerText = 'Đang xử lý...';
                submitBtn.disabled = true;

                fetch(this.getAttribute('action'), {
                  method: 'POST',
                  body: formData
                })
                  .then(response => response.json())
                  .then(data => {
                    if (data.success) {
                      // Push to Firebase Realtime Database
                      if (typeof firebase !== 'undefined') {
                        const db = firebase.database();
                        db.ref('notifications').push({
                          type: 'new_consultation',
                          data: {
                            name: formData.get('full_name'),
                            phone: formData.get('phone'),
                            email: formData.get('email'),
                            message: formData.get('message')
                          },
                          timestamp: Date.now(),
                          read: false
                        });
                      }

                      alert(data.message);
                      this.reset();
                    } else {
                      alert(data.message || 'Có lỗi xảy ra, vui lòng thử lại.');
                    }
                  })
                  .catch(error => {
                    console.error('Error:', error);
                    alert('Lỗi kết nối server.');
                  })
                  .finally(() => {
                    btnText.innerText = originalText;
                    submitBtn.disabled = false;
                  });
              });
            }
          });
        </script>

        <img src="<?= $base ?>/assets/svgs/clients/ic_home10.svg" class="consult-deco" alt="">
      </div>
    </div>
  </div>
</section>