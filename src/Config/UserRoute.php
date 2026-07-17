<?php

namespace App\Config;

use App\Controller\UserController;
use App\Middleware\AuthMiddleware;

class UserRoute
{
    public static function register(): void
    {
        Router::add("/signup", "GET", fn() => (new UserController())->signupPage(), fn() => AuthMiddleware::requireGuest());
        Router::add("/signup", "POST", fn() => (new UserController())->save(), fn() => AuthMiddleware::requireGuest());
        Router::add("/login", "GET", fn() => (new UserController())->loginPage(), fn() => AuthMiddleware::requireGuest());
        Router::add("/login", "POST", fn() => (new UserController())->login(), fn() => AuthMiddleware::requireGuest());
        Router::add("/profile", "GET", fn() => (new UserController())->profilePage(), fn() => AuthMiddleware::requireAuth());
        Router::add("/profile/settings", "GET", fn() => (new UserController())->settingPage(), fn() => AuthMiddleware::requireAuth());
        Router::add("/profile/update", "POST", fn() => (new UserController())->update(), fn() => AuthMiddleware::requireAuth());
        Router::add("/profile/update-avatar", "POST", fn() => (new UserController())->updateAvatar(), fn() => AuthMiddleware::requireAuth());
        Router::add("/profile/delete", "POST", fn() => (new UserController())->delete(), fn() => AuthMiddleware::requireAuth());
        Router::add("/logout", "GET", fn() => (new UserController())->logout(), fn() => AuthMiddleware::requireAuth());
        Router::add("/user/([^/]+)", "GET", fn(string $username) => (new UserController())->viewUser((string) $username));
    }
}
