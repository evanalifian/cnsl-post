<?php

namespace App\PHPBoilerplate\Service;

use App\PHPBoilerplate\Model\SignupModel;
use App\PHPBoilerplate\Repository\UserRepository;
use App\PHPBoilerplate\Exception\ValidationException;

class SignupService
{
  private static UserRepository $userRepository;

  public function __construct(UserRepository $userRepository)
  {
    self::$userRepository = $userRepository;
  }

  public function save(SignupModel $signupModel): void
  {
    $model = $signupModel;

    self::signupValidation($model);

    $result = self::$userRepository->findByUsername($model->username)->fetch();

    if ($result) {
      throw new ValidationException("User already exist");
    }

    $model->password = password_hash($model->password, PASSWORD_BCRYPT);
    self::$userRepository->save($model);
  }

  private static function signupValidation(SignupModel $signupModel): void
  {
    if (strlen($signupModel->name) === 0 || strlen($signupModel->username) === 0 || strlen($signupModel->password) === 0) {
      throw new ValidationException("Name, Username, and Password can not be empty");
    }
  }
}