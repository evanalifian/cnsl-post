<?php

namespace App\Helpers;

use App\Exception\ValidationException;
use App\Model\UserModel;
use App\Utils\Utils;

class ValidationHelper
{
  public static function saveValidation(UserModel $userModel, ?UserModel $userResult): void
  {
    if (empty($userModel->username) || empty($userModel->password)) {
      throw new ValidationException("Username and password can not be empty");
    }
    if ($userResult) {
      throw new ValidationException("User already exist");
    }
    if (strlen($userModel->username) <= 3) {
      throw new ValidationException("Username must contain at least 3 characters.");
    }
    if (!preg_match('/^[A-Za-z0-9._]+$/', $userModel->username)) {
      throw new ValidationException("Username may only contain letters, numbers, underscores (_), and periods (.)");
    }
    if (Utils::passwordLength($userModel->password) < 8) {
      throw new ValidationException("Password must be at least 8 characters long.");
    }
  }

  public static function authValidation(UserModel $userModel, ?UserModel $userResult): void
  {
    if (empty($userModel->username) || empty($userModel->password)) {
      throw new ValidationException("Username and Password can not be empty");
    }
    if (!$userResult) {
      throw new ValidationException("Username does not exist");
    }
    if (!password_verify($userModel->password, $userResult->password)) {
      throw new ValidationException("Password incorrect");
    }
  }

  public static function updateValidation(UserModel $userModel): void
  {
    if (empty($userModel->username)) {
      throw new ValidationException("Username can not be empty");
    }
  }
}
