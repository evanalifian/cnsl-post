<div class="d-flex flex-column gap-3">
  <?php foreach ($data["users"] as $user): ?>
    <div class="card card-vercel position-relative">
      <div class="card-body p-3">
        <div class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center gap-3">
            <img src="<?= $user->avatar_url ?>" class="bg-secondary bg-opacity-25 border border-secondary border-opacity-50 rounded d-flex
                  align-items-center justify-content-center flex-shrink-0 object-fit-cover"
              style="width: 42px; height: 42px;" alt="Profile Picture" loading="lazy" />
            <div>
              <a href="/user/<?= $user->username ?>"
                class="stretched-link text-decoration-none text-white fs-7 fw-bold mb-0">
                <?= $user->display_name ?>
              </a>
              <div class="text-secondary small" style="
                                font-size: 0.7rem;
                                color: #666666 !important;
                              ">
                @<?= $user->username ?>
              </div>
            </div>
          </div>
          <div class="text-secondary opacity-50 pe-1">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
              stroke-linecap="round" stroke-linejoin="round">
              <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach ?>
</div>