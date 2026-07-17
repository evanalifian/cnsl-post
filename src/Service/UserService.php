<?php

namespace App\Service;

use App\Config\Database;
use App\Exception\ValidationException;
use App\Helpers\ValidationHelper;
use App\Helpers\ImageHelper;
use App\Helpers\FileHelper;
use App\Model\UserModel;
use App\Repository\UserRepository;
use App\Utils\StringUtil;
use App\Utils\SecurityUtil;

class UserService
{
  private UserRepository $userRepository;

  public function __construct(UserRepository $userRepository)
  {
    $this->userRepository = $userRepository;
  }

  public function getUserByIdentity(string|int $identity): ?UserModel
  {
    return $this->userRepository->getUserByIdentity($identity);
  }

  public function save(UserModel $userModel): void
  {
    try {
      Database::beginTransaction();

      $user = $this->getUserByIdentity($userModel->username);

      ValidationHelper::saveValidation($userModel, $user);

      $userModel->id = StringUtil::generateUniqueID();
      $userModel->username = strtolower($userModel->username);
      $userModel->password = SecurityUtil::passwordHash($userModel->password);

      $this->userRepository->save($userModel);
      Database::commit();
    } catch (\Exception $e) {
      Database::rollback();
      throw new ValidationException($e->getMessage());
    }
  }

  public function auth(UserModel $model): ?UserModel
  {
    $res = self::getUserByIdentity($model->username);
    ValidationHelper::authValidation($model, $res);
    return $res;
  }

  public function update(string $userID, UserModel $model): void
  {

    try {
      Database::beginTransaction();

      ValidationHelper::updateValidation($model);

      $result = $this->getUserByIdentity($userID);

      if (!$result) {
        throw new ValidationException("User does not match");
      }

      $model->username = strtolower($model->username);

      $this->userRepository->update($userID, $model);
      Database::commit();
    } catch (\Exception $e) {
      Database::rollback();
      throw new ValidationException($e->getMessage());
    }
  }

  public function updateAvatar(string $userID, array $files): void
  {
    ImageHelper::imageValidation($files["name"], $files["type"], $files["size"], $files["error"]);

    try {
      Database::beginTransaction();

      $user = $this->getUserByIdentity($userID);

      $avatarUrl = ImageHelper::replaceAvatar($files, $user->avatar_url, __DIR__ . "/../../public/uploads/avatars", __DIR__ . "/../..");

      $this->userRepository->updateAvatar($userID, $avatarUrl);

      Database::commit();
    } catch (\Exception $e) {
      Database::rollback();
      throw new ValidationException(
        $e->getMessage()
      );
    }
  }

  public function delete(string $userID, string $confirmText): void
  {
    try {
      Database::beginTransaction();

      if (strtolower($confirmText) !== "delete-my-account") {
        throw new ValidationException("You must type confirmation first");
      }

      $user = $this->getUserByIdentity($userID);

      FileHelper::deleteImage(__DIR__ . "/../.." . $user->avatar_url);

      $this->userRepository->delete($userID);

      Database::commit();
    } catch (\Exception $e) {
      Database::rollback();
      throw new ValidationException(
        $e->getMessage()
      );
    }
  }
}