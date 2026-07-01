<?php

namespace App\Controller;

use App\Config\View;

class LandingController
{
  public function index(): void
  {
    View::render("landing", [
      "title" => "cnsl-post — Share What's Happening"
    ]);
  }
}