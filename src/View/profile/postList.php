<div class="d-flex flex-column">
  <?php foreach ($data["posts"] as $post): ?>
    <div class="p-4 post-card border-bottom border-secondary border-opacity-10">
      <div class="d-flex flex-column w-100">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <div class="d-flex align-items-center gap-3">
            <div class="d-flex align-items-center gap-2">
              <span class="text-secondary small"><?= $post["created_at"] ?></span>
            </div>
          </div>
          <div class="dropdown">
            <button class="btn btn-link text-secondary p-0 border-0 shadow-none" type="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              <i class="bi bi-three-dots"></i>
            </button>
            <ul
              class="dropdown-menu dropdown-menu-end bg-black border border-secondary border-opacity-50 rounded-3 p-1 shadow">
              <li>
                <button type="button"
                  class="dropdown-item text-danger small rounded-2 d-flex align-items-center gap-2 py-2"
                  data-bs-toggle="modal" data-bs-target="#deletePostModal" data-post-id="<?= $post["post_id"] ?>">
                  <i class="bi bi-trash3"></i> Delete Post
                </button>
              </li>
            </ul>
          </div>
        </div>
        <div class="mt-2 post-body" data-url="/post/<?= $post["post_id"] ?>">
          <p class="text-white fs-6 lh-base mb-0">
            <?= htmlspecialchars($post["content"]) ?>
          </p>
          <?php if (isset($post["image_url"])): ?>
            <a href="/post/<?= $post["post_id"] ?>" class="text-decoration-none text-reset">
              <div class="mt-3 border border-secondary border-opacity-25 rounded-3 overflow-hidden">
                <img src="<?= $post["image_url"] ?>" class="img-fluid w-100" alt="Post image" />
              </div>
            </a>
          <?php endif ?>
        </div>
      </div>
    </div>
  <?php endforeach ?>
</div>