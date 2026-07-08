<?php

namespace App\Config;

use App\Controller\LandingController;
use App\Controller\AboutController;
use App\Middleware\AuthMiddleware;

class CoreRoute
{
    public static function register(): void
    {
        Router::add("/", "GET", fn() => (new LandingController())->index(), fn() => AuthMiddleware::requireGuest());
        Router::add("/about", "GET", fn() => (new AboutController())->index());
    }
}
