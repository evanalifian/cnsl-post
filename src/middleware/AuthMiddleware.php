<?php

namespace App\Middleware;

use App\Config\Database;
use App\Config\View;
use App\Repository\SessionRepository;
use App\Repository\UserRepository;
use App\Service\SessionService;

class AuthMiddleware
{
  private static function sessionService(): SessionService
  {
    $connection = Database::connect();

    return new SessionService(
      new SessionRepository($connection),
      new UserRepository($connection)
    );
  }

  public static function requireAuth(): void
  {
    $user = self::sessionService()->current();

    if ($user === null) {
      View::redirect('/login');
    }
  }

  public static function requireGuest(): void
  {
    $user = self::sessionService()->current();

    if ($user !== null) {
      View::redirect('/home');
    }
  }
}