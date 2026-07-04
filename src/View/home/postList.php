<div class="d-flex flex-column">
  <?php foreach ($data["posts"] as $post): ?>
    <div class="p-4 post-card">
      <div class="d-flex flex-column w-100">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <div class="d-flex align-items-center gap-3">
            <img src="<?= $post["avatar_url"] ?>" class="bg-secondary bg-opacity-25 border border-secondary border-opacity-50 rounded-circle d-flex
                          align-items-center justify-content-center flex-shrink-0 object-fit-cover"
              style="width: 40px; height: 40px;" alt="Profile Picture" loading="lazy" />
            <div class="d-flex align-items-center gap-2">
              <a href="/user/<?= $post["username"] ?>"
                class="link-light text-decoration-none small">@<?= $post["username"] ?></a>
              <span class="text-secondary small">&middot; <?= $post["created_at"] ?></span>
            </div>
          </div>
        </div>
        <div class="mt-2 post-body" data-url="/post/<?= $post["post_id"] ?>">
          <p class="text-white fs-6 lh-base mb-0">
            <?= htmlspecialchars($post["preview_content"]) ?>
          </p>
          <?php if (isset($post["image_url"])): ?>
            <a href="/post/<?= $post["post_id"] ?>" class="text-decoration-none text-reset">
              <div class="mt-3 border border-secondary border-opacity-25 rounded-3 overflow-hidden">
                <img src="<?= $post["image_url"] ?>" class="img-fluid w-100" alt="Post image" loading="lazy" />
              </div>
            </a>
          <?php endif ?>
        </div>
      </div>
    </div>
  <?php endforeach ?>
</div>