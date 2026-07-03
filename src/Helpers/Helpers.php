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

  public static function imageValidation(string $file_name, string $file_type, int $file_size, int $file_error): void
  {
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
      throw new ValidationException(
        "File can not be empty"
      );
    }

    $max_size = 2 * 1024 * 1024;

    if ($file_size > $max_size) {
      throw new ValidationException(
        "The file size must not exceed 2MB"
      );
    }

    $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if (!in_array($extension, ['jpg', 'jpeg', 'png'], true)) {
      throw new ValidationException(
        "The file must be in PNG, JPG, or JPEG format"
      );
    }
  }

  public static function imageCoverter(string $tmpFile, string $originalName, string $directory): string
  {
    $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

    $filename = pathinfo($originalName, PATHINFO_FILENAME);

    $filename = preg_replace('/[^a-zA-Z0-9_]/', '_', $filename);

    $newFilename = uniqid('', true) . '.' . $extension;

    $destination = $directory . $newFilename;

    if (!move_uploaded_file($tmpFile, $destination)) {
      throw new ValidationException("Failed to upload file");
    }

    return $newFilename;
  }

  public static function deleteImage(string $path): void
  {
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
}