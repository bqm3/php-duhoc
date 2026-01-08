<?php
class HomeController {
  public function index() {
    $pdo = Db::getInstance()->pdo();
    $stmt = $pdo->query("SELECT id,title,slug,created_at FROM posts ORDER BY id DESC LIMIT 20");
    $posts = $stmt->fetchAll();
    view("main", "home/index", ["posts" => $posts]);
  }
}
