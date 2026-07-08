<?php

namespace App\Config;

use App\Controller\HomeController;
use App\Middleware\AuthMiddleware;

class HomeRoute
{
    public static function register(): void
    {
        Router::add("/home", "GET", fn() => (new HomeController())->index(), fn() => AuthMiddleware::requireAuth());
    }
}
