<?php

namespace App\Utils;

class Utils
{
  public static function emailValidation(string $email): bool
  {
    return !filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  public static function formatJoinTime(string $datetime_str): string
  {
    $date = new \DateTime($datetime_str);
    return $date->format('M Y');
  }

  public static function passwordLength(string $password): int {
    return strlen($password);
  }

  public static function passwordHash(string $password): string {
    return password_hash($password, PASSWORD_BCRYPT);
  }
}