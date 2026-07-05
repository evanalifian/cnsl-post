<?php

namespace App\Service;

use App\Config\Database;
use App\Exception\ValidationException;
use App\Helpers\Helpers;
use App\Model\UserModel;
use App\Repository\UserRepository;
use App\Utils\Utils;

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
    try {
      Database::beginTransaction();

      $user = $this->getUserByIdentity($model->username);

      Helpers::saveValidation($model, $user);

      $model->id = bin2hex(random_bytes(32));
      $model->password = Utils::passwordHash($model->password);

      self::$userRepository->save($model);

      Database::commit();

      return $user;
    } catch (\Exception $e) {
      Database::rollback();
      throw new ValidationException($e->getMessage());
    }
  }

  public function auth(UserModel $model): array
  {
    $res = $this->getUserByIdentity($model->username);

    Helpers::authValidation($model, $res);

    return $res;
  }

  public function update(string $userID, UserModel $model): void
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

  public function updateAvatar(
    string $userID,
    array $files
  ): void {

    Helpers::imageValidation(
      $files["name"],
      $files["type"],
      $files["size"],
      $files["error"]
    );

    try {

      Database::beginTransaction();

      $user = $this->getUserByIdentity($userID);

      $avatarUrl = Helpers::replaceAvatar(
        $files,
        $user["avatar_url"],
        __DIR__ . "/../../public/uploads/avatars",
        __DIR__ . "/../.."
      );

      self::$userRepository->updateAvatar(
        $userID,
        $avatarUrl
      );

      Database::commit();

    } catch (\Exception $e) {

      Database::rollback();

      throw new ValidationException(
        $e->getMessage()
      );

    }
  }

  public function delete(string $userID): void
  {
    try {

      Database::beginTransaction();

      $user = $this->getUserByIdentity($userID);

      Helpers::deleteImage(
        __DIR__ . "/../.." . $user["avatar_url"]
      );

      self::$userRepository->delete($userID);

      Database::commit();

    } catch (\Exception $e) {

      Database::rollback();

      throw new ValidationException(
        $e->getMessage()
      );

    }
  }
}