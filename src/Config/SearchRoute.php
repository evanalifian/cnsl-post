<?php

namespace App\Config;

use App\Controller\SearchController;
use App\Middleware\AuthMiddleware;

class SearchRoute
{
    public static function register(): void
    {
        Router::add("/search", "GET", fn() => (new SearchController())->index(), fn() => AuthMiddleware::requireAuth());
    }
}
