<?php

namespace App\Controller;

use App\Config\Database;
use App\Config\View;
use App\Repository\SessionRepository;
use App\Repository\UserRepository;
use App\Service\SessionService;

class HomeController
{
  private static SessionService $sessionService;

  public function __construct()
  {
    $connDB = Database::connect();
    $userRepository = new UserRepository($connDB);
    $sessionRepository = new SessionRepository($connDB);

    self::$sessionService = new SessionService($sessionRepository, $userRepository);
  }

  public function index(): void
  {
    View::app("home", ["title" => "Home"]);
  }
}