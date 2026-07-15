<?php

namespace App\Utils;

class SecurityUtil
{
  public static function passwordHash(string $password): string
  {
    return password_hash($password, PASSWORD_BCRYPT);
  }
}
