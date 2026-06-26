<?php

namespace App\Controller;

use App\Config\Database;
use App\Config\View;
use App\Exception\ValidationException;
use App\Model\SessionModel;
use App\Model\UserModel;
use App\Repository\SessionRepository;
use App\Repository\UserRepository;
use App\Service\SessionService;
use App\Service\UserService;

class UserController
{
  private static UserModel $userModel;
  private static SessionModel $sessionModel;
  private static UserService $userService;
  private static SessionService $sessionService;

  public function __construct()
  {
    $connDB = Database::connect();
    $userRepository = new UserRepository($connDB);
    $sessionRepository = new SessionRepository($connDB);

    self::$userModel = new UserModel();
    self::$sessionModel = new SessionModel();
    self::$userService = new UserService($userRepository);
    self::$sessionService = new SessionService($sessionRepository, $userRepository);
  }

  public function authPage(): void
  {
    View::render("login", [
      "title" => "Sign In - PHP Boilerplate",
      "styles" => ["form.css"]
    ]);
  }

  public function auth(): void
  {
    try {
      self::$userModel->username = htmlspecialchars(trim($_POST["username"]));
      self::$userModel->password = htmlspecialchars(trim($_POST["password"]));

      $user = self::$userService->auth(self::$userModel);
      self::$sessionService->save($user["id"]);
      View::redirect("/account");
    } catch (ValidationException $e) {
      View::render("login", [
        "title" => "Sign In - PHP Boilerplate",
        "styles" => ["form.css"],
        "error_message" => $e->getMessage()
      ]);
    }
  }

  public function signupPage(): void
  {
    View::render("signup", [
      "title" => "Sign Up - PHP Boilerplate",
      "styles" => ["form.css"]
    ]);
  }

  public function save(): void
  {
    try {
      self::$userModel->name = htmlspecialchars(trim($_POST["name"]));
      self::$userModel->username = htmlspecialchars(trim($_POST["username"]));
      self::$userModel->password = htmlspecialchars(trim($_POST["password"]));

      self::$userService->save(self::$userModel);
      View::redirect("/login");
    } catch (ValidationException $e) {
      View::render("signup", [
        "title" => "Sign Up - PHP Boilerplate",
        "styles" => ["form.css"],
        "error_message" => $e->getMessage()
      ]);
    }
  }

  public function homePage(): void
  {
    $user = self::$sessionService->current();

    View::render("home", [
      "title" => "Profile Settings - PHP Boilerplate",
      "styles" => ["form.css"],
      "user" => $user
    ]);
  }

  public function update(): void
  {
    $user = self::$sessionService->current();

    try {
      self::$userModel->name = htmlspecialchars(trim($_POST["name"]));
      self::$userModel->username = htmlspecialchars(trim($_POST["username"]));

      self::$userService->update(self::$userModel, $user["id"]);
      View::redirect("/account");
    } catch (ValidationException $e) {
      View::render("account", [
        "title" => "Profile Settings - PHP Boilerplate",
        "styles" => ["form.css"],
        "user" => $user,
        "error_message" => $e->getMessage()
      ]);
    }
  }

  public function delete(): void
  {
    $user = self::$sessionService->current();

    try {
      self::$userService->delete($user["id"]);
      View::redirect("/");
    } catch (ValidationException $e) {
      View::render("account", [
        "title" => "Profile Settings - PHP Boilerplate",
        "styles" => ["form.css"],
        "error_message" => $e->getMessage()
      ]);
    }
  }

  public function logout(): void
  {
    self::$sessionService->destroy();
    View::redirect("/login");
  }
}