<div class="d-flex flex-column">
  <?php foreach ($data["posts"] as $post): ?>
    <div class="p-4 post-card">
      <div class="d-flex flex-column w-100">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <div class="d-flex align-items-center gap-3">
            <div class="d-flex align-items-center gap-2">
              <span class="text-secondary small"><?= $post["created_at"] ?></span>
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