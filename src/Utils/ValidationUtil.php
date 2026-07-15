<?php

namespace App\Utils;

class ValidationUtil
{
  public static function emailValidation(string $email): bool
  {
    return !filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  public static function usernameValidation(string $username): bool
  {
    return !preg_match('/^[A-Za-z0-9._]+$/', $username);
  }
}
