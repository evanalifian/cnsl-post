<div class="d-flex flex-column">
  <?php foreach ($data["posts"] as $post): ?>
    <div class="p-4">
      <div class="d-flex flex-column w-100">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <div class="d-flex align-items-center gap-3">
            <img src="<?= $post["avatar_url"] ?>" class="bg-secondary bg-opacity-25 border border-secondary border-opacity-50 rounded-circle d-flex
                          align-items-center justify-content-center flex-shrink-0 object-fit-cover"
              style="width: 40px; height: 40px;" alt="Profile Picture" />
            <div class="d-flex align-items-center gap-2">
              <a href="/user/<?= $post["username"] ?>" class="link-light text-decoration-none small">@<?= $post["username"] ?></a>
              <span class="text-secondary small">&middot; 2h</span>
            </div>
          </div>
          <button class="btn btn-link text-secondary p-0 border-0 shadow-none">
            <i class="bi bi-three-dots"></i>
          </button>
        </div>
        <div class="mt-2">
          <p class="text-white fs-6 lh-base mb-3"><?= $post["content"] ?></p>
          <?php if (isset($post["image_url"])): ?>
            <div class="mb-3 border border-secondary border-opacity-25 rounded-3 overflow-hidden">
              <img src="<?= $post["image_url"] ?>" class="img-fluid w-100"
                alt="Post image" />
            </div>
          <?php endif ?>
        </div>
      </div>
    </div>
  <?php endforeach ?>
</div>