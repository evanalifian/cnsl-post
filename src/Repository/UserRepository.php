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

  public function update(UserModel $model, int $userID): \PDOStatement
  {
    $statement = self::$connDB->prepare("UPDATE users SET username = ?, display_name = ?, bio = ? WHERE id = ?");

    try {
      $statement->execute([$model->username, $model->display_name, $model->bio, $userID]);
      return $statement;
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    }
  }

  public function delete(int $userID): \PDOStatement
  {
    $statement = self::$connDB->prepare("DELETE FROM users WHERE id = ?");
    $statement->execute([$userID]);
    return $statement;
  }
}