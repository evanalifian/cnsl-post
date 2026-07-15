<?php

namespace App\Utils;

use App\Exception\ValidationException;

class FileUtil
{
  public static function generateImageName(string $originalName): string
  {
    $filename = pathinfo($originalName, PATHINFO_FILENAME);

    $filename = preg_replace('/[^a-zA-Z0-9_]/', '_', $filename);

    return uniqid() . "_" . $filename . ".webp";
  }

  public static function convertToWebp(
    string $tmpFile,
    string $destination,
    string $mimeType,
    int $quality = 80
  ): void {

    switch ($mimeType) {

      case "image/jpeg":
      case "image/jpg":
        $image = imagecreatefromjpeg($tmpFile);
        break;

      case "image/png":
        $image = imagecreatefrompng($tmpFile);

        imagepalettetotruecolor($image);
        imagealphablending($image, true);
        imagesavealpha($image, true);
        break;

      default:
        throw new ValidationException("Unsupported image type.");
    }

    if ($image === false) {
      throw new ValidationException("Failed to read image.");
    }

    if (!imagewebp($image, $destination, $quality)) {
      throw new ValidationException("Failed to convert image.");
    }

    $image = null;
  }
}
