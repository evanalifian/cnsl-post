<?php

namespace App\Repository;

use App\Exception\ValidationException;
use App\Model\PostImageModel;
use App\Model\PostModel;
use App\Model\PostResponseModel;

class PostRepository
{
  private \PDO $connDB;

  public function __construct(\PDO $connDB)
  {
    $this->connDB = $connDB;
  }

  public function savePost(PostModel $model): \PDOStatement
  {
    $statement = $this->connDB->prepare("INSERT INTO posts (id, user_id, preview_content, content) VALUES (?, ?, ?, ?)");
    
    try {
      $statement->execute([$model->id, $model->user_id, $model->preview_content, $model->content]);
      return $statement;
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    } finally {
      $statement->closeCursor();
    }
  }

  public function savePostImage(PostImageModel $model): \PDOStatement
  {
    $statement = $this->connDB->prepare("INSERT INTO post_images (id, post_id, image_url) VALUES (?, ?, ?)");
    try {
      $statement->execute([$model->id, $model->post_id, $model->image_url]);
      return $statement;
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    } finally {
      $statement->closeCursor();
    }
  }

  public function getAllPosts(): ?array
  {
    $statement = $this->connDB->prepare("
      SELECT
        p.id AS post_id,
        p.content,
        p.preview_content,
        pi.image_url,
        p.created_at,
        u.id AS user_id,
        u.username,
        u.display_name,
        u.avatar_url
      FROM posts AS p
      LEFT JOIN post_images AS pi ON pi.post_id = p.id
      LEFT JOIN users AS u ON u.id = p.user_id
      ORDER BY p.created_at DESC
    ");

    try {
      $statement->execute();

      $results = $statement->fetchAll();

      if (empty($results)) {
        return null;
      }

      $posts = [];

      foreach ($results as $res) {
        $postResponseModel = new PostResponseModel();
        $postResponseModel->post_id = $res["post_id"];
        $postResponseModel->content = $res["content"];
        $postResponseModel->preview_content = $res["preview_content"];
        $postResponseModel->image_url = $res["image_url"];
        $postResponseModel->created_at = $res["created_at"];
        $postResponseModel->user_id = $res["user_id"];
        $postResponseModel->username = $res["username"];
        $postResponseModel->display_name = $res["display_name"];
        $postResponseModel->avatar_url = $res["avatar_url"];

        $posts[] = $postResponseModel;
      }

      return $posts;
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    } finally {
      $statement->closeCursor();
    }
  }

  public function getAllPostsByUser(string|int $identity): ?array
  {
    $statement = $this->connDB->prepare("
      SELECT
        p.id AS post_id,
        p.content,
        p.preview_content,
        pi.image_url,
        p.created_at,
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

    try {
      $statement->execute([$identity, $identity]);

      $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

      if (empty($results)) {
        return null;
      }

      $posts = [];

      foreach ($results as $res) {
        $postResponseModel = new PostResponseModel();
        $postResponseModel->post_id = $res["post_id"];
        $postResponseModel->content = $res["content"];
        $postResponseModel->preview_content = $res["preview_content"];
        $postResponseModel->image_url = $res["image_url"];
        $postResponseModel->created_at = $res["created_at"];
        $postResponseModel->user_id = $res["user_id"];
        $postResponseModel->username = $res["username"];
        $postResponseModel->display_name = $res["display_name"];
        $postResponseModel->avatar_url = $res["avatar_url"];

        $posts[] = $postResponseModel;
      }

      return $posts;
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    } finally {
      $statement->closeCursor();
    }
  }

  public function getPostByID(string $postID): ?PostResponseModel
  {
    $statement = $this->connDB->prepare("
      SELECT
        p.id AS post_id,
        p.content,
        p.preview_content,
        pi.image_url,
        p.created_at,
        u.id AS user_id,
        u.username,
        u.display_name,
        u.avatar_url
      FROM posts AS p
      LEFT JOIN post_images AS pi ON pi.post_id = p.id
      LEFT JOIN users AS u ON u.id = p.user_id
      WHERE p.id = ?
    ");

    try {
      $statement->execute([$postID]);

      if ($row = $statement->fetch()) {
        $postResponseModel = new PostResponseModel();
        $postResponseModel->post_id = $row["post_id"];
        $postResponseModel->content = $row["content"];
        $postResponseModel->preview_content = $row["preview_content"];
        $postResponseModel->image_url = $row["image_url"];
        $postResponseModel->created_at = $row["created_at"];
        $postResponseModel->user_id = $row["user_id"];
        $postResponseModel->username = $row["username"];
        $postResponseModel->display_name = $row["display_name"];
        $postResponseModel->avatar_url = $row["avatar_url"];

        return $postResponseModel;
      } else {
        return null;
      }
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    } finally {
      $statement->closeCursor();
    }
  }

  public function deletePostByID(string $postID): \PDOStatement
  {
    $statement = $this->connDB->prepare("DELETE FROM posts WHERE id = ?");
    
    try {
      $statement->execute([$postID]);
      return $statement;
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    } finally {
      $statement->closeCursor();
    }
  }
}