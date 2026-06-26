<?php

use App\Config\Router;
use App\Controller\HomeController;
use App\Controller\UserController;
use App\Middleware\AuthMiddleware;

require_once __DIR__ . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$home = new HomeController();
$user = new UserController();

Router::add("/", "GET", fn() => $home->index(), fn() => AuthMiddleware::requireGuest());
Router::add("/account", "GET", fn() => $user->homePage(), fn() => AuthMiddleware::requireAuth());
Router::add("/account/update", "POST", fn() => $user->update(), fn() => AuthMiddleware::requireAuth());
Router::add("/account/delete", "GET", fn() => $user->delete(), fn() => AuthMiddleware::requireAuth());

Router::add("/login", "GET", fn() => $user->authPage(), fn() => AuthMiddleware::requireGuest());
Router::add("/login", "POST", fn() => $user->auth(), fn() => AuthMiddleware::requireGuest());

Router::add("/signup", "GET", fn() => $user->signupPage(), fn() => AuthMiddleware::requireGuest());
Router::add("/signup", "POST", fn() => $user->save(), fn() => AuthMiddleware::requireGuest());

Router::add("/logout", "GET", fn() => $user->logout(), fn() => AuthMiddleware::requireAuth());

Router::execute();