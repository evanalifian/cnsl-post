<?php

namespace App\Service;

use App\Config\Database;
use App\Exception\ValidationException;
use App\Helpers\Helpers;
use App\Model\PostImageModel;
use App\Model\PostModel;
use App\Repository\PostRepository;

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

      self::$postRepository->savePost($postModel);

      if (!empty($file_name)) {
        $lastID = Database::connect()->lastInsertId();

        $filepath = __DIR__ . "/../../public/uploads/post-images/";

        $filename = Helpers::imageCoverter($file_tmp_name, $file_name, $filepath);

        $avatar_url = "/public/uploads/post-images/" . $filename;

        $postImageModel->post_id = $lastID;
        $postImageModel->image_url = $avatar_url;

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
    return self::$postRepository->getAllPosts();
  }

  public function getAllPostsByUser(string|int $identity): array
  {
    return self::$postRepository->getAllPostsByUser($identity);
  }
}