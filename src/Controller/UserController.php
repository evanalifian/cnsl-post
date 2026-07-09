<?php

namespace App\Controller;

use App\Config\Database;
use App\Config\View;
use App\Exception\ValidationException;
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
  private UserService $userService;
  private SessionService $sessionService;
  private PostService $postService;

  public function __construct()
  {
    $this->userService = new UserService(new UserRepository(Database::connect()));
    $this->sessionService = new SessionService(new SessionRepository(Database::connect()), new UserRepository(Database::connect()));
    $this->postService = new PostService(new PostRepository(Database::connect()));
  }

  private function renderPage(
    string $typePage,
    string $pageName,
    string $title,
    array $items = [],
  ): void {
    $data = [
      "title" => $title,
      "user" => $this->sessionService->current()
    ];
    $data = $items ? $data + $items : $data;

    if (!isset($data["user"]) && $typePage === "app") {
      View::render($pageName, $data);
    } else {
      $typePage === "page" ? View::render($pageName, $data) : View::app($pageName, $data);
    }
  }

  public function signupPage(): void
  {
    $this->renderPage("page", "user/signup", "Create Account");
  }

  public function save(): void
  {
    try {
      $userModel = new UserModel();
      $userModel->username = htmlspecialchars(trim($_POST["username"]));
      $userModel->display_name = htmlspecialchars(trim($_POST["display_name"]));
      $userModel->password = htmlspecialchars(trim($_POST["password"]));

      $this->userService->save($userModel);
      View::redirect("/login");
    } catch (ValidationException $e) {
      $this->renderPage("page", "user/signup", "Create Account", [
        "scripts" => ["errorToast.js"],
        "components" => ["errorToast.php"],
        "error_message" => $e->getMessage()
      ]);
    }
  }

  public function loginPage(): void
  {
    $this->renderPage("page", "user/login", "Sign In - PHP Boilerplate");
  }

  public function login(): void
  {
    try {
      $userModel = new UserModel();
      $userModel->username = htmlspecialchars(trim($_POST["username"]));
      $userModel->password = htmlspecialchars(trim($_POST["password"]));

      $this->userService->auth($userModel);

      $user = $this->userService->getUserByIdentity($userModel->username);

      $this->sessionService->save($user->id);
      View::redirect("/home");
    } catch (ValidationException $e) {
      $this->renderPage("page", "user/login", "Sign In - PHP Boilerplate", [
        "title" => "Sign In - PHP Boilerplate",
        "scripts" => ["errorToast.js"],
        "components" => ["errorToast.php"],
        "error_message" => $e->getMessage()
      ]);
    }
  }

  public function profilePage(): void
  {
    $user = $this->sessionService->current();
    $posts = $this->postService->getAllPostsByUser($user->id);

    $this->renderPage("app", "user/profile", "Profile", [
      "title" => "Profile",
      "user" => $user,
      "posts" => $posts,
      "styles" => ["postCard.css"],
      "scripts" => ["postCard.js", "postModal.js", "shareLink.js"],
      "components" => ["postModal.php"]
    ]);
  }

  public function settingPage(): void
  {
    $user = $this->sessionService->current();

    $this->renderPage("app", "user/profile-settings", "Profile Settings", [
      "title" => "Profile Settings",
      "user" => $user,
      "components" => ["deleteAccountModal.php", "saveAvatarModal.php"],
      "scripts" => ["saveAvatarModal.js"]
    ]);
  }

  public function update(): void
  {
    $user = $this->sessionService->current();

    try {
      $userModel = new UserModel();
      $userModel->username = htmlspecialchars(trim($_POST["username"]));
      $userModel->display_name = htmlspecialchars(trim($_POST["display_name"]));
      $userModel->bio = htmlspecialchars(trim($_POST["bio"]));

      $this->userService->update($user->id, $userModel);
      View::redirect("/profile");
    } catch (ValidationException $e) {
      $this->renderPage("app", "user/profile-settings", "Update Profle", [
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
    $user = $this->sessionService->current();

    try {
      $this->userService->updateAvatar($user->id, $_FILES["avatar"]);
      View::redirect("/profile/setting");
    } catch (ValidationException $e) {
      $this->renderPage("app", "user/profile-settings", "Update Profle", [
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
    $user = $this->sessionService->current();

    try {
      $this->userService->delete($user->id);
      View::redirect("/");
    } catch (ValidationException $e) {
      $this->renderPage("app", "user/profile-settings", "Update Profle", [
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
    $this->sessionService->destroy();
    View::redirect("/login");
  }

  public function viewUser(string $username): void
  {
    $userFound = $this->userService->getUserByIdentity($username);
    
    if ($userFound) {
      $userFound->created_at = Utils::formatJoinTime($userFound->created_at);

      $this->renderPage("app", "user/view-user", $username, [
        "username" => $username,
        "userFound" => $userFound,
        "posts" => $this->postService->getAllPostsByUser($userFound->id),
        "styles" => ["postCard.css"],
        "scripts" => ["postCard.js", "shareLink.js"]
      ]);
      } else {
      $this->renderPage("page", "user/not-found", $username);
    }
  }
}