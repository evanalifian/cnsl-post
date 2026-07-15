<?php

namespace App\Seeder;

use App\Config\Database;
use App\Utils\SecurityUtil;

class UserSeeder
{
  public function run(int $total = 5000): void
  {
    $connDB = Database::connect();

    $statement = $connDB->prepare("
      INSERT INTO users (
        id,
        username,
        password,
        display_name,
        bio,
        avatar_url
      ) VALUES (?, ?, ?, ?, ?, ?)
    ");

    $password = SecurityUtil::passwordHash("password");

    for ($i = 1; $i <= $total; $i++) {
      $statement->execute([
        bin2hex(random_bytes(32)),
        "user$i",
        $password,
        "User $i",
        "Hello, i'm user $i",
        "/public/assets/default-avatar.png"
      ]);
    }

    echo "User Seeder Finished\n";
  }
}