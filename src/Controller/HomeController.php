<?php

namespace App\Controller;

use App\Config\Database;
use App\Config\View;
use App\Repository\PostRepository;
use App\Repository\SessionRepository;
use App\Repository\UserRepository;
use App\Service\PostService;
use App\Service\SessionService;

class HomeController
{
  private static SessionService $sessionService;
  private static PostService $postService;

  public function __construct()
  {
    $connDB = Database::connect();
    $userRepository = new UserRepository($connDB);
    $sessionRepository = new SessionRepository($connDB);
    $postRepository = new PostRepository($connDB);

    self::$sessionService = new SessionService($sessionRepository, $userRepository);
    self::$postService = new PostService($postRepository);
  }

  public function index(): void
  {
    View::app("home", [
      "title" => "Home",
      "posts" => self::$postService->getAllPosts()
    ]);
  }
}