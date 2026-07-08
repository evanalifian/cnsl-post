<?php

namespace App\Config;

use App\Controller\PostController;
use App\Middleware\AuthMiddleware;

class PostRoute
{
    public static function register(): void
    {
        Router::add("/post/create", "GET", fn() => (new PostController())->index(), fn() => AuthMiddleware::requireAuth());
        Router::add("/post/create", "POST", fn() => (new PostController())->save(), fn() => AuthMiddleware::requireAuth());
        Router::add("/post/([0-9a-z]*)", "GET", fn($postID) => (new PostController())->detailPost((string) $postID), fn() => AuthMiddleware::requireAuth());
        Router::add("/post/([0-9a-z]*)/delete", "POST", fn($postID) => (new PostController())->deletePost((string) $postID), fn() => AuthMiddleware::requireAuth());
    }
}
