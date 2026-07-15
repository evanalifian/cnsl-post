<?php

namespace App\Helpers;

use App\Exception\ValidationException;
use App\Utils\FileUtil;

class ImageHelper
{
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

    $filename = FileUtil::generateImageName(
      $file["name"]
    );

    $destination =
      rtrim($directory, DIRECTORY_SEPARATOR)
      . DIRECTORY_SEPARATOR
      . $filename;

    FileUtil::convertToWebp(
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

    FileHelper::deleteImage($projectRoot . $oldAvatar);

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
}
