<?php

namespace App\Controller;

use App\Config\Database;
use App\Config\View;
use App\Exception\ValidationException;
use App\Model\PostImageModel;
use App\Model\PostModel;
use App\Repository\PostRepository;
use App\Repository\SessionRepository;
use App\Repository\UserRepository;
use App\Service\PostService;
use App\Service\SessionService;
use App\Service\UserService;

class PostController
{
  private static PostModel $postModel;
  private static PostImageModel $postImageModel;
  private static PostService $postService;
  private static UserService $userService;
  private static SessionService $sessionService;

  public function __construct()
  {
    $connDB = Database::connect();
    $postRepository = new PostRepository($connDB);
    $sessionRepository = new SessionRepository($connDB);
    $userRepository = new UserRepository($connDB);

    self::$postModel = new PostModel();
    self::$postImageModel = new PostImageModel();
    self::$postService = new PostService($postRepository);
    self::$userService = new UserService($userRepository);
    self::$sessionService = new SessionService($sessionRepository, $userRepository);
  }

  public function index(): void
  {
    $user = self::$sessionService->current();

    View::app("create-post", [
      "title" => "Create Post",
      "user" => $user,
      "scripts" => ["createPost.js"]
    ]);
  }

  public function save(): void
  {
    $user = self::$sessionService->current();

    try {
      self::$postModel->user_id = $user["id"];
      self::$postModel->content = trim($_POST["content"]);

      self::$postService->save(self::$postModel, self::$postImageModel, $_FILES["image"]);
      View::redirect("/home");
    } catch (ValidationException $e) {
      View::app("create-post", [
        "title" => "Create Post",
        "user" => $user,
        "components" => ["errorToast.php"],
        "scripts" => ["createPost.js", "errorToast.js"],
        "error_message" => $e->getMessage()
      ]);
    }
  }
}