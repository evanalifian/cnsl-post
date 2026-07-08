<?php

namespace App\Helpers;

class TextHelper
{
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
