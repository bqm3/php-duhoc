<?php
class HomeController {
  public function index() {
    $pdo = Db::pdo();
    $stmt = $pdo->query("SELECT id,title,created_at FROM posts WHERE status='published' ORDER BY id DESC LIMIT 20");
    $posts = $stmt->fetchAll();
    view("main", "home/index", ["posts" => $posts]);
  }
}
