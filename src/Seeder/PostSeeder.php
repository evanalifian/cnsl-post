<?php

namespace App\Seeder;

use App\Config\Database;

class PostSeeder
{
  private array $dummyContents = [
    "Halo semuanya! Semoga harimu menyenangkan 😊",
    "Sedang belajar PHP Native dan MVC.",
    "Hari ini mencoba membuat fitur Full Text Search.",
    "Baru selesai refactor User Module.",
    "Ngoding sambil ngopi memang paling enak.",
    "Lagi belajar tentang Design Pattern Repository.",
    "Semangat belajar setiap hari!",
    "Hari ini upload postingan pertama.",
    "Mencoba membuat aplikasi media sosial sederhana.",
    "Belajar Docker ternyata seru juga."
  ];

  public function run(int $total = 5000): void
  {
    $connDB = Database::connect();

    $users = $connDB
      ->query("SELECT id FROM users")
      ->fetchAll(\PDO::FETCH_COLUMN);

    if (empty($users)) {
      throw new \Exception("Users table is empty. Run UserSeeder first.");
    }

    $postStatement = $connDB->prepare("
            INSERT INTO posts
            (id, user_id, preview_content, content)
            VALUES (?, ?, ?, ?)
        ");

    $imageStatement = $connDB->prepare("
            INSERT INTO post_images
            (id, post_id, image_url)
            VALUES (?, ?, ?)
        ");

    $connDB->beginTransaction();

    try {

      for ($i = 1; $i <= $total; $i++) {

        $postId = bin2hex(random_bytes(32));

        $userId = $users[array_rand($users)];

        $content = $this->dummyContents[array_rand($this->dummyContents)];

        $preview = mb_substr($content, 0, 100);

        $postStatement->execute([
          $postId,
          $userId,
          $preview,
          $content
        ]);

        if (random_int(1, 100) <= 30) {

          $imageStatement->execute([
            bin2hex(random_bytes(32)),
            $postId,
            "/public/assets/sample-post.webp"
          ]);
        }
      }

      $connDB->commit();

      echo "Post Seeder Finished\n";

    } catch (\Throwable $e) {

      $connDB->rollBack();

      throw $e;
    }
  }
}