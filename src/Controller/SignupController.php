<?php

namespace App\PHPBoilerplate\Controller;

use App\PHPBoilerplate\Config\View;
use App\PHPBoilerplate\Config\Database;
use App\PHPBoilerplate\Model\SignupModel;
use App\PHPBoilerplate\Repository\UserRepository;
use App\PHPBoilerplate\Service\SignupService;
use App\PHPBoilerplate\Exception\ValidationException;

class SignupController
{
  static private SignupModel $signupModel;
  static private SignupService $signupService;

  public function __construct()
  {
    $connDB = Database::connect();
    $userRepository = new UserRepository($connDB);

    self::$signupModel = new SignupModel();
    self::$signupService = new SignupService($userRepository);
  }

  public function page(): void
  {
    View::render("signup", [
      "title" => "Sign Up - PHP Boilerplate",
      "styles" => ["form.css"]
    ]);
  }

  public function save(): void
  {
    try {
      self::$signupModel->name = $_POST["name"];
      self::$signupModel->username = $_POST["username"];
      self::$signupModel->password = $_POST["password"];

      self::$signupService->save(self::$signupModel);
      View::redirect("/login");
    } catch (ValidationException $e) {
      View::render("signup", [
        "title" => "Sign Up - PHP Boilerplate",
        "styles" => ["form.css"],
        "error_message" => $e->getMessage()
      ]);
    }
  }
}