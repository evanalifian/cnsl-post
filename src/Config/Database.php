<?php

namespace App\PHPBoilerplate\Config;

class Database
{
  public static function connect(): \PDO
  {
    $db_host = getenv("DB_HOST") ?: "localhost";
    $db_port = getenv("DB_PORT") ?: "3306";
    $db_database = getenv("DB_DATABASE") ?: "ceritawa";
    $db_username = getenv("DB_USERNAME") ?: "root";
    $db_password = getenv("DB_PASSWORD") ?: "";

    return new \PDO("mysql:host=$db_host:$db_port;dbname=$db_database", $db_username, $db_password);
  }
}