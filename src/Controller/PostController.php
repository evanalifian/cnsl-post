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
  private static UserService $userService;
  private static PostService $postService;
  private static SessionService $sessionService;

  public function __construct()
  {
    self::$postModel = new PostModel();
    self::$postImageModel = new PostImageModel();
    self::$postService = new PostService(new PostRepository(Database::connect()));
    self::$userService = new UserService(new UserRepository(Database::connect()));
    self::$sessionService = new SessionService(
      new SessionRepository(Database::connect()),
      new UserRepository(Database::connect())
    );
  }

  private static function renderPage(
    string $typePage,
    string $pageName,
    string $title,
    array $items = [],
  ): void {
    $data = [
      "title" => $title,
      "user" => self::$sessionService->current()
    ];
    $data = $items ? $data + $items : $data;
    $typePage === "page" ? View::render($pageName, $data) : View::app($pageName, $data);
  }

  public function index(): void
  {
    self::renderPage("app", "create-post", "Create Post", ["scripts" => ["createPost.js"]]);
  }

  public function save(): void
  {
    $user = self::$sessionService->current();
    try {
      self::$postModel->user_id = $user->id;
      self::$postModel->content = trim($_POST["content"]);
      self::$postService->save(self::$postModel, self::$postImageModel, $_FILES["image"]);
      View::redirect("/home");
    } catch (ValidationException $e) {
      self::renderPage("app", "create-post", "Create Post", [
        "components" => ["errorToast.php"],
        "scripts" => ["createPost.js", "errorToast.js"],
        "error_message" => $e->getMessage()
      ]);
    }
  }

  public function detailPost(string $postID): void
  {
    $post = self::$postService->getPostByID($postID);
    self::renderPage("app", "detail-post", "Detail post", ["post" => $post]);
  }

  public function deletePost(string $postID): void
  {
    $user = self::$sessionService->current();
    try {
      self::$postService->deletePostByID($postID);
      View::redirect("/profile");
    } catch (ValidationException $e) {
      self::renderPage("app", "profile", "Profile", [
        "posts" => self::$postService->getAllPostsByUser($user->id),
        "styles" => ["postCard.css"],
        "scripts" => ["postCard.js", "postModal.js", "errorToast.js"],
        "components" => ["postModal.php", "errorToast.php"],
        "error_message" => $e->getMessage()
      ]);
    }
  }
}