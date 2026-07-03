<?php

namespace App\Repository;

use App\Exception\ValidationException;
use App\Model\UserModel;

class UserRepository
{
  private static \PDO $connDB;

  public function __construct(\PDO $connDB)
  {
    self::$connDB = $connDB;
  }

  public function getUserByIdentity(string|int $identity): array
  {
    $statement = self::$connDB->prepare("
      SELECT
          u.id,
          u.username,
          u.email,
          u.password,
          u.display_name,
          u.bio,
          u.avatar_url,
          u.created_at,
          (SELECT COUNT(*) FROM follows WHERE following_id = u.id) AS follower,
          (SELECT COUNT(*) FROM follows WHERE follower_id = u.id) AS following
      FROM users AS u
      WHERE u.id = ? OR u.username = ?;
    ");
    $statement->execute([$identity, $identity]);
    return $statement->fetch() ?: [];
  }

  public function isFollowing(int $followerID, int $followingID): bool
  {
    $statement = self::$connDB->prepare("SELECT 1 FROM follows WHERE follower_id = ? AND following_id = ? LIMIT 1");
    $statement->execute([$followerID, $followingID]);
    return (bool) $statement->fetchColumn();
  }

  public function save(UserModel $model): \PDOStatement
  {
    $statement = self::$connDB->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");

    try {
      $statement->execute([$model->username, $model->email, $model->password]);
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    }

    return $statement;
  }

  public function update(int $userID, UserModel $model): \PDOStatement
  {
    try {
      $statement = self::$connDB->prepare("UPDATE users SET username = ?, display_name = ?, bio = ? WHERE id = ?");
      $statement->execute([$model->username, $model->display_name, $model->bio, $userID]);
      return $statement;
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    }
  }

  public function updateAvatar(int $userID, string $avatar_url): \PDOStatement
  {
    try {
      $statement = self::$connDB->prepare("UPDATE users SET avatar_url = ? WHERE id = ?");
      $statement->execute([$avatar_url, $userID]);
      return $statement;
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    }
  }

  public function delete(int $userID): \PDOStatement
  {
    try {
      $statement = self::$connDB->prepare("DELETE FROM users WHERE id = ?");
      $statement->execute([$userID]);
      return $statement;
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    }
  }

  public function follow(int $followerID, int $followingID): \PDOStatement
  {
    try {
      $statement = self::$connDB->prepare("INSERT INTO follows (follower_id, following_id) VALUES (?, ?)");
      $statement->execute([$followerID, $followingID]);
      return $statement;
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    }
  }

  public function unfollow(int $followerID, int $followingID): \PDOStatement
  {
    try {
      $statement = self::$connDB->prepare("DELETE FROM follows WHERE follower_id = ? AND following_id = ?");
      $statement->execute([$followerID, $followingID]);
      return $statement;
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    }
  }
}