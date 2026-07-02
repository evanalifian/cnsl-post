<?php

namespace App\Service;

use App\Exception\ValidationException;
use App\Repository\SearchRepository;

class SearchService
{
  private static SearchRepository $searchRepository;

  public function __construct(SearchRepository $searchRepository)
  {
    self::$searchRepository = $searchRepository;
  }

  public function findUsers(string $query): array
  {
    try {
      return self::$searchRepository->findUsers($query);
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    }
  }
}