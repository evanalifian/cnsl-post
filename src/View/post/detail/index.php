<div class="<?= isset($data["user"]) ? "col-12 col-md-9" : "mx-auto" ?>" style="padding-top: 70px;">
  <div class="d-flex flex-column gap-4 text-start">
    <?php if (isset($data["user"])): ?>
      <div class="d-flex align-items-center gap-3 pb-3 grid-border-bottom">
        <a href="/"
          class="btn btn-sm btn-vercel-secondary p-2 d-flex align-items-center justify-content-center text-white"
          style="border-radius: 6px">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
          </svg>
        </a>
        <h2 class="fw-bold fs-5 text-gradient mb-0 tracking-tight">
          Post Detail
        </h2>
      </div>
    <?php endif ?>
    <div class="p-4 rounded border border-secondary border-opacity-10"
      style="background-color: rgba(255, 255, 255, 0.01)">
      <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="d-flex align-items-center gap-3">
          <img src="<?= $data["post"]->avatar_url ?>" class="bg-secondary bg-opacity-25 border border-secondary border-opacity-50 rounded d-flex
            align-items-center justify-content-center flex-shrink-0 object-fit-cover"
            style="width: 42px; height: 42px;" alt="Profile Picture" loading="lazy" />
          <div class="d-flex flex-column">
            <span class="text-white fw-bold fs-6 lh-sm"><?= $data["post"]->display_name ?: "" ?></span>
            <span class="text-secondary">
              <a href="/user/<?= $data["post"]->username ?>"
                class="link-secondary link-underline-opacity-0 fs-7">@<?= $data["post"]->username ?>
              </a> &middot; <?= $data["post"]->created_at ?>
            </span>
          </div>
        </div>
      </div>
      <div class="mt-2">
        <p class="text-white fs-6 lh-base mb-3" style="font-weight: 400; letter-spacing: -0.01em">
          <?= nl2br(htmlspecialchars($data["post"]->content)) ?>
        </p>
        <?php if (isset($data["post"]->image_url)): ?>
          <div
            class="mb-4 border border-secondary border-opacity-25 rounded bg-black d-flex justify-content-center align-items-center"
            style="max-height: 400px; overflow: hidden">
            <img src="<?= $data["post"]->image_url ?>" class="img-fluid rounded-1" alt="Post Media"
              style="object-fit: contain; max-height: 380px; width: 100%;" loading="lazy" />
          </div>
        <?php endif ?>
        <div class="d-flex gap-4 text-secondary pt-3 border-top border-secondary border-opacity-10 fs-7">
          <button
            class="btn btn-sm btn-vercel-secondary share-post-btn d-inline-flex align-items-center gap-2 px-3 py-1 fs-8"
            data-share-url="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/post/" . $data["post"]->post_id ?>">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
              <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
            </svg>
            <span>Share</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>