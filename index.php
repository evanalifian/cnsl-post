<?php

use App\Config\Router;
use App\Controller\AboutController;
use App\Controller\HomeController;
use App\Controller\LandingController;
use App\Controller\PostController;
use App\Controller\SearchController;
use App\Controller\UserController;
use App\Middleware\AuthMiddleware;

require_once __DIR__ . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$landing = new LandingController();
$about = new AboutController();
$user = new UserController();
$home = new HomeController();
$search = new SearchController();
$post = new PostController();

Router::add("/", "GET", fn() => $landing->index(), fn() => AuthMiddleware::requireGuest());

Router::add("/about", "GET", fn() => $about->index());

Router::add("/signup", "GET", fn() => $user->signupPage(), fn() => AuthMiddleware::requireGuest());
Router::add("/signup", "POST", fn() => $user->save(), fn() => AuthMiddleware::requireGuest());

Router::add("/login", "GET", fn() => $user->loginPage(), fn() => AuthMiddleware::requireGuest());
Router::add("/login", "POST", fn() => $user->login(), fn() => AuthMiddleware::requireGuest());

Router::add("/home", "GET", fn() => $home->index(), fn() => AuthMiddleware::requireAuth());

Router::add("/profile", "GET", fn() => $user->profilePage(), fn() => AuthMiddleware::requireAuth());
Router::add("/profile/setting", "GET", fn() => $user->settingPage(), fn() => AuthMiddleware::requireAuth());
Router::add("/profile/update", "POST", fn() => $user->update(), fn() => AuthMiddleware::requireAuth());
Router::add("/profile/update-avatar", "POST", fn() => $user->updateAvatar(), fn() => AuthMiddleware::requireAuth());
Router::add("/profile/delete", "POST", fn() => $user->delete(), fn() => AuthMiddleware::requireAuth());

Router::add("/logout", "GET", fn() => $user->logout(), fn() => AuthMiddleware::requireAuth());

Router::add("/search", "GET", fn() => $search->index(), fn() => AuthMiddleware::requireAuth());
Router::add("/user/([0-9a-zA-Z]*)", "GET", fn(string $username) => $user->viewUser((string) $username), fn() => AuthMiddleware::requireAuth());

Router::add("/post/create", "GET", fn() => $post->index(), fn() => AuthMiddleware::requireAuth());
Router::add("/post/create", "POST", fn() => $post->save(), fn() => AuthMiddleware::requireAuth());
Router::add("/post/([0-9]*)", "GET", fn($postID) => $post->detailPost((int) $postID), fn() => AuthMiddleware::requireAuth());
Router::add("/post/([0-9]*)/delete", "POST", fn($postID) => $post->deletePost((int) $postID), fn() => AuthMiddleware::requireAuth());

Router::execute();