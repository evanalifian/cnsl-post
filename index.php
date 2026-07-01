<?php

use App\Config\Router;
use App\Controller\AboutController;
use App\Controller\HomeController;
use App\Controller\LandingController;
use App\Controller\UserController;
use App\Middleware\AuthMiddleware;

require_once __DIR__ . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$landing = new LandingController();
$about = new AboutController();
$user = new UserController();
$home = new HomeController();

Router::add("/", "GET", fn() => $landing->index(), fn() => AuthMiddleware::requireGuest());

Router::add("/about", "GET", fn() => $about->index());

Router::add("/signup", "GET", fn() => $user->signupPage(), fn() => AuthMiddleware::requireGuest());
Router::add("/signup", "POST", fn() => $user->save(), fn() => AuthMiddleware::requireGuest());

Router::add("/login", "GET", fn() => $user->loginPage(), fn() => AuthMiddleware::requireGuest());
Router::add("/login", "POST", fn() => $user->login(), fn() => AuthMiddleware::requireGuest());

Router::add("/home", "GET", fn() => $home->index(), fn() => AuthMiddleware::requireAuth());

Router::add("/profile", "GET", fn() => $user->profilePage(), fn() => AuthMiddleware::requireAuth());
Router::add("/profile/update", "GET", fn() => $user->updatePage(), fn() => AuthMiddleware::requireAuth());
Router::add("/profile/update", "POST", fn() => $user->update(), fn() => AuthMiddleware::requireAuth());
Router::add("/profile/delete", "GET", fn() => $user->delete(), fn() => AuthMiddleware::requireAuth());


Router::add("/logout", "GET", fn() => $user->logout(), fn() => AuthMiddleware::requireAuth());

Router::execute();