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
    self::$sessionService = new SessionService(new SessionRepository(Database::connect()), new UserRepository(Database::connect()));
    self::$postService = new PostService(new PostRepository(Database::connect()));
  }

  public function index(): void
  {
    View::app("home", [
      "title" => "Home",
      "user" => self::$sessionService->current(),
      "posts" => self::$postService->getAllPosts(),
      "styles" => ["postCard.css"],
      "scripts" => ["postCard.js"]
    ]);
  }
}