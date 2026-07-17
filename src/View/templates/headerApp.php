<?php

$navMenu = [
  [
    "name" => "Home",
    "icon" => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>',
    "path" => "/home"
  ],
  [
    "name" => "search",
    "icon" => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
    "path" => "/search"
  ],
  [
    "name" => "Create Post",
    "icon" => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>',
    "path" => "/post/create"
  ],
  [
    "name" => "Profile",
    "icon" => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>',
    "path" => "/profile"
  ],
];

?>
<!doctype html>
<html lang="en" class="h-100" data-bs-theme="dark">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    <?= isset($data["title"]) ? $data["title"] : "cnsl-post" ?> | cnsl-post
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />

  <link rel="stylesheet" href="/public/css/global.css" />
  <link rel="stylesheet" href="/public/css/app.css" />
  <link rel="stylesheet" href="/public/css/app.css" />
  <?php if (isset($data["styles"])): ?>
    <?php foreach ($data["styles"] as $style): ?>
      <link rel="stylesheet" href="/public/css/<?= $style ?>">
    <?php endforeach ?>
  <?php endif ?>
</head>

<body class="text-white d-flex flex-column h-100">
  <nav class="navbar navbar-expand navbar-dark navbar-blur grid-border-bottom py-3 fixed-top" style="z-index: 1030">
    <div class="container" style="max-width: 960px">
      <a class="navbar-brand fw-bold fs-6 tracking-tight text-white d-flex align-items-center gap-2" href="/home">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
          stroke-linecap="round" stroke-linejoin="round">
          <polyline points="4 17 10 11 4 5"></polyline>
          <line x1="12" y1="19" x2="20" y2="19"></line>
        </svg>
        cnsl-post
      </a>

      <div class="d-flex align-items-center">
        <a href="/profile"
          class="btn btn-sm btn-vercel-secondary px-3 py-1-5 fs-7 d-flex align-items-center gap-2 text-white">
          <div
            class="bg-dark bg-opacity-50 border border-secondary border-opacity-25 rounded d-flex align-items-center justify-content-center text-white"
            style="
                width: 20px;
                height: 20px;
                font-size: 0.6rem;
                font-family: monospace;
              ">
            EA
          </div>
          <span class="d-none d-sm-inline">@evanalifian</span>
        </a>
      </div>
    </div>
  </nav>
  <main class="flex-shrink-0 my-5">
    <div class="container pb-5 mb-5" style="max-width: 960px">
      <div class="row g-4">
        <div class="col-md-3 d-none d-md-block">
          <div class="sticky-top" style="top: 115px">
            <div class="list-group list-group-vercel row-gap-1">
              <?php foreach ($navMenu as $menu): ?>
                <a href="<?= $menu["path"] ?>"
                  class="list-group-item list-group-item-action d-flex align-items-center gap-3 <?= $_SERVER['REQUEST_URI'] === $menu["path"] ? "active" : "" ?>"><?= $menu["icon"] ?><span><?= $menu["name"] ?></span></a>
              <?php endforeach; ?>
            </div>
          </div>
        </div>