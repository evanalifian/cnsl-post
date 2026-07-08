<?php

namespace App\Service;

use App\Exception\ValidationException;
use App\Repository\SearchRepository;

class SearchService
{
  private SearchRepository $searchRepository;

  public function __construct(SearchRepository $searchRepository)
  {
    $this->searchRepository = $searchRepository;
  }

  public function findUsers(string $query): array
  {
    try {
      return $this->searchRepository->findUsers($query);
    } catch (\Exception $e) {
      throw new ValidationException($e->getMessage());
    }
  }
}