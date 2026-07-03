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

  public function update(int $userID, UserModel $model): void
  {
    Helpers::updateValidation($model);

    try {
      Database::beginTransaction();

      $result = $this->getUserByIdentity($userID);

      if (!$result) {
        throw new ValidationException("User does not match");
      }

      self::$userRepository->update($userID, $model);

      Database::commit();
    } catch (\Exception $e) {
      Database::rollback();
      throw new ValidationException($e->getMessage());
    }
  }

  public function updateAvatar(int $userID, array $files): void
  {
    $file_name = $files["name"];
    $file_type = $files["type"];
    $file_size = $files["size"];
    $file_tmp_name = $files["tmp_name"];
    $file_error = $files["error"];

    Helpers::updateAvatarValidation($file_name, $file_type, $file_size, $file_error);

    try {
      Database::beginTransaction();

      $filepath = __DIR__ . "/../../public/uploads/avatars/";

      $filename = Helpers::updateAvatar($file_tmp_name, $file_name, $filepath);

      $avatar_url = "/public/uploads/avatars/" . $filename;

      $user = self::getUserByIdentity($userID);

      Helpers::deleteAvatar(__DIR__ . "/../.." . $user["avatar_url"]);

      self::$userRepository->updateAvatar($userID, $avatar_url);

      Database::commit();
    } catch (\Exception $e) {
      Database::rollback();
      throw new ValidationException($e->getMessage());
    }
  }

  public function delete(int $userID): void
  {
    try {
      Database::beginTransaction();

      $user = self::getUserByIdentity($userID);

      Helpers::deleteAvatar(__DIR__ . "/../.." . $user["avatar_url"]);

      self::$userRepository->delete($userID);

      Database::commit();
    } catch (\Exception $e) {
      Database::rollback();
      throw new ValidationException($e->getMessage());
    }
  }
}