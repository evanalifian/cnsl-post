<?php

namespace App\Seeder;

class DatabaseSeeder
{
  public function run(): void
  {
    (new UserSeeder())->run(5000);

    (new PostSeeder())->run(5000);
  }
}