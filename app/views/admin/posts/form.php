<h4 class="mb-3"><?= $mode === "create" ? "Create Post" : "Edit Post" ?></h4>

<form method="post" action="<?= $mode === "create" ? "/admin/posts/store" : "/admin/posts/update/" . (int)$post["id"] ?>">
  <input type="hidden" name="_csrf" value="<?= htmlspecialchars($csrf) ?>">

  <div class="mb-3">
    <label class="form-label">Title</label>
    <input class="form-control" name="title" value="<?= htmlspecialchars($post["title"] ?? "") ?>" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Status</label>
    <select class="form-select" name="status">
      <option value="draft" <?= ($post["status"] ?? "")==="draft" ? "selected" : "" ?>>draft</option>
      <option value="published" <?= ($post["status"] ?? "")==="published" ? "selected" : "" ?>>published</option>
    </select>
  </div>

  <div class="mb-3">
    <label class="form-label">Content</label>
    <textarea class="form-control" rows="8" name="content"><?= htmlspecialchars($post["content"] ?? "") ?></textarea>
  </div>

  <div class="d-flex gap-2">
    <button class="btn btn-primary">Save</button>
    <a class="btn btn-secondary" href="/admin/posts">Back</a>
  </div>
</form>
