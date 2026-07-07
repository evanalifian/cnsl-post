<div class="col-12 col-md-11 col-lg-6 px-0 min-h-100 mb-5 pb-5 mb-lg-0 pb-lg-0 mx-auto">
  <div class="sticky-top bg-black bg-opacity-75 py-3 px-4" style="
              backdrop-filter: blur(8px);
              -webkit-backdrop-filter: blur(8px);
              z-index: 9999;
            ">
    <div class="d-flex align-items-center gap-3">
      <a href="/home" class="text-white text-decoration-none"><i class="bi bi-arrow-left fs-5"></i></a>
      <h1 class="fw-bold fs-5 mb-0 tracking-tight">Post</h1>
    </div>
  </div>

  <div class="row g-0">
    <div class="col-12 p-4 sticky-lg-top" style="top: 70px; height: fit-content">
      <div class="d-flex flex-column w-100">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <div class="d-flex align-items-center gap-3">
            <img src="<?= $data["post"]->avatar_url ?>" class="bg-secondary bg-opacity-25 border border-secondary border-opacity-50 rounded-circle d-flex
            align-items-center justify-content-center flex-shrink-0 object-fit-cover"
              style="width: 40px; height: 40px;" alt="Profile Picture" loading="lazy" />
            <div class="d-flex flex-column">
              <?php if (isset($data["post"]->display_name)): ?>
                <a href="/user/<?= $data["post"]->username ?>"
                  class="text-white text-decoration-none fw-bold fs-6 lh-sm"><?= $data["post"]->display_name ?></a>
              <?php endif ?>
              <span class="text-secondary small">
                <a href="/user/<?= $data["post"]->username ?>" class="link-secondary text-decoration-none">
                  @<?= $data["post"]->username ?>
                </a>
                &middot;
                <?= $data["post"]->created_at ?></span>
            </div>
          </div>
        </div>
        <div class="mt-1">
          <p class="text-white fs-6 lh-base mb-3"><?= nl2br(htmlspecialchars($data["post"]->content)) ?></p>
          <?php if (isset($data["post"]->image_url)): ?>
            <div
              class="my-5 border border-secondary border-opacity-25 rounded-3 overflow-hidden bg-black d-flex justify-content-center align-items-center">
              <img src="<?= $data["post"]->image_url ?>" class="img-fluid img-post-detail" alt="Post Attachment Media"
                loading="lazy" />
            </div>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</div>