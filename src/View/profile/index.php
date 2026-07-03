<div class="col-12 col-md-11 col-lg-6 px-0 min-h-100 mb-5 pb-5 mb-lg-0 pb-lg-0 mx-auto">
  <div class="sticky-top bg-black bg-opacity-75 py-3 px-4"
    style="backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); z-index: 1020;">
    <div class="d-flex align-items-center gap-3">
      <a href="home.php" class="text-white text-decoration-none d-lg-none">
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
    <a href="/profile/setting" class="btn btn-outline-light btn-sm rounded-pill px-3 fw-bold mb-2 shadow-none" style="font-size: 0.85rem;">
      Profile Settings
    </a>
  </div>
  <div class="px-4 mt-3">
    <?php if (isset($data["user"]["display_name"])): ?>
      <h2 class="fw-bold fs-5 tracking-tight text-white mb-0"><?= $data["user"]["display_name"] ?></h2>
    <?php endif ?>
    <span class="text-secondary small">@<?= $data["user"]["username"] ?></span>
    <?php if (isset($data["user"]["bio"])): ?>
      <p class="text-white fs-6 lh-base mt-3 mb-3 fw-light"><?= $data["user"]["bio"] ?></p>
    <?php endif ?>
    <div class="d-flex flex-wrap gap-3 text-secondary small my-3 opacity-75">
      <!-- <div class="d-flex align-items-center gap-1">
        <i class="bi bi-link-45deg fs-5"></i>
        <a href="https://github.com/evanalifian" target="_blank"
          class="text-secondary text-decoration-none">github.com/evanalifian</a>
      </div> -->
      <div class="d-flex align-items-center gap-1">
        <i class="bi bi-calendar3 small"></i>
        <span>Joined <?= $data["user"]["created_at"] ?></span>
      </div>
    </div>
  </div>
  <div class="mt-4 border-top border-secondary border-opacity-10">
    <ul class="nav nav-tabs border-bottom border-secondary border-opacity-10 px-4 nav-justified" id="profileTabs"
      role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active border-0 text-white py-3 fw-semibold bg-transparent shadow-none" id="posts-tab"
          data-bs-toggle="tab" data-bs-target="#posts-tab-pane" type="button" role="tab" aria-controls="posts-tab-pane"
          aria-selected="true">
          Posts
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link border-0 text-secondary py-3 fw-semibold bg-transparent shadow-none" id="media-tab"
          data-bs-toggle="tab" data-bs-target="#media-tab-pane" type="button" role="tab" aria-controls="media-tab-pane"
          aria-selected="false">
          Media
        </button>
      </li>
    </ul>
    <div class="tab-content" id="profileTabsContent">
      <div class="tab-pane fade show active" id="posts-tab-pane" role="tabpanel" aria-labelledby="posts-tab"
        tabindex="0">
        <div class="d-flex flex-column">
          <div class="p-4 border-bottom border-secondary border-opacity-10">
            <div class="d-flex flex-column w-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center gap-3">
                  <div
                    class="bg-secondary bg-opacity-25 border border-secondary border-opacity-50 rounded-circle d-flex align-items-center justify-content-center text-secondary flex-shrink-0"
                    style="width: 40px; height: 40px; font-family: monospace; font-size: 0.8rem;">
                    &lt;/&gt;
                  </div>
                  <div class="d-flex align-items-center gap-2">
                    <span class="text-white fw-bold small">Evan Alifian</span>
                    <span class="text-secondary small">&middot; 2h</span>
                  </div>
                </div>
                <button class="btn btn-link text-secondary p-0 border-0 shadow-none">
                  <i class="bi bi-three-dots"></i>
                </button>
              </div>
              <div class="mt-2">
                <p class="text-white fs-6 lh-base mb-3">
                  Just finished normalizing the database layout to 3NF for my new microblogging project. Building with
                  vanilla PHP feels incredibly rewarding. Clean queries, zero framework bloat.
                </p>
                <div class="mb-3 border border-secondary border-opacity-25 rounded-3 overflow-hidden">
                  <img src="https://images.unsplash.com/photo-1618401471353-b98afee0b2eb?q=80&w=1000"
                    class="img-fluid w-100" alt="Post Attachment Media" />
                </div>
                <div class="d-flex gap-4 text-secondary">
                  <button
                    class="btn btn-link text-secondary p-0 border-0 shadow-none d-flex align-items-center gap-2 fs-7 text-decoration-none">
                    <i class="bi bi-heart-fill text-danger"></i> 12
                  </button>
                  <button
                    class="btn btn-link text-secondary p-0 border-0 shadow-none d-flex align-items-center gap-2 fs-7 text-decoration-none">
                    <i class="bi bi-chat"></i> 3
                  </button>
                  <button
                    class="btn btn-link text-secondary p-0 border-0 shadow-none d-flex align-items-center gap-2 fs-7 text-decoration-none">
                    <i class="bi bi-arrow-left-right"></i> 1
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="p-4 border-bottom border-secondary border-opacity-10">
            <div class="d-flex flex-column w-100">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center gap-3">
                  <div
                    class="bg-secondary bg-opacity-25 border border-secondary border-opacity-50 rounded-circle d-flex align-items-center justify-content-center text-secondary flex-shrink-0"
                    style="width: 40px; height: 40px; font-family: monospace; font-size: 0.8rem;">
                    &lt;/&gt;
                  </div>
                  <div class="d-flex align-items-center gap-2">
                    <span class="text-white fw-bold small">Evan Alifian</span>
                    <span class="text-secondary small">&middot; May 28</span>
                  </div>
                </div>
                <button class="btn btn-link text-secondary p-0 border-0 shadow-none">
                  <i class="bi bi-three-dots"></i>
                </button>
              </div>
              <div class="mt-2">
                <p class="text-white fs-6 lh-base mb-3">
                  Conventional commits make repository logs look highly professional. Spend 10 more seconds writing
                  standard prefixes (`feat:`, `fix:`, `docs:`), save hours of debugging later.
                </p>
                <div class="d-flex gap-4 text-secondary">
                  <button
                    class="btn btn-link text-secondary p-0 border-0 shadow-none d-flex align-items-center gap-2 fs-7 text-decoration-none">
                    <i class="bi bi-heart"></i> 42
                  </button>
                  <button
                    class="btn btn-link text-secondary p-0 border-0 shadow-none d-flex align-items-center gap-2 fs-7 text-decoration-none">
                    <i class="bi bi-chat"></i> 9
                  </button>
                  <button
                    class="btn btn-link text-secondary p-0 border-0 shadow-none d-flex align-items-center gap-2 fs-7 text-decoration-none">
                    <i class="bi bi-arrow-left-right"></i> 6
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="media-tab-pane" role="tabpanel" aria-labelledby="media-tab" tabindex="0">
        <div class="p-4">
          <div class="row g-2">
            <div class="col-4">
              <div
                class="ratio ratio-1x1 border border-secondary border-opacity-10 rounded overflow-hidden bg-secondary bg-opacity-10">
                <img src="https://images.unsplash.com/photo-1618401471353-b98afee0b2eb?q=80&w=500"
                  class="object-fit-cover w-100 h-100" alt="Gallery Media" />
              </div>
            </div>
            <div class="col-4">
              <div
                class="ratio ratio-1x1 border border-secondary border-opacity-10 rounded overflow-hidden bg-secondary bg-opacity-10">
                <img src="https://images.unsplash.com/photo-1607799279861-4dd421887fb3?q=80&w=500"
                  class="object-fit-cover w-100 h-100" alt="Gallery Media" />
              </div>
            </div>
            <div class="col-4">
              <div
                class="ratio ratio-1x1 border border-secondary border-opacity-10 rounded overflow-hidden bg-secondary bg-opacity-10">
                <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=500"
                  class="object-fit-cover w-100 h-100" alt="Gallery Media" />
              </div>
            </div>
            <div class="col-4">
              <div
                class="ratio ratio-1x1 border border-secondary border-opacity-10 rounded overflow-hidden bg-secondary bg-opacity-10">
                <img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?q=80&w=500"
                  class="object-fit-cover w-100 h-100" alt="Gallery Media" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>