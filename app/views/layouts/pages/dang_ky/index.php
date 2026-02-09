<?php
if (!isset($base))
    $base = '';

$title = 'Đăng ký tư vấn';
$breadcrumbs = [
    ['label' => 'Đăng ký tư vấn', 'url' => '']
];

// Include Hero Section
include __DIR__ . '/../base/base_hero.php';
?>

<section class="registration-section">
    <div class="container-xxl">
        <div class="registration-card animate-fade-in">

            <!-- Left Side: Form -->
            <div class="registration-form-side">
                <div class="registration-heading">
                    <h4>Đăng ký tư vấn</h4>
                </div>

                <div class="registration-form-group">
                    <form id="consultation-form-full" action="<?= $base ?>/consultation/register" method="POST">
                        <div class="registration-inputs">
                            <!-- Họ tên -->
                            <div class="registration-input-wrapper">
                                <input type="text" name="full_name" class="registration-input" placeholder="Họ tên*"
                                    required>
                            </div>

                            <!-- Phone -->
                            <div class="registration-input-wrapper">
                                <input type="tel" name="phone" class="registration-input" placeholder="Số điện thoại*" required
                                    pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                            </div>

                            <!-- Email -->
                            <div class="registration-input-wrapper">
                                <input type="email" name="email" class="registration-input" placeholder="Email">
                            </div>

                            <!-- Giới tính + Nước -->
                            <div class="row mx-0">
                                <div class="col-md-6 px-1">
                                    <div class="registration-input-wrapper">
                                        <select name="gender" class="registration-input">
                                            <option value="">Giới tính</option>
                                            <option value="male">Nam</option>
                                            <option value="female">Nữ</option>
                                            <option value="other">Khác</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 px-1">
                                    <div class="registration-input-wrapper">
                                        <select name="country_id" class="registration-input">
                                            <option value="">Chọn nước</option>
                                            <?php foreach ($countries as $country): ?>
                                                <option value="<?= $country['id'] ?>">
                                                    <?= htmlspecialchars($country['name']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Mong muốn -->
                            <div class="registration-input-wrapper">
                                <textarea name="message" class="registration-input registration-textarea"
                                    placeholder="Mong muốn của bạn"></textarea>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="registration-button-wrapper mt-5">
                            <button type="submit" class="registration-submit-btn">
                                <span>Đăng ký ngay</span>
                                <div class="btn-icon">
                                    <svg width="17" height="14" viewBox="0 0 17 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 7H16M16 7L10 1M16 7L10 13" stroke="white" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Side: Image -->
            <div class="registration-image-side"
                style="background-image: url('<?= $base ?>/assets/img/client/img_home33.png');">
            </div>

        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('consultation-form-full');
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

                            if (typeof alertify !== 'undefined') {
                                alertify.success(data.message);
                            } else {
                                alert(data.message);
                            }
                            this.reset();
                        } else {
                            if (typeof alertify !== 'undefined') {
                                alertify.error(data.message || 'Có lỗi xảy ra, vui lòng thử lại.');
                            } else {
                                alert(data.message || 'Có lỗi xảy ra, vui lòng thử lại.');
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        if (typeof alertify !== 'undefined') {
                            alertify.error('Lỗi kết nối server.');
                        } else {
                            alert('Lỗi kết nối server.');
                        }
                    })
                    .finally(() => {
                        btnText.innerText = originalText;
                        submitBtn.disabled = false;
                    });
            });
        }
    });
</script>

<style>
    .animate-fade-in {
        animation: fadeIn 0.8s ease-out forwards;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>