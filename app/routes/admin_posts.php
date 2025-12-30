<?php
// Admin posts routes
if ($uri === "/admin/posts" && $method === "GET") {
  (new AdminPostController())->index();
}
if ($uri === "/admin/posts/create" && $method === "GET") {
  (new AdminPostController())->create();
}
if ($uri === "/admin/posts/store" && $method === "POST") {
  (new AdminPostController())->store();
}
if (preg_match('#^/admin/posts/edit/(\d+)$#', $uri, $m) && $method === "GET") {
  (new AdminPostController())->edit((int)$m[1]);
}
if (preg_match('#^/admin/posts/update/(\d+)$#', $uri, $m) && $method === "POST") {
  (new AdminPostController())->update((int)$m[1]);
}
if (preg_match('#^/admin/posts/delete/(\d+)$#', $uri, $m) && $method === "POST") {
  (new AdminPostController())->delete((int)$m[1]);
}
