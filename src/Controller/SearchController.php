<?php

namespace App\Controller;

use App\Config\Database;
use App\Config\View;
use App\Repository\SearchRepository;
use App\Repository\SessionRepository;
use App\Repository\UserRepository;
use App\Service\SearchService;
use App\Service\SessionService;

class SearchController
{
  private static SearchService $searchService;
  private static SessionService $sessionService;

  public function __construct()
  {
    self::$searchService = new SearchService(new SearchRepository(Database::connect()));
    self::$sessionService = new SessionService(
      new SessionRepository(Database::connect()),
      new UserRepository(Database::connect())
    );
  }

  public function index(): void
  {
    $user = self::$sessionService->current();
    $query = $_GET['query'] ?? null;

    if ($query) {
      $users = $query ? self::$searchService->findUsers(htmlspecialchars(trim($query))) : [];
      View::app("search", [
        "title" => "Search",
        "user" => $user,
        "users" => $users
      ]);
    } else {
      View::app("search", [
        "title" => "Search",
        "user" => $user
      ]);
    }
  }
}