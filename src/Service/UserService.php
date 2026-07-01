<?php

namespace App\Service;

use App\Config\Database;
use App\Exception\ValidationException;
use App\Helpers\Helpers;
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

  public function save(UserModel $model): array
  {
    Helpers::saveValidation($model);

    try {
      Database::beginTransaction();

      $result = $this->getUserByIdentity($model->username);

      if ($result) {
        throw new ValidationException("User already exist");
      }

      $model->password = password_hash($model->password, PASSWORD_BCRYPT);

      self::$userRepository->save($model);

      Database::commit();

      return $result;
    } catch (\Exception $e) {
      Database::rollback();
      throw new ValidationException($e->getMessage());
    }
  }

  public function auth(UserModel $model): array
  {
    Helpers::authValidation($model);

    $result = $this->getUserByIdentity($model->username);

    if (!$result) {
      throw new ValidationException("Username does not exist");
    }

    if (!password_verify($model->password, $result["password"])) {
      throw new ValidationException("Password incorrect");
    }

    return $result;
  }

  public function update(UserModel $model, int $userID): void
  {
    Helpers::updateValidation($model);

    try {
      Database::beginTransaction();

      $result = $this->getUserByIdentity($userID);

      if (!$result) {
        throw new ValidationException("User does not match");
      }

      self::$userRepository->update($model, $userID);

      Database::commit();
    } catch (\Exception $e) {
      Database::rollback();
      throw new ValidationException($e->getMessage());
    }
  }

  public function delete(int $userID): void
  {
    self::$userRepository->delete($userID);
    session_destroy();
    session_unset();
  }
}