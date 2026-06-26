<?php

namespace App\Repository;

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
    $statement = self::$connDB->prepare("SELECT * FROM users WHERE id = ? OR username = ?");
    $statement->execute([$identity, $identity]);
    return $statement->fetch()?:[];
  }

  public function save(UserModel $model): \PDOStatement
  {
    $statement = self::$connDB->prepare("INSERT INTO users (name, username, password) VALUES (?, ?, ?)");
    $statement->execute([$model->name, $model->username, $model->password]);
    return $statement;
  }

  public function update(UserModel $model, int $userID): \PDOStatement
  {
    $statement = self::$connDB->prepare("UPDATE users SET name = ?, username = ? WHERE id = ?");
    $statement->execute([$model->name, $model->username, $userID]);
    return $statement;
  }

  public function delete(int $userID): \PDOStatement
  {
    $statement = self::$connDB->prepare("DELETE FROM users WHERE id = ?");
    $statement->execute([$userID]);
    return $statement;
  }
}