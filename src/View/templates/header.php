<!DOCTYPE html>
<html lang="en" class="h-100" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data["title"] ?: "cnsl-post" ?> | cnsl-post</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <?php if (isset($data["styles"])): ?>
    <?php foreach ($data["styles"] as $style): ?>
      <link rel="stylesheet" href="/public/css/<?= $style ?>">
    <?php endforeach ?>
  <?php endif ?>
</head>
<body class="bg-black text-white d-flex flex-column h-100">
  <nav class="navbar navbar-expand navbar-dark bg-black border-bottom border-secondary border-opacity-25 py-2 mb-3">
    <div class="container max-width-md">
      <a class="navbar-brand fw-bold fs-6 tracking-tight text-white" href="/">cnsl-post</a>

      <div class="d-flex gap-2">
        <?php if ($_SERVER['REQUEST_URI'] === "/" || $_SERVER['REQUEST_URI'] === "/signup"): ?>
          <a href="/login" class="btn btn-sm btn-outline-light px-3 rounded-pill fs-7 fw-medium">Log in</a>
        <?php endif ?>
        <?php if ($_SERVER['REQUEST_URI'] === "/" || $_SERVER['REQUEST_URI'] === "/login"): ?>
          <a href="/signup" class="btn btn-sm btn-light px-3 rounded-pill fs-7 fw-medium">Sign up</a>
        <?php endif ?>
      </div>
    </div>
  </nav>