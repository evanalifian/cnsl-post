<?php

namespace App\Service;

use App\Config\Database;
use App\Exception\ValidationException;
use App\Model\UserModel;
use App\Repository\UserRepository;

class UserService
{
  private static UserRepository $userRepository;

  public function __construct(UserRepository $userRepository)
  {
    self::$userRepository = $userRepository;
  }

  public function getUserByIdentity(string|int $identity): array
  {
    return self::$userRepository->getUserByIdentity($identity);
  }

  public function save(UserModel $model): void
  {
    self::saveValidation($model);

    try {
      Database::beginTransaction();

      $result = $this->getUserByIdentity($model->username);

      if ($result) {
        throw new ValidationException("User already exist");
      }

      $model->password = password_hash($model->password, PASSWORD_BCRYPT);

      self::$userRepository->save($model);

      Database::commit();
    } catch (\Exception $e) {
      Database::rollback();
      throw $e;
    }

  }

  private static function saveValidation(UserModel $model): void
  {
    if (empty($model->name) || empty($model->username) || empty($model->password)) {
      throw new ValidationException("Name, Username, and Password can not be empty");
    }
  }

  public function auth(UserModel $model): void
  {
    self::authValidation($model);

    $result = $this->getUserByIdentity($model->username);

    if (!$result) {
      throw new ValidationException("Username does not exist");
    }

    if (!password_verify($model->password, $result["password"])) {
      throw new ValidationException("Password incorrect");
    }

    $_SESSION["auth"] = $result;
  }

  private static function authValidation(UserModel $model): void
  {
    if (empty($model->username) || empty($model->password)) {
      throw new ValidationException("Username and Password can not be empty");
    }
  }

  public function update(UserModel $model, int $userID): void
  {
    self::updateValidation($model);

    try {
      Database::beginTransaction();

      $result = $this->getUserByIdentity($userID);

      if (!$result) {
        throw new ValidationException("User does not match");
      }

      self::$userRepository->update($model, $userID);

      $_SESSION["auth"]["name"] = $model->name;
      $_SESSION["auth"]["username"] = $model->username;

      Database::commit();
    } catch (\Exception $e) {
      Database::rollback();
      throw $e;
    }

  }

  private static function updateValidation(UserModel $model): void
  {
    if (empty($model->name) || empty($model->username)) {
      throw new ValidationException("Name and Username can not be empty");
    }
  }

  public function delete(int $userID): void
  {
    self::$userRepository->delete($userID);
    session_destroy();
    session_unset();
  }
}