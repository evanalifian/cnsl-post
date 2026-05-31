<?php

namespace App\PHPBoilerplate\Controller;

use App\PHPBoilerplate\Config\View;
use App\PHPBoilerplate\Config\Database;
use App\PHPBoilerplate\Model\AuthModel;
use App\PHPBoilerplate\Repository\UserRepository;
use App\PHPBoilerplate\Service\AuthService;
use App\PHPBoilerplate\Exception\ValidationException;

class AuthController
{
  private static AuthModel $authModel;
  private static AuthService $authService;

  public function __construct()
  {
    $connDB = Database::connect();
    $userRepository = new UserRepository($connDB);

    self::$authModel = new AuthModel();
    self::$authService = new AuthService($userRepository);
  }

  public function page(): void
  {
    View::render("login", [
      "title" => "Sign In - PHP Boilerplate",
      "styles" => ["login.css"]
    ]);
  }

  public function auth(): void
  {
    try {
      self::$authModel->username = $_POST["username"];
      self::$authModel->password = $_POST["password"];

      self::$authService->auth(self::$authModel);
      View::redirect("/account");
    } catch (ValidationException $e) {
      View::render("login", [
        "error_message" => $e->getMessage()
      ]);
    }
  }

  public function logout(): void
  {
    session_destroy();
    session_unset();
    View::redirect("/login");
  }
}