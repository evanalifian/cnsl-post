<?php

namespace App\Helpers;

use App\Exception\ValidationException;
use App\Model\UserModel;
use App\Utils\Utils;

class Helpers
{
  public static function saveValidation(UserModel $userModel, ?UserModel $userResult): void
  {
    if (empty($userModel->username) || empty($userModel->password)) {
      throw new ValidationException("Username and password can not be empty");
    }
    if ($userResult) {
      throw new ValidationException("User already exist");
    }
    if (strlen($userModel->username) < 3) {
      throw new ValidationException("Username must contain at least 3 characters.");
    }
    if (Utils::usernameValidation($userModel->username)) {
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
    if (Utils::usernameValidation($userModel->username)) {
      throw new ValidationException("Username may only contain letters, numbers, underscores (_), and periods (.)");
    }
  }

  public static function imageValidation(
    string $file_name,
    string $file_type,
    int $file_size,
    int $file_error,
    int $max_size = 2 * 1024 * 1024
  ): void {
    if ($file_error !== UPLOAD_ERR_OK) {
      if ($file_error === UPLOAD_ERR_INI_SIZE) {
        throw new ValidationException(
          "The file is too large (exceeds server limits)"
        );
      }

      throw new ValidationException(
        "An error occurred during file upload"
      );
    }

    if ($file_name === '' || $file_size === 0) {
      throw new ValidationException("File can not be empty");
    }

    if ($file_size > $max_size) {
      throw new ValidationException(
        "The file size must not exceed " .
        round($max_size / 1024 / 1024) .
        "MB"
      );
    }

    $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if (!in_array($extension, ['jpg', 'jpeg', 'png'], true)) {
      throw new ValidationException(
        "The file must be in PNG, JPG, or JPEG format"
      );
    }
  }

  public static function imageConverter(
    array $file,
    string $directory
  ): string {

    $filename = Utils::generateImageName(
      $file["name"]
    );

    $destination =
      rtrim($directory, DIRECTORY_SEPARATOR)
      . DIRECTORY_SEPARATOR
      . $filename;

    Utils::convertToWebp(
      $file["tmp_name"],
      $destination,
      $file["type"]
    );

    return $filename;
  }

  public static function replaceAvatar(
    array $file,
    string $oldAvatar,
    string $uploadDirectory,
    string $projectRoot
  ): string {

    $avatarUrl = self::uploadImage(
      $file,
      $uploadDirectory,
      "/public/uploads/avatars"
    );

    self::deleteImage($projectRoot . $oldAvatar);

    return $avatarUrl;
  }

  public static function uploadImage(
    array $file,
    string $uploadDirectory,
    string $publicDirectory
  ): string {

    $filename = self::imageConverter(
      $file,
      $uploadDirectory
    );

    return rtrim($publicDirectory, "/") . "/" . $filename;
  }

  public static function deleteImage(
    string $path,
    string $defaultImage = "/public/assets/default-avatar.png"
  ): void {

    // Jangan hapus gambar bawaan
    if (
      $path === $defaultImage ||
      str_ends_with($path, $defaultImage)
    ) {
      return;
    }

    if (file_exists($path) && !unlink($path)) {
      throw new ValidationException("The file could not be deleted");
    }
  }

  public static function timeAgo(string $datetime): string
  {
    $timezone = new \DateTimeZone('Asia/Jakarta');

    $postedAt = new \DateTime($datetime, $timezone);
    $now = new \DateTime('now', $timezone);

    $diff = $postedAt->diff($now);

    if ($diff->y > 0) {
      return $diff->y . ' year' . ($diff->y > 1 ? 's' : '') . ' ago';
    }

    if ($diff->m > 0) {
      return $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
    }

    if ($diff->d > 0) {
      return $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . ' ago';
    }

    if ($diff->h > 0) {
      return $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
    }

    if ($diff->i > 0) {
      return $diff->i . ' minute' . ($diff->i > 1 ? 's' : '') . ' ago';
    }

    return $diff->s . ' second' . ($diff->s > 1 ? 's' : '') . ' ago';
  }

  public static function previewText(string $text, int $length = 30): string
  {
    $text = trim($text);

    if (mb_strlen($text) <= $length) {
      return $text;
    }

    $preview = mb_substr($text, 0, $length);

    if (($lastSpace = mb_strrpos($preview, ' ')) !== false) {
      $preview = mb_substr($preview, 0, $lastSpace);
    }

    return $preview . '...';
  }
}