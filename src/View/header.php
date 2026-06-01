<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($data["title"]) ? $data["title"] : "PHP Boilerplate" ?></title>
  <link href="/public/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <?php if (isset($data["styles"])): ?>
    <?php foreach ($data["styles"] as $style): ?>
      <link rel="stylesheet" href="/public/css/<?= $style ?>">
    <?php endforeach ?>
  <?php endif ?>
</head>

<body class="bg-light text-dark data-bs-theme=dark">
  <?php if ($_SERVER['REQUEST_URI'] !== "/login" && $_SERVER['REQUEST_URI'] !== "/signup" && $_SERVER['REQUEST_URI'] !== "/account" && $_SERVER['REQUEST_URI'] !== "/account/update" && $_SERVER['REQUEST_URI'] !== "/account/delete"): ?>
    <nav class="navbar navbar-expand-lg navbar-blur sticky-top border-bottom bg-white bg-opacity-75 backdrop-blur">
      <div class="container py-1">
        <a class="navbar-brand d-flex align-items-center fw-bold tracking-tight text-dark" href="#">
          <i class="bi bi-box-seam-fill text-primary me-2"></i> php-boilerplate
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto align-items-lg-center gap-2">
            <li class="nav-item">
              <a class="nav-link custom-link small fw-medium text-secondary" href="#features">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link custom-link small fw-medium text-secondary" href="#structure">Structure</a>
            </li>
            <li class="nav-item">
              <a class="nav-link custom-link small fw-medium text-secondary" href="#docs">Docs</a>
            </li>
            <li class="nav-item ms-lg-2">
              <a class="btn btn-dark btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-2 fw-medium"
                href="https://github.com/evanalifian/php-boilerplate" target="_blank">
                <i class="bi bi-github"></i> Repository
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <?php endif ?>