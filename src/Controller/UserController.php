<?php

namespace App\Controller;

use App\Config\Database;
use App\Config\View;
use App\Exception\ValidationException;
use App\Model\SessionModel;
use App\Model\UserModel;
use App\Repository\PostRepository;
use App\Repository\SessionRepository;
use App\Repository\UserRepository;
use App\Service\PostService;
use App\Service\SessionService;
use App\Service\UserService;
use App\Utils\Utils;

class UserController
{
  private static UserModel $userModel;
  private static SessionModel $sessionModel;
  private static UserService $userService;
  private static SessionService $sessionService;
  private static PostService $postService;

  public function __construct()
  {
    self::$userModel = new UserModel();
    self::$sessionModel = new SessionModel();
    self::$userService = new UserService(new UserRepository(Database::connect()));
    self::$sessionService = new SessionService(new SessionRepository(Database::connect()), new UserRepository(Database::connect()));
    self::$postService = new PostService(new PostRepository(Database::connect()));
  }

  private static function renderPage(
    string $typePage,
    string $pageName,
    string $title,
    array $items = [],
  ): void {
    $data = ["title" => $title];
    $data = $items ? $data + $items : $data;

    $typePage === "page" ? View::render($pageName, $data) : View::app($pageName, $data);
  }

  public function signupPage(): void
  {
    self::renderPage("page", "signup", "Create Account");
  }

  public function save(): void
  {
    try {
      self::$userModel->username = htmlspecialchars(trim($_POST["username"]));
      self::$userModel->display_name = htmlspecialchars(trim($_POST["display_name"]));
      self::$userModel->password = htmlspecialchars(trim($_POST["password"]));

      self::$userService->save(self::$userModel);
      View::redirect("/login");
    } catch (ValidationException $e) {
      self::renderPage("page", "signup", "Create Account", [
        "scripts" => ["errorToast.js"],
        "components" => ["errorToast.php"],
        "error_message" => $e->getMessage()
      ]);
    }
  }

  public function loginPage(): void
  {
    self::renderPage("page", "login", "Sign In - PHP Boilerplate");
  }

  public function login(): void
  {
    try {
      self::$userModel->username = htmlspecialchars(trim($_POST["username"]));
      self::$userModel->password = htmlspecialchars(trim($_POST["password"]));

      self::$userService->auth(self::$userModel);

      $user = self::$userService->getUserByIdentity(self::$userModel->username);

      self::$sessionService->save($user->id);

      View::redirect("/home");
    } catch (ValidationException $e) {
      self::renderPage("page", "login", "Sign In - PHP Boilerplate", [
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
    $posts = self::$postService->getAllPostsByUser($user->id);

    self::renderPage("app", "profile", "Profile", [
      "title" => "Profile",
      "user" => $user,
      "posts" => $posts,
      "styles" => ["postCard.css"],
      "scripts" => ["postCard.js", "postModal.js"],
      "components" => ["postModal.php"]
    ]);
  }

  public function settingPage(): void
  {
    $user = self::$sessionService->current();

    self::renderPage("app", "profile-settings", "Profile Settings", [
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

      self::$userService->update($user->id, self::$userModel);
      View::redirect("/profile");
    } catch (ValidationException $e) {
      self::renderPage("app", "profile-settings", "Update Profle", [
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
      self::$userService->updateAvatar($user->id, $_FILES["avatar"]);
      View::redirect("/profile/setting");
    } catch (ValidationException $e) {
      self::renderPage("app", "profile-settings", "Update Profle", [
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
      self::$userService->delete($user->id);
      View::redirect("/");
    } catch (ValidationException $e) {
      self::renderPage("app", "profile-settings", "Update Profle", [
        "title" => "Update Profile",
        "user" => $user,
        "components" => ["errorToast.php", "saveAvatarModal.php", "deleteAccountModal.php"],
        "scripts" => ["errorToast.js", "saveAvatarModal.js"],
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
    $user->created_at = Utils::formatJoinTime($user->created_at);

    $currentUser = self::$sessionService->current();

    View::app("view-user", [
      "title" => $username,
      "username" => $username,
      "user" => $user,
      "posts" => self::$postService->getAllPostsByUser($user->id),
      "currentUser" => $currentUser,
      "styles" => ["postCard.css"],
      "scripts" => ["postCard.js"]
    ]);
  }
}