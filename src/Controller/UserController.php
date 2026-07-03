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
use App\Utils\Utils;

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

  public function signupPage(): void
  {
    View::render("signup", ["title" => "Create Account"]);
  }

  public function save(): void
  {
    try {
      self::$userModel->username = htmlspecialchars(trim($_POST["username"]));
      self::$userModel->email = htmlspecialchars(trim($_POST["email"]));
      self::$userModel->password = htmlspecialchars(trim($_POST["password"]));

      self::$userService->save(self::$userModel);
      View::redirect("/login");
    } catch (ValidationException $e) {
      View::render("signup", [
        "title" => "Create Account",
        "scripts" => ["errorToast.js"],
        "components" => ["errorToast.php"],
        "error_message" => $e->getMessage()
      ]);
    }
  }

  public function loginPage(): void
  {
    View::render("login", ["title" => "Sign In - PHP Boilerplate"]);
  }

  public function login(): void
  {
    try {
      self::$userModel->username = htmlspecialchars(trim($_POST["username"]));
      self::$userModel->password = htmlspecialchars(trim($_POST["password"]));

      $user = self::$userService->auth(self::$userModel);
      self::$sessionService->save($user["id"]);
      View::redirect("/home");
    } catch (ValidationException $e) {
      View::render("login", [
        "title" => "Sign In - PHP Boilerplate",
        "scripts" => ["errorToast.js"],
        "components" => ["errorToast.php"],
        "error_message" => $e->getMessage()
      ]);
    }
  }

  public function profilePage(): void
  {
    $user = self::$sessionService->current();
    $user["created_at"] = Utils::formatJoinTime($user["created_at"]);

    View::app("profile", [
      "title" => "Profile",
      "user" => $user
    ]);
  }

  public function settingPage(): void
  {
    $user = self::$sessionService->current();

    View::app("profile-settings", [
      "title" => "Profile Settings",
      "user" => $user,
      "components" => ["deleteAccountModal.php", "saveAvatarModal.php"],
      "scripts" => ["saveAvatarModal.js"]
    ]);
  }

  public function update(): void
  {
    $user = self::$sessionService->current();

    try {
      self::$userModel->username = htmlspecialchars(trim($_POST["username"]));
      self::$userModel->display_name = htmlspecialchars(trim($_POST["display_name"]));
      self::$userModel->bio = htmlspecialchars(trim($_POST["bio"]));

      self::$userService->update($user["id"], self::$userModel);
      View::redirect("/profile");
    } catch (ValidationException $e) {
      View::app("profile-settings", [
        "title" => "Update Profile",
        "user" => $user,
        "components" => ["errorToast.php", "saveAvatarModal.php", "deleteAccountModal.php"],
        "scripts" => ["errorToast.js", "saveAvatarModal.js"],
        "error_message" => $e->getMessage()
      ]);
    }
  }

  public function updateAvatar(): void
  {
    $user = self::$sessionService->current();

    try {
      self::$userService->updateAvatar($user["id"], $_FILES["avatar"]);
      View::redirect("/profile");
    } catch (ValidationException $e) {
      View::app("profile-settings", [
        "title" => "Update Profile",
        "user" => $user,
        "components" => ["errorToast.php", "saveAvatarModal.php", "deleteAccountModal.php"],
        "scripts" => ["errorToast.js", "saveAvatarModal.js"],
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

  public function viewUser(string $username): void
  {
    $user = self::$userService->getUserByIdentity($username);
    $user["created_at"] = Utils::formatJoinTime($user["created_at"]);

    $currentUser = self::$sessionService->current();
    $isFollowing = self::$userService->isFollowing($currentUser["id"], $user["id"]);

    View::app("view-user", [
      "title" => $username,
      "username" => $username,
      "user" => $user,
      "currentUser" => $currentUser,
      "isFollowing" => $isFollowing
    ]);
  }

  public function folllow(int $id): void
  {
    try {
      $user = self::$sessionService->current();
      self::$userService->follow($user["id"], $id);

    } catch (ValidationException $e) {
      var_dump($e->getMessage());
    }
  }

  public function unfolllow(int $id): void
  {
    try {
      $user = self::$sessionService->current();
      self::$userService->unfollow($user["id"], $id);

    } catch (ValidationException $e) {
      var_dump($e->getMessage());
    }
  }
}