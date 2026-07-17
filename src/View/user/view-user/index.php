<div class="col-12 col-md-9" style="padding-top: 70px;">
  <div class="d-flex flex-column gap-4">
    <div class="mb-5 px-1">
      <div
        class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3 pb-3 border-bottom"
        style="border-color: rgba(255, 255, 255, 0.08) !important">
        <div class="d-flex align-items-center gap-3">
          <div class="bg-black p-1 rounded-circle d-flex align-items-center justify-content-center"
            style="z-index: 2; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#avatarModal">
            <img src="<?= $data["userFound"]->avatar_url ?>" class="bg-secondary bg-opacity-25 border border-secondary
            border-opacity-50 rounded-circle d-flex align-items-center
            justify-content-center flex-shrink-0 object-fit-cover" style="width: 52px; height: 52px;"
              alt="Profile Picture" loading="lazy" />
          </div>
          <div>
            <h2 class="fw-bold fs-5 text-white mb-0 tracking-tight">
              <?= $data["userFound"]->display_name ?: "" ?>
            </h2>
            <span class="text-secondary small" style="
                          font-family: monospace;
                          color: #a1a1aa !important;
                        ">@
              <?= $data["userFound"]->username ?>
            </span>
          </div>
        </div>
      </div>

      <div class="py-3">
        <p class="text-secondary fs-7 lh-base mb-0" style="color: #a1a1aa !important">
          <?= nl2br(htmlspecialchars($data["userFound"]->bio)) ?>
        </p>
      </div>

      <div
        class="pt-2 d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-2 flex-wrap"
        style="font-family: monospace; font-size: 0.75rem">
        <div class="d-flex flex-wrap gap-3 text-secondary opacity-75">
          <div class="d-flex align-items-center gap-1">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
              <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
              <line x1="16" y1="2" x2="16" y2="6" />
              <line x1="8" y1="2" x2="8" y2="6" />
              <line x1="3" y1="10" x2="21" y2="10" />
            </svg>
            <span>Joined
              <?= $data["userFound"]->created_at ?>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div>
      <?php if ($data["posts"] === null): ?>
        <div class="d-flex flex-column align-items-center justify-content-center text-center py-5 px-4 mt-3">
          <div class="text-secondary mb-2 opacity-25">
            <i class="bi bi-chat-square-text" style="font-size: 2.5rem;"></i>
          </div>
          <h3 class="fw-bold fs-6 text-white mb-1">No posts yet</h3>
        </div>
      <?php else: ?>
        <div class="d-flex align-items-center gap-2 mb-3 px-1 font-monospace">
          <span class="text-white fw-medium tracking-tight fs-7">Overview Posts</span>
          <span class="badge bg-dark border rounded-pill py-0.5 px-2 text-secondary fw-normal" style="
                      font-size: 0.65rem;
                      border-color: rgba(255, 255, 255, 0.08) !important;
                    ">
            <?= $data["posts"] === null ? 0 : count($data["posts"]) ?>
          </span>
        </div>
        <?php require_once __DIR__ . "/postList.php" ?>
      <?php endif ?>
    </div>
  </div>
</div>