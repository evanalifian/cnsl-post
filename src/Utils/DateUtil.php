<?php

namespace App\Utils;

class DateUtil
{
  public static function formatJoinTime(string $datetime_str): string
  {
    $date = new \DateTime($datetime_str);
    return $date->format('M Y');
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
