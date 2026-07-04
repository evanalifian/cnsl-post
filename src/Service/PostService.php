<?php

namespace App\Service;

use App\Config\Database;
use App\Exception\ValidationException;
use App\Helpers\Helpers;
use App\Model\PostImageModel;
use App\Model\PostModel;
use App\Repository\PostRepository;
use App\Utils\Utils;

class PostService
{
  private static PostRepository $postRepository;

  public function __construct(PostRepository $postRepository)
  {
    self::$postRepository = $postRepository;
  }

  public function save(PostModel $postModel, PostImageModel $postImageModel, array $files): void
  {
    $file_name = $files["name"];
    $file_type = $files["type"];
    $file_size = $files["size"];
    $file_tmp_name = $files["tmp_name"];
    $file_error = $files["error"];

    if (!$postModel->content) {
      throw new ValidationException("Content can not be empty");
    }

    try {
      Database::beginTransaction();

      $postModel->preview_content = Helpers::previewText($postModel->content, 100);

      self::$postRepository->savePost($postModel);

      if (!empty($file_name)) {
        $lastID = Database::connect()->lastInsertId();

        Helpers::imageValidation(
          $file_name,
          $file_type,
          $file_size,
          $file_error,
          5 * 1024 * 1024 // Maksimal 5 MB untuk post
        );

        $postImageModel->image_url = Helpers::uploadImage(
          $files,
          __DIR__ . "/../../public/uploads/post-images",
          "/public/uploads/post-images"
        );

        $postImageModel->post_id = $lastID;

        self::$postRepository->savePostImage($postImageModel);
      }

      Database::commit();
    } catch (\Exception $e) {
      Database::rollback();
      throw new ValidationException($e->getMessage());
    }
  }

  public function getAllPosts(): array
  {
    $posts = self::$postRepository->getAllPosts();

    foreach ($posts as $index => $post) {
      $posts[$index]["created_at"] = Helpers::timeAgo($post["created_at"]);
    }

    return $posts;
  }

  public function getAllPostsByUser(string|int $identity): array
  {
    $posts = self::$postRepository->getAllPostsByUser($identity);

    foreach ($posts as $index => $post) {
      $posts[$index]["created_at"] = Helpers::timeAgo($post["created_at"]);
    }

    return $posts;
  }

  public function getPostByID(int $postID): array
  {
    $post = self::$postRepository->getPostByID($postID);

    $post["created_at"] = Helpers::timeAgo($post["created_at"]);

    return $post;
  }

  public function deletePostByID(int $postID): void
  {
    try {
      Database::beginTransaction();

      self::$postRepository->deletePostByID($postID);

      Database::commit();
    } catch (\Exception $e) {
      Database::rollback();
      throw new ValidationException($e->getMessage());
    }
  }
}