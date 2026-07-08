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
  private SessionService $sessionService;
  private PostService $postService;

  public function __construct()
  {
    $this->sessionService = new SessionService(new SessionRepository(Database::connect()), new UserRepository(Database::connect()));
    $this->postService = new PostService(new PostRepository(Database::connect()));
  }

  public function index(): void
  {
    View::app("home", [
      "title" => "Home",
      "user" => $this->sessionService->current(),
      "posts" => $this->postService->getAllPosts(),
      "styles" => ["postCard.css"],
      "scripts" => ["postCard.js"]
    ]);
  }
}