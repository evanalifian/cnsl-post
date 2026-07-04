<div class="col-12 col-md-11 col-lg-6 px-0 min-h-100 mb-5 pb-5 mb-lg-0 pb-lg-0 mx-auto">
  <div class="sticky-top bg-black bg-opacity-75 py-3 px-4"
    style="backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); z-index: 1020;">
    <div class="d-flex align-items-center gap-3">
      <a href="/home" class="text-white text-decoration-none d-lg-none">
        <i class="bi bi-arrow-left fs-5"></i>
      </a>
      <div class="d-flex flex-column">
        <h1 class="fw-bold fs-5 mb-0 tracking-tight">Profile</h1>
      </div>
    </div>
  </div>

  <div class="pt-2 px-4 d-flex justify-content-between align-items-center">
    <div class="bg-black p-1 rounded-circle d-flex align-items-center justify-content-center" style="z-index: 2;">
      <img src="<?= $data["user"]["avatar_url"] ?>"
        class="bg-secondary bg-opacity-25 border border-secondary border-opacity-50 rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 object-fit-cover"
        style="width: 80px; height: 80px;" alt="Profile Picture" />
    </div>
    <a href="/profile/setting" class="btn btn-outline-light btn-sm rounded-pill px-3 fw-bold mb-2 shadow-none"
      style="font-size: 0.85rem;">
      Profile Settings
    </a>
  </div>

  <div class="px-4 mt-3">
    <?php if (isset($data["user"]["display_name"])): ?>
      <h2 class="fw-bold fs-5 tracking-tight text-white mb-0"><?= $data["user"]["display_name"] ?></h2>
    <?php endif ?>
    <span class="text-secondary small">@<?= $data["user"]["username"] ?></span>
    
    <?php if (isset($data["user"]["bio"])): ?>
      <p class="text-white fs-6 lh-base mt-3 mb-3 fw-light"><?= nl2br(htmlspecialchars($data["user"]["bio"])) ?></p>
    <?php endif ?>

    <div class="d-flex flex-column gap-2 mt-3 mb-2">
      <div class="d-flex flex-wrap gap-3 text-secondary small opacity-75">
        <div class="d-flex align-items-center gap-1">
          <i class="bi bi-calendar3 small"></i>
          <span>Joined <?= $data["user"]["created_at"] ?></span>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-4 border-top border-secondary border-opacity-25">
    <div class="d-flex border-bottom border-secondary border-opacity-10">
      <div class="px-4 py-3 position-relative fw-bold text-white small tracking-wide text-uppercase" style="cursor: default;">
        <?= count($data["posts"]) ?> Posts
      </div>
    </div>

    <div class="bg-black">
      <?php if (count($data["posts"]) === 0): ?>
        <div class="d-flex flex-column align-items-center justify-content-center text-center py-5 px-4 mt-3">
          <div class="text-secondary mb-2 opacity-25">
            <i class="bi bi-chat-square-text" style="font-size: 2.5rem;"></i>
          </div>
          <h3 class="fw-bold fs-6 text-white mb-1">No posts yet</h3>
        </div>
      <?php else: ?>
        <?php require_once __DIR__ . "/postList.php" ?>
      <?php endif ?>
    </div>
  </div>

</div>