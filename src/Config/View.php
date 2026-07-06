<?php

namespace App\Config;

class View
{
  public static function app(string $src_path, array $data = []): void
  {
    $navLinks = [
      [
        "name" => "Home",
        "path" => "/home",
        "icon" => "<i class='bi bi-house-door-fill fs-5'></i>"
      ],
      [
        "name" => "Search",
        "path" => "/search",
        "icon" => "<i class='bi bi-search fs-5'></i>"
      ],
      [
        "name" => "Create Post",
        "path" => "/post/create",
        "icon" => "<i class='bi bi-plus-circle fs-5'></i>"
      ]
    ];
    $activeNavItem = "nav-link link-light d-flex align-items-center gap-3 px-4 py-3 rounded-pill bg-secondary bg-opacity-10 fw-bold";
    $activeNavItemMobile = "text-light";
    $navItem = "nav-link link-secondary d-flex align-items-center gap-3 px-4 py-3 rounded-pill bg-white-hover bg-opacity-10-hover link-light-hover fw-semibold";
    $navItemMobile = "text-secondary";

    $activeProfile = "/profile" === $_SERVER['REQUEST_URI'] || "/profile/setting" === $_SERVER['REQUEST_URI'] || "/profile/update" === $_SERVER['REQUEST_URI'];
    $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

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