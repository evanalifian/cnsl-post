<?php

namespace App\Helpers;

use App\Exception\ValidationException;
use App\Model\UserModel;
use App\Utils\Utils;

class Helpers
{
  public static function saveValidation(UserModel $model): void
  {
    if (empty($model->username) || empty($model->email) || empty($model->password)) {
      throw new ValidationException("Username, Email and Password can not be empty");
    }

    if (Utils::emailValidation($model->email)) {
      throw new ValidationException("Email is not valid");
    }
  }

  public static function authValidation(UserModel $model): void
  {
    if (empty($model->username) || empty($model->password)) {
      throw new ValidationException("Username and Password can not be empty");
    }
  }

  public static function updateValidation(UserModel $model): void
  {
    if (empty($model->username)) {
      throw new ValidationException("Username can not be empty");
    }
  }
}