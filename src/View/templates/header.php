<!doctype html>
<html lang="en" class="h-100" data-bs-theme="dark">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>cnsl-post — Share What's Happening</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="/public/css/global.css" />
  <link rel="stylesheet" href="/public/css/view.css" />
  <?php if (isset($data["styles"])): ?>
    <?php foreach ($data["styles"] as $style): ?>
      <link rel="stylesheet" href="/public/css/<?= $style ?>">
    <?php endforeach ?>
  <?php endif ?>
</head>

<body class="text-white d-flex flex-column h-100">
  <nav class="navbar navbar-expand navbar-dark navbar-blur grid-border-bottom py-3 sticky-top">
    <div class="container" style="max-width: 960px">
      <a class="navbar-brand fw-bold fs-6 tracking-tight text-white d-flex align-items-center gap-2" href="/">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
          stroke-linecap="round" stroke-linejoin="round">
          <polyline points="4 17 10 11 4 5"></polyline>
          <line x1="12" y1="19" x2="20" y2="19"></line>
        </svg>
        cnsl-post
      </a>
      <div class="d-flex gap-2">
        <a href="/login" class="btn btn-sm btn-vercel-secondary px-3 py-1-5 fs-7">Log in</a>
        <a href="/signup" class="btn btn-sm btn-vercel-primary px-3 py-1-5 fs-7">Sign up</a>
      </div>
    </div>
  </nav>