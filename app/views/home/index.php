<h3>Bài viết</h3>
<div class="list-group">
  <?php foreach ($posts as $p): ?>
    <div class="list-group-item">
      <div class="fw-bold"><?= htmlspecialchars($p["title"]) ?></div>
      <div class="text-muted small"><?= htmlspecialchars($p["created_at"]) ?></div>
    </div>
  <?php endforeach; ?>
</div>
