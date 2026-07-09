<div class="d-flex flex-column">
  <?php foreach ($data["posts"] as $row): ?>
    <div class="p-4 post-card border-bottom border-secondary border-opacity-10">
      <div class="d-flex flex-column w-100">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <div class="d-flex align-items-center gap-3">
            <img src="<?= $row->avatar_url ?>" class="bg-secondary bg-opacity-25 border border-secondary border-opacity-50 rounded-circle d-flex
                          align-items-center justify-content-center flex-shrink-0 object-fit-cover"
              style="width: 40px; height: 40px;" alt="Profile Picture" loading="lazy" />
            <div class="d-flex align-items-center gap-2">
              <a href="/user/<?= $row->username ?>"
                class="link-light text-decoration-none small">@<?= $row->username ?></a>
              <span class="text-secondary small">&middot; <?= $row->created_at ?></span>
            </div>
          </div>
          <div class="dropdown">
            <button class="btn btn-link text-secondary p-0 border-0 shadow-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-three-dots"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end bg-black border border-secondary border-opacity-50 rounded-3 p-1 shadow">
              <li>
                <button type="button" 
                  class="dropdown-item text-white small rounded-2 d-flex align-items-center gap-2 py-2 share-post-btn"
                  data-share-url="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/post/" . $row->post_id ?>">
                  <i class="bi bi-share text-secondary"></i> Share Link
                </button>
              </li>
            </ul>
          </div>
        </div>
        <div class="mt-2 post-body" data-url="/post/<?= $row->post_id ?>">
          <p class="text-white fs-6 lh-base mb-0">
            <?= htmlspecialchars($row->preview_content) ?>
          </p>
          <?php if (isset($row->image_url)): ?>
            <a href="/post/<?= $row->post_id ?>" class="text-decoration-none text-reset">
              <div class="mt-3 border border-secondary border-opacity-25 rounded-3 overflow-hidden">
                <img src="<?= $row->image_url ?>" class="img-fluid w-100" alt="Post image" loading="lazy" />
              </div>
            </a>
          <?php endif ?>
        </div>
      </div>
    </div>
  <?php endforeach ?>
</div>