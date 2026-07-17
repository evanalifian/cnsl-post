<div class="d-flex flex-column gap-3">
  <?php foreach ($data["posts"] as $row): ?>
    <div class="card card-vercel position-relative">
      <div class="card-body p-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <div class="d-flex align-items-center gap-2">
            <img src="<?= $row->avatar_url ?>" class="bg-secondary bg-opacity-25 border border-secondary border-opacity-50 rounded d-flex
                          align-items-center justify-content-center flex-shrink-0 object-fit-cover"
              style="width: 42px; height: 42px;" alt="Profile Picture" loading="lazy" />
            <div>
              <a href="/post/<?= $row->post_id ?>"
                class="stretched-link text-decoration-none text-white fs-7 fw-bold mb-0">
                <?= $row->display_name ?: "" ?>
              </a>
              <div class="text-secondary small">
                @<?= $row->username ?> &bull; <?= $row->created_at ?>
              </div>
            </div>
          </div>
        </div>
        <p class="fs-7 lh-base mb-3" style="color: #a1a1aa">
          <?= htmlspecialchars($row->preview_content) ?>
        </p>
        <?php if (isset($row->image_url)): ?>
          <div class="mb-3 border border-secondary border-opacity-25 rounded" style="overflow: hidden; max-height: 320px;">
            <img src="<?= $row->image_url ?>" class="img-fluid w-100" style="
                          object-fit: cover;
                          filter: grayscale(10%) contrast(102%);
                        " alt="Attachment" loading="lazy" />
          </div>
        <?php endif ?>
      </div>
    </div>
  <?php endforeach ?>
</div>