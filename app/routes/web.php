<?php
// Public / web routes
if ($uri === "/" && $method === "GET") {
  (new HomeController())->index();
}
