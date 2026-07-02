<?php

namespace App\Config;

use App\Config\View;

class Router
{
  private static array $routes = [];

  public static function add(
    string $path,
    string $http_method,
    callable $method,
    ?callable $middleware = null
  ): void {

    self::$routes[] = [
      "path" => $path,
      "http_method" => $http_method,
      "method" => $method,
      "middleware" => $middleware,
    ];
  }

  public static function execute(): void
  {
    $requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    foreach (self::$routes as $route) {

      $pattern = "#^" . $route["path"] . "$#";

      if (
        preg_match($pattern, $requestPath, $variables)
        && $route["http_method"] === $_SERVER['REQUEST_METHOD']
      ) {

        if (session_status() === PHP_SESSION_NONE) {
          session_start();
        }

        if (isset($route["middleware"])) {
          call_user_func($route["middleware"]);
        }

        array_shift($variables);

        call_user_func_array($route["method"], $variables);

        return;
      }
    }

    http_response_code(404);
    View::notFound(["title" => "Page not found"]);
  }
}