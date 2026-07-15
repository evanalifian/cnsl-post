<?php

namespace App\Utils;

class StringUtil
{
  public static function generateUniqueID(): string
  {
    return bin2hex(random_bytes(32));
  }

  public static function passwordLength(string $password): int
  {
    return strlen($password);
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
