<h3>Bài viết</h3>
<div class="list-group">
  <?php foreach ($posts as $p): ?>
    <a href="<?= $base ?>/posts/<?= htmlspecialchars($p["slug"]) ?>" class="list-group-item list-group-item-action">
      <div class="fw-bold"><?= htmlspecialchars($p["title"]) ?></div>
      <div class="text-muted small"><?= htmlspecialchars($p["created_at"]) ?></div>
    </a>
  <?php endforeach; ?>
</div>

<hr class="my-5">

<div class="card">
  <div class="card-header bg-primary text-white">
    <h4 class="mb-0">Đăng ký tư vấn</h4>
  </div>
  <div class="card-body">
    <form id="consultation-form">
      <div class="mb-3">
        <label class="form-label">Họ và tên</label>
        <input type="text" name="full_name" class="form-control" required placeholder="Nhập họ tên của bạn">
      </div>
      <div class="mb-3">
        <label class="form-label">Số điện thoại</label>
        <input type="tel" name="phone" class="form-control" required placeholder="Nhập số điện thoại">
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required placeholder="Nhập địa chỉ email">
      </div>
      <div class="mb-3">
        <label class="form-label">Mong muốn / Ghi chú</label>
        <textarea name="message" class="form-control" rows="3" placeholder="Bạn cần tư vấn về vấn đề gì?"></textarea>
      </div>
      <button type="submit" class="btn btn-primary w-100">Gửi đăng ký</button>
    </form>
  </div>
</div>

<script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-database.js"></script>
<script src="/php-duhoc/public/assets/js/firebase-config.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('consultation-form');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const btn = form.querySelector('button[type="submit"]');
        const originalText = btn.textContent;
        btn.textContent = 'Đang gửi...';
        btn.disabled = true;

        const formData = new FormData(this);

        // Adjust the URL if your project is in a subdirectory
        fetch('/php-duhoc/public/consultation/register', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                
                // Send notification to Firebase
                if (typeof firebase !== 'undefined') {
                    const newRef = firebase.database().ref('notifications').push();
                    newRef.set({
                        type: 'new_consultation',
                        data: {
                            name: formData.get('full_name'),
                            phone: formData.get('phone'),
                            email: formData.get('email'),
                            message: formData.get('message')
                        },
                        timestamp: firebase.database.ServerValue.TIMESTAMP,
                        read: false
                    });
                } else {
                    console.error('Firebase not loaded');
                }
                
                form.reset();
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('hihi:', error);
            alert('Có lỗi xảy ra khi gửi đăng ký.');
        })
        .finally(() => {
            btn.textContent = originalText;
            btn.disabled = false;
        });
    });
});
</script>
