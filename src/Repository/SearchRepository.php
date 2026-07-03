<?php

namespace App\Repository;

use App\Exception\ValidationException;

class SearchRepository
{
  private static \PDO $connDB;

  public function __construct(\PDO $connDB)
  {
    self::$connDB = $connDB;
  }

  public function findUsers(string $query): array
  {
    try {
      $statement = self::$connDB->prepare("SELECT * FROM users WHERE MATCH (username, display_name) AGAINST (? IN BOOLEAN MODE)");
      $statement->execute([$query]);
      return $statement->fetchAll() ?: [];
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    }
  }
}