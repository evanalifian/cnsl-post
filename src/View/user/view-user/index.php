<div class="col-12 col-md-11 col-lg-6 px-0 min-h-100 mb-5 pb-5 mb-lg-0 pb-lg-0 mx-auto">
  <?php if (isset($data["user"])): ?>
    <div class="sticky-top bg-black bg-opacity-75 py-3 px-4" style="
                backdrop-filter: blur(8px);
                -webkit-backdrop-filter: blur(8px);
                z-index: 1020;
              ">
      <div class="d-flex align-items-center gap-3">
        <a href="javascript:history.back()" class="text-white text-decoration-none">
          <i class="bi bi-arrow-left fs-5"></i>
        </a>
        <div class="d-flex flex-column">
          <h1 class="fw-bold fs-5 mb-0 tracking-tight"><?= $data["userFound"]->username ?></h1>
        </div>
      </div>
    </div>
  <?php endif ?>
  
  <!-- BAGIAN FOTO PROFIL & DROPDOWN SHARE -->
  <div class="pt-2 px-4 d-flex justify-content-between align-items-center">
    <div class="bg-black p-1 rounded-circle d-flex align-items-center justify-content-center" style="z-index: 2">
      <img src="<?= $data["userFound"]->avatar_url ?>"
        class="bg-secondary bg-opacity-25 border border-secondary border-opacity-50 rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 object-fit-cover"
        style="width: 80px; height: 80px;" alt="Profile Picture" loading="lazy" />
    </div>

    <!-- Dropdown Tambahan untuk Copy Link User -->
    <div class="dropdown" style="z-index: 2">
      <button class="btn btn-link text-secondary p-0 border-0 shadow-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-three-dots fs-5"></i>
      </button>
      <ul class="dropdown-menu dropdown-menu-end bg-black border border-secondary border-opacity-50 rounded-3 p-1 shadow">
        <li>
          <button type="button" 
            class="dropdown-item text-white small rounded-2 d-flex align-items-center gap-2 py-2 share-post-btn"
            data-share-url="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/user/" . $data["userFound"]->username ?>">
            <i class="bi bi-share text-secondary"></i> Share Profile
          </button>
        </li>
      </ul>
    </div>
  </div>

  <div class="px-4 mt-3">
    <?php if (isset($data["userFound"]->display_name)): ?>
      <h2 class="fw-bold fs-5 tracking-tight text-white mb-0"><?= $data["userFound"]->display_name ?></h2>
    <?php endif ?>
    <span class="text-secondary small">@<?= $data["userFound"]->username ?></span>
    <?php if (isset($data["userFound"]->bio)): ?>
      <p class="text-white fs-6 lh-base mt-3 mb-3 fw-light"><?= $data["userFound"]->bio ?></p>
    <?php endif ?>
    <div class="d-flex flex-wrap gap-3 text-secondary small my-3 opacity-75">
      <div class="d-flex align-items-center gap-1">
        <i class="bi bi-calendar3 small"></i>
        <span>Joined <?= $data["userFound"]->created_at ?></span>
      </div>
    </div>
  </div>
  
  <div class="mt-4 border-top border-secondary border-opacity-25">
    <div class="d-flex border-bottom border-secondary border-opacity-10">
      <div class="px-4 py-3 position-relative fw-bold text-white small tracking-wide text-uppercase" style="cursor: default;">
        <?= $data["posts"] === null ? 0 : count($data["posts"]) ?> Posts
      </div>
    </div>
  
    <div class="bg-black">
      <?php if ($data["posts"] === null): ?>
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