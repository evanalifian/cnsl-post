<?php

namespace App\Controller;

use App\Config\Database;
use App\Config\View;
use App\Repository\SearchRepository;
use App\Service\SearchService;

class SearchController
{
  private static SearchService $searchService;

  public function __construct()
  {
    $connDB = Database::connect();
    $searchRepository = new SearchRepository($connDB);

    self::$searchService = new SearchService($searchRepository);
  }

  public function index(): void
  {
    $query = htmlspecialchars($_GET['query']) ?? null;

    if ($query) {
      $results = $query ? self::$searchService->findUsers($query) : [];
      View::app("search", [
        "title" => "Search",
        "results" => $results
      ]);
    } else {
      View::app("search", [
        "title" => "Search"
      ]);
    }
  }
}