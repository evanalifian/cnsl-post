<?php

require_once "vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

(new App\Seeder\DatabaseSeeder())->run();