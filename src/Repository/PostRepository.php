<?php

namespace App\Repository;

use App\Exception\ValidationException;
use App\Model\PostImageModel;
use App\Model\PostModel;

class PostRepository
{
  private static \PDO $connDB;

  public function __construct(\PDO $connDB)
  {
    self::$connDB = $connDB;
  }

  public function savePost(PostModel $model): \PDOStatement
  {
    try {
      $statement = self::$connDB->prepare("INSERT INTO posts (user_id, preview_content, content) VALUES (?, ?, ?)");
      $statement->execute([$model->user_id, $model->preview_content, $model->content]);
      return $statement;
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    }
  }

  public function savePostImage(PostImageModel $model): \PDOStatement
  {
    try {
      $statement = self::$connDB->prepare("INSERT INTO post_images (post_id, image_url) VALUES (?, ?)");
      $statement->execute([$model->post_id, $model->image_url]);
      return $statement;
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    }
  }

  public function getAllPosts(): array
  {
    try {
      $statement = self::$connDB->prepare("
        SELECT
          p.id AS post_id,
          p.preview_content,
          p.content,
          p.created_at,
          pi.image_url,
          u.id AS user_id,
          u.username,
          u.display_name,
          u.avatar_url
        FROM posts AS p
        LEFT JOIN post_images AS pi ON pi.post_id = p.id
        LEFT JOIN users AS u ON u.id = p.user_id
        ORDER BY p.created_at DESC
      ");
      $statement->execute();
      return $statement->fetchAll() ?: [];
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    }
  }

  public function getAllPostsByUser(string|int $identity): array
  {
    try {
      $statement = self::$connDB->prepare("
        SELECT
          p.id AS post_id,
          p.content,
          p.preview_content,
          p.created_at,
          pi.image_url,
          u.id AS user_id,
          u.username,
          u.display_name,
          u.avatar_url
        FROM posts AS p
        LEFT JOIN post_images AS pi ON pi.post_id = p.id
        LEFT JOIN users AS u ON u.id = p.user_id
        WHERE u.id = ? OR u.username = ?
        ORDER BY p.created_at DESC
      ");
      $statement->execute([$identity, $identity]);
      return $statement->fetchAll() ?: [];
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    }
  }

  public function getPostByID(int $postID): array
  {
    try {
      $statement = self::$connDB->prepare("
        SELECT
          p.id AS post_id,
          p.content,
          p.preview_content,
          p.created_at,
          pi.image_url,
          u.id AS user_id,
          u.username,
          u.display_name,
          u.avatar_url
        FROM posts AS p
        LEFT JOIN post_images AS pi ON pi.post_id = p.id
        LEFT JOIN users AS u ON u.id = p.user_id
        WHERE p.id = ?
      ");
      $statement->execute([$postID]);
      return $statement->fetch() ?: [];
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    }
  }
}