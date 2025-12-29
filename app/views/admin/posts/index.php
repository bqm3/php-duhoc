<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="mb-0">Posts</h4>

  <div class="d-flex gap-2">
    <a class="btn btn-success" href="/admin/posts/create">+ New</a>
    <form method="post" action="/admin/logout" onsubmit="return confirm('Logout?')">
      <input type="hidden" name="_csrf" value="<?= htmlspecialchars($csrf) ?>">
      <button class="btn btn-outline-danger">Logout</button>
    </form>
  </div>
</div>

<table class="table table-bordered bg-white">
  <thead>
    <tr>
      <th>ID</th><th>Title</th><th>Status</th><th>Updated</th><th width="160">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($posts as $p): ?>
    <tr>
      <td><?= (int)$p["id"] ?></td>
      <td><?= htmlspecialchars($p["title"]) ?></td>
      <td><?= htmlspecialchars($p["status"]) ?></td>
      <td><?= htmlspecialchars($p["updated_at"]) ?></td>
      <td>
        <a class="btn btn-sm btn-primary" href="/admin/posts/edit/<?= (int)$p["id"] ?>">Edit</a>
        <button class="btn btn-sm btn-danger" onclick="deletePost(<?= (int)$p['id'] ?>)">Delete</button>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<script>
async function deletePost(id){
  if(!confirm("Xóa bài viết #" + id + " ?")) return;

  const res = await fetch(`/admin/posts/delete/${id}`, {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: new URLSearchParams({ _csrf: window.__csrf })
  });

  const data = await res.json();
  if(data.ok) location.reload();
  else alert(data.message || "Delete failed");
}
</script>
