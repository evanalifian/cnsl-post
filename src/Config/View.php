<?php

namespace App\Config;

class View
{
  public static function app(string $src_path, array $data = []): void
  {
    require_once __DIR__ . "/../View/templates/headerApp.php";
    require_once __DIR__ . "/../View/$src_path/index.php";
    require_once __DIR__ . "/../View/templates/footerApp.php";
  }

  public static function render(string $src_path, array $data = []): void
  {
    require_once __DIR__ . "/../View/templates/header.php";
    require_once __DIR__ . "/../View/$src_path/index.php";
    require_once __DIR__ . "/../View/templates/footer.php";
  }

  public static function notFound(array $data = []): void
  {
    require_once __DIR__ . "/../View/templates/header.php";
    require_once __DIR__ . "/../View/404.php";
    require_once __DIR__ . "/../View/templates/footer.php";
  }

  public static function redirect(string $path): void
  {
    header("Location: $path");
    exit();
  }
}