<?php

namespace App\Repository;

use App\Exception\ValidationException;
use App\Model\UserModel;

class SearchRepository
{
  private static \PDO $connDB;

  public function __construct(\PDO $connDB)
  {
    self::$connDB = $connDB;
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
        $userModel = new UserModel();
        $userModel->id = $row["id"];
        $userModel->username = $row["username"];
        $userModel->display_name = $row["display_name"];
        $userModel->bio = $row["bio"];
        $userModel->avatar_url = $row["avatar_url"];
        $userModel->created_at = $row["created_at"];
        $userModel->updated_at = $row["updated_at"];
        $users[] = $userModel;
      }

      return $users;
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    }
  }
}