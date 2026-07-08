<?php

namespace App\Helpers;

use App\Exception\ValidationException;

class FileHelper
{
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
}
