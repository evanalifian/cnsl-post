<?php

namespace App\PHPBoilerplate\Controller;

use App\PHPBoilerplate\Config\View;

class HomeController
{
  public function index(): void
  {
    View::render("landing", [
      "title" => "PHP Boilerplate - Clean & Structured Foundation"
    ]);
  }
}