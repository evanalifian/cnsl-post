<?php

namespace App\Repository;

use App\Exception\ValidationException;
use App\Model\UserModel;

class SearchRepository
{
  private static \PDO $connDB;
  private static UserModel $userModel;

  public function __construct(\PDO $connDB)
  {
    self::$connDB = $connDB;
    self::$userModel = new UserModel();
  }

  public function findUsers(string $query): ?array
  {
    try {
      $statement = self::$connDB->prepare("
        SELECT
          id,
          username,
          display_name,
          bio,
          avatar_url,
          created_at,
          updated_at
        FROM users
        WHERE MATCH (username, display_name) AGAINST (? IN BOOLEAN MODE)");
      $statement->execute([$query]);

      $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

      if (empty($result)) {
        return null;
      }

      $users = [];

      foreach ($result as $row) {
        self::$userModel->id = $row["id"];
        self::$userModel->username = $row["username"];
        self::$userModel->display_name = $row["display_name"];
        self::$userModel->bio = $row["bio"];
        self::$userModel->avatar_url = $row["avatar_url"];
        self::$userModel->created_at = $row["created_at"];
        self::$userModel->updated_at = $row["updated_at"];

        $users[] = self::$userModel;
      }

      return $users;
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    }
  }
}