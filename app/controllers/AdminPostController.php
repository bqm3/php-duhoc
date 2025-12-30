<?php
class AdminPostController {
  public function index() {
    Auth::requireAdmin();
    $pdo = Db::pdo();
    $posts = $pdo->query("SELECT * FROM posts ORDER BY id DESC")->fetchAll();
    view("admin", "admin/posts/index", ["posts" => $posts, "csrf" => Csrf::token()]);
  }

  public function create() {
    Auth::requireAdmin();
    view("admin", "admin/posts/form", [
      "mode" => "create",
      "post" => ["title" => "", "content" => "", "status" => "draft"],
      "csrf" => Csrf::token()
    ]);
  }

  public function store() {
    Auth::requireAdmin();
    if (!Csrf::verify($_POST["_csrf"] ?? "")) Response::json(["ok"=>false,"message"=>"CSRF"], 400);

    $title = trim($_POST["title"] ?? "");
    $content = $_POST["content"] ?? "";
    $status = $_POST["status"] ?? "draft";

    $pdo = Db::pdo();
    $stmt = $pdo->prepare("INSERT INTO posts(title,content,status) VALUES(?,?,?)");
    $stmt->execute([$title, $content, $status]);
    $posts = $GLOBALS['base'] !== '' ? $GLOBALS['base'] . '/admin/posts' : '/admin/posts';
    header("Location: " . $posts);
    exit;
  }

  public function edit(int $id) {
    Auth::requireAdmin();
    $pdo = Db::pdo();
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE id=?");
    $stmt->execute([$id]);
    $post = $stmt->fetch();
    if (!$post) { http_response_code(404); echo "Not found"; exit; }

    view("admin", "admin/posts/form", ["mode"=>"edit", "post"=>$post, "csrf"=>Csrf::token()]);
  }

  public function update(int $id) {
    Auth::requireAdmin();
    if (!Csrf::verify($_POST["_csrf"] ?? "")) Response::json(["ok"=>false,"message"=>"CSRF"], 400);

    $title = trim($_POST["title"] ?? "");
    $content = $_POST["content"] ?? "";
    $status = $_POST["status"] ?? "draft";

    $pdo = Db::pdo();
    $stmt = $pdo->prepare("UPDATE posts SET title=?, content=?, status=? WHERE id=?");
    $stmt->execute([$title, $content, $status, $id]);
    $posts = $GLOBALS['base'] !== '' ? $GLOBALS['base'] . '/admin/posts' : '/admin/posts';
    header("Location: " . $posts);
    exit;
  }

  public function delete(int $id) {
    Auth::requireAdmin();
    if (!Csrf::verify($_POST["_csrf"] ?? "")) Response::json(["ok"=>false,"message"=>"CSRF"], 400);

    $pdo = Db::pdo();
    $stmt = $pdo->prepare("DELETE FROM posts WHERE id=?");
    $stmt->execute([$id]);

    Response::json(["ok"=>true]);
  }
}
