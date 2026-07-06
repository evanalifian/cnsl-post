<?php

namespace App\Repository;

use App\Exception\ValidationException;
use App\Model\UserModel;

class UserRepository
{
  private static \PDO $connDB;
  private static UserModel $userModel;

  public function __construct(\PDO $connDB)
  {
    self::$connDB = $connDB;
    self::$userModel = new UserModel();
  }

  public function getUserByIdentity(string|int $identity): ?UserModel
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
          u.updated_at
      FROM users AS u
      WHERE u.id = ? OR u.username = ?;
    ");

    $statement->execute([$identity, $identity]);

    try {
      if ($row = $statement->fetch()) {
        self::$userModel->id = $row["id"];
        self::$userModel->username = $row["username"];
        self::$userModel->email = $row["email"];
        self::$userModel->password = $row["password"];
        self::$userModel->display_name = $row["display_name"];
        self::$userModel->bio = $row["bio"];
        self::$userModel->avatar_url = $row["avatar_url"];
        self::$userModel->created_at = $row["created_at"];
        self::$userModel->updated_at = $row["updated_at"];

        return self::$userModel;
      } else {
        return null;
      }
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    } finally {
      $statement->closeCursor();
    }
  }

  public function save(UserModel $model): \PDOStatement
  {
    $statement = self::$connDB->prepare("INSERT INTO users (id, username, email, password) VALUES (?, ?, ?, ?)");

    try {
      $statement->execute([$model->id, $model->username, $model->email, $model->password]);
      return $statement;
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    } finally {
      $statement->closeCursor();
    }
  }

  public function update(string $userID, UserModel $model): \PDOStatement
  {
    $statement = self::$connDB->prepare("UPDATE users SET username = ?, display_name = ?, bio = ? WHERE id = ?");

    try {
      $statement->execute([$model->username, $model->display_name, $model->bio, $userID]);
      return $statement;
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    } finally {
      $statement->closeCursor();
    }
  }

  public function updateAvatar(string $userID, string $avatar_url): \PDOStatement
  {
    $statement = self::$connDB->prepare("UPDATE users SET avatar_url = ? WHERE id = ?");

    try {
      $statement->execute([$avatar_url, $userID]);
      return $statement;
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    } finally {
      $statement->closeCursor();
    }
  }

  public function delete(string $userID): \PDOStatement
  {
    $statement = self::$connDB->prepare("DELETE FROM users WHERE id = ?");

    try {
      $statement->execute([$userID]);
      return $statement;
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    } finally {
      $statement->closeCursor();
    }
  }
}