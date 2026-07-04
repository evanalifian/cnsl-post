<div class="d-flex flex-column pt-2">
  <?php foreach ($data["results"] as $res): ?>
    <a href="/user/<?= $res["username"] ?>"
      class="text-decoration-none d-block p-4 bg-white-hover bg-opacity-5-hover transition-base">
      <div class="d-flex align-items-center gap-3">
        <img src="<?= $res["avatar_url"] ?>" class="bg-secondary bg-opacity-25 border border-secondary border-opacity-50 rounded-circle d-flex
      align-items-center justify-content-center flex-shrink-0 object-fit-cover" style="width: 48px; height: 48px;"
          alt="Profile Picture" loading="lazy" />
        <div class="d-flex flex-column row-gap-1 lh-sm">
          <span class="fw-bold text-white fs-6"><?= $res["display_name"] ?></span>
          <span class="text-secondary small">@<?= $res["username"] ?></span>
        </div>
        <i class="bi bi-chevron-right ms-auto text-secondary opacity-50 pe-1 fs-7"></i>
      </div>
    </a>
  <?php endforeach ?>
</div>