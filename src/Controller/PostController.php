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
  private UserService $userService;
  private PostService $postService;
  private SessionService $sessionService;

  public function __construct()
  {
    $this->postService = new PostService(new PostRepository(Database::connect()));
    $this->userService = new UserService(new UserRepository(Database::connect()));
    $this->sessionService = new SessionService(
      new SessionRepository(Database::connect()),
      new UserRepository(Database::connect())
    );
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
    $typePage === "page" ? View::render($pageName, $data) : View::app($pageName, $data);
  }

  public function index(): void
  {
    $this->renderPage("app", "post/create", "Create Post", ["scripts" => ["createPost.js"]]);
  }

  public function save(): void
  {
    $user = $this->sessionService->current();
    try {
      $postModel = new PostModel();
      $postImageModel = new PostImageModel();
      
      $postModel->user_id = $user->id;
      $postModel->content = trim($_POST["content"]);
      $this->postService->save($postModel, $postImageModel, $_FILES["image"]);
      View::redirect("/home");
    } catch (ValidationException $e) {
      $this->renderPage("app", "post/create", "Create Post", [
        "components" => ["errorToast.php"],
        "scripts" => ["createPost.js", "errorToast.js"],
        "error_message" => $e->getMessage()
      ]);
    }
  }

  public function detailPost(string $postID): void
  {
    $post = $this->postService->getPostByID($postID);
    $this->renderPage("app", "post/detail", "Detail post", ["post" => $post]);
  }

  public function deletePost(string $postID): void
  {
    $user = $this->sessionService->current();
    try {
      $this->postService->deletePostByID($postID);
      View::redirect("/profile");
    } catch (ValidationException $e) {
      $this->renderPage("app", "profile", "Profile", [
        "posts" => $this->postService->getAllPostsByUser($user->id),
        "styles" => ["postCard.css"],
        "scripts" => ["postCard.js", "postModal.js", "errorToast.js"],
        "components" => ["postModal.php", "errorToast.php"],
        "error_message" => $e->getMessage()
      ]);
    }
  }
}