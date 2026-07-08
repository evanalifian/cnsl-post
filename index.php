<?php

use App\Config\Router;
use App\Config\CoreRoute;
use App\Config\UserRoute;
use App\Config\HomeRoute;
use App\Config\SearchRoute;
use App\Config\PostRoute;

require_once __DIR__ . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

CoreRoute::register();
UserRoute::register();
HomeRoute::register();
SearchRoute::register();
PostRoute::register();

Router::execute();