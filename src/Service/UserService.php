<?php

namespace App\PHPBoilerplate\Service;

use App\PHPBoilerplate\Exception\ValidationException;
use App\PHPBoilerplate\Model\UserModel;
use App\PHPBoilerplate\Repository\UserRepository;

class UserService
{
  private static UserRepository $userRepository;

  public function __construct(UserRepository $userRepository)
  {
    self::$userRepository = $userRepository;
  }

  public function update(UserModel $userModel, int $userID): void
  {
    $model = $userModel;

    self::updateValidation($model);

    $result = self::$userRepository->findByID($userID)->fetch();

    if (!$result) {
      throw new ValidationException("User does not match");
    }

    self::$userRepository->update($model, $userID);

    $_SESSION["auth"]["name"] = $model->name;
    $_SESSION["auth"]["username"] = $model->username;
  }

  private static function updateValidation(UserModel $userModel): void
  {
    if (strlen($userModel->name) === 0 || strlen($userModel->username) === 0) {
      throw new ValidationException("Name and Username can not be empty");
    }
  }

  public function findByID(int $id_user): array {
    return self::$userRepository->findByID($id_user)->fetch();
  }

  public function delete(int $userID): void
  {
    self::$userRepository->delete($userID);
    session_destroy();
    session_unset();
  }
}