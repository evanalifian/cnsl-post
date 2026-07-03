<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= isset($data["title"]) ? $data["title"] : "cnsl-post" ?> | cnsl-post
  </title>
  <link rel="stylesheet" href="/public/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <?php if (isset($data["styles"])): ?>
    <?php foreach ($data["styles"] as $style): ?>
      <link rel="stylesheet" href="/public/css/<?= $style ?>">
    <?php endforeach ?>
  <?php endif ?>
</head>

<body class="bg-black text-white">
  <div class="container-xxl">
    <div class="row">
      <div class="col-lg-3 d-none d-lg-block border-end border-secondary border-opacity-25 sticky-top pt-4 px-3"
        style="height: 100vh">
        <div class="d-flex flex-column h-100 gap-3">
          <div class="px-3 mb-2 py-2">
            <a class="navbar-brand fw-bold fs-5 tracking-tight text-white" href="#">cnsl-post</a>
          </div>
          <?php foreach ($navLinks as $nav): ?>
            <?php
            $isActive = str_starts_with($currentPath, $nav["path"]);
            ?>
            <a href="<?= $nav["path"] ?>" class="<?= $isActive ? $activeNavItem : $navItem ?>">
              <?= $nav["icon"] ?>
              <span class="fs-6"><?= $nav["name"] ?></span>
            </a>
          <?php endforeach ?>
          <div class="mt-auto mb-4 pt-3 border-top border-secondary border-opacity-10">
            <a href="/profile" class="<?= $activeProfile ? $activeNavItem : $navItem ?>">
              <img src="<?= $user["avatar_url"] ?>"
              class="bg-secondary bg-opacity-25 border border-secondary border-opacity-50 rounded-circle d-flex
              align-items-center justify-content-center flex-shrink-0 object-fit-cover"
              style="width: 32px; height: 32px;" alt="Profile Picture" />
              <div class="d-flex flex-column lh-sm">
                <?php if (isset($user["display_name"])): ?>
                  <span class="fs-6 fw-bold text-white d-block"><?= $user["display_name"] ?></span>
                <?php endif ?>
                <span class="text-secondary opacity-75" style="font-size: 0.75rem">@<?= $user["username"] ?></span>
              </div>
              <i class="bi bi-three-dots ms-auto text-secondary opacity-50 pe-1"></i>
            </a>
          </div>
        </div>
      </div>