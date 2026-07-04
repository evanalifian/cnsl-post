<div class="col-12 col-md-10 col-lg-6 px-0 min-h-100 mb-5 pb-5 mb-lg-0 pb-lg-0 mx-auto">
  <div class="sticky-top bg-black bg-opacity-75 border-bottom border-secondary border-opacity-25 py-3 px-4" style="
              backdrop-filter: blur(8px);
              -webkit-backdrop-filter: blur(8px);
              z-index: 1020;
            ">
    <h1 class="fw-bold fs-5 mb-0 tracking-tight">Create Post</h1>
  </div>

  <div class="p-4">
    <form action="/post/create" method="POST" enctype="multipart/form-data">
      <div class="d-flex gap-3">
        <div class="d-none d-md-block">
          <img src="<?= $data["user"]["avatar_url"] ?>" class="bg-secondary bg-opacity-25 border border-secondary border-opacity-50 rounded-circle d-flex
          align-items-center justify-content-center flex-shrink-0 object-fit-cover" style="width: 40px; height: 40px;"
            alt="Profile Picture" loading="lazy" />
        </div>
        <div class="w-100">
          <div class="mb-2">
            <?php if (isset($data["user"]["display_name"])): ?>
              <span class="fw-bold text-white fs-6"><?= $data["user"]["display_name"] ?></span>
            <?php endif ?>
            <span class="text-secondary small ms-1">@evanalifian</span>
          </div>

          <div class="mb-3">
            <textarea name="content"
              class="form-control bg-transparent border-0 text-white shadow-none p-0 fs-6 lh-base placeholder-secondary"
              style="resize: none; --bs-secondary-rgb: 150, 150, 150" rows="8" id="content" name="content"
              placeholder="What's happening? Conclude your thoughts here..."></textarea>
          </div>

          <div class="mb-3">
            <input type="file" name="image" id="imageFileInput" accept="image/*" class="d-none" />

            <button type="button" id="btnUploadTrigger"
              class="btn w-100 bg-secondary bg-opacity-10 border border-secondary border-opacity-25 text-secondary rounded-3 py-2.5 px-3 d-flex align-items-center justify-content-between shadow-none transition-base bg-white-hover bg-opacity-5-hover">
              <div class="d-flex align-items-center gap-2">
                <i class="bi bi-image text-white opacity-75 fs-6"></i>
                <span class="small fw-medium text-secondary" style="--bs-secondary-rgb: 170, 170, 170">
                  Add a photo from your device
                </span>
              </div>
              <i class="bi bi-plus-lg opacity-50 small"></i>
            </button>
          </div>

          <div id="previewContainer"
            class="position-relative mb-4 border border-secondary border-opacity-25 rounded-3 overflow-hidden d-none">
            <img id="imagePreview" src="#" alt="Attachment Preview" class="img-fluid w-100" />

            <button type="button" id="btnRemovePreview"
              class="btn btn-dark bg-black bg-opacity-75 text-white position-absolute top-0 end-0 m-2 rounded-circle d-flex align-items-center justify-content-center p-0 shadow-none"
              style="
                        width: 32px;
                        height: 32px;
                        border: 1px solid rgba(255, 255, 255, 0.15);
                      ">
              <i class="bi bi-x-lg" style="font-size: 0.75rem"></i>
            </button>
          </div>

          <div
            class="d-flex align-items-center justify-content-between pt-3 border-top border-secondary border-opacity-10">
            <button type="submit" id="btn-submit-post" disabled
              class="btn btn-light rounded-pill px-4 fw-bold fs-7 shadow-none hover-opacity">
              Post
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>