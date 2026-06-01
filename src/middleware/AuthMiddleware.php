<?php

namespace App\PHPBoilerplate\Middleware;

use App\PHPBoilerplate\Config\View;

class AuthMiddleware
{
  public static function isAuth(): void
  {
    if (isset($_SESSION["auth"])) {
      View::redirect("/account");
    }
  }

  public static function isNotAuth(): void
  {
    if (!isset($_SESSION["auth"])) {
      View::redirect("/");
    }
  }
}