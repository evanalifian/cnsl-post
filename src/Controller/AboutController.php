<?php

namespace App\Controller;

use App\Config\View;

class AboutController {
  public function index(): void {
    View::render("about", [
      "title" => "About"
    ]);
  }
}