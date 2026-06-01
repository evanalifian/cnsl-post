<?php

namespace App\PHPBoilerplate\Controller;

use App\PHPBoilerplate\Config\Database;
use App\PHPBoilerplate\Config\View;
use App\PHPBoilerplate\Exception\ValidationException;
use App\PHPBoilerplate\Model\UserModel;
use App\PHPBoilerplate\Repository\UserRepository;
use App\PHPBoilerplate\Service\UserService;

class UserController
{
  private static UserModel $userModel;
  private static UserService $userService;

  public function __construct()
  {
    $connDB = Database::connect();
    $userRepository = new UserRepository($connDB);

    self::$userModel = new UserModel();
    self::$userService = new UserService($userRepository);
  }

  public function page(): void
  {
    View::render("account", [
      "title" => "Profile Settings - PHP Boilerplate",
      "styles" => ["form.css"],
      "user" => self::$userService->findByID($_SESSION["auth"]["id"])
    ]);
  }

  public function update(): void
  {
    try {
      self::$userModel->name = $_POST["name"];
      self::$userModel->username = $_POST["username"];

      self::$userService->update(self::$userModel, $_SESSION['auth']["id"]);
      View::redirect("/account");
    } catch (ValidationException $e) {
      View::render("account", [
        "title" => "Profile Settings - PHP Boilerplate",
        "styles" => ["form.css"],
        "user" => self::$userService->findByID($_SESSION["auth"]["id"]),
        "error_message" => $e->getMessage()
      ]);
    }
  }

  public function delete(): void
  {
    try {
      self::$userService->delete($_SESSION['auth']["id"]);
      View::redirect("/");
    } catch (ValidationException $e) {
      View::render("account", [
        "title" => "Profile Settings - PHP Boilerplate",
        "styles" => ["form.css"],
        "error_message" => $e->getMessage()
      ]);
    }
  }
}