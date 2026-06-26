<?php

namespace App\Config;

use PDO;

class Database
{
  private static ?PDO $connection = null;

  public static function connect(): PDO
  {
    if (self::$connection === null) {

      $host = getenv('DB_HOST') ?: 'localhost';
      $port = getenv('DB_PORT') ?: '3306';
      $database = getenv('DB_DATABASE') ?: 'php_boilerplate';
      $username = getenv('DB_USERNAME') ?: 'root';
      $password = getenv('DB_PASSWORD') ?: '';

      $dsn = sprintf(
        'mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4',
        $host,
        $port,
        $database
      );

      self::$connection = new PDO(
        $dsn,
        $username,
        $password,
        [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false,
        ]
      );
    }

    return self::$connection;
  }

  public static function beginTransaction(): bool
  {
    return self::connect()->beginTransaction();
  }

  public static function commit(): bool
  {
    return self::connect()->commit();
  }

  public static function rollback(): bool
  {
    return self::connect()->rollBack();
  }
}