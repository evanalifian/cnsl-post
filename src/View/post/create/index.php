<div class="col-12 col-md-9" style="padding-top: 70px;">
  <div class="d-flex flex-column gap-4">
    <div class="pb-3 grid-border-bottom">
      <h2 class="fw-bold fs-4 text-gradient mb-1 tracking-tight">
        Create Post
      </h2>
      <p class="text-secondary small mb-0" style="color: #a1a1aa !important">
        Share updates or logs to the timeline.
      </p>
    </div>
    <form action="/post/create" method="POST" enctype="multipart/form-data">
      <div class="d-flex gap-3">
        <img src="<?= $data["user"]->avatar_url ?>"
          class="bg-secondary bg-opacity-25 border border-secondary border-opacity-50 rounded d-flex align-items-center justify-content-center flex-shrink-0 object-fit-cover"
          style="width: 42px; height: 42px;" alt="Profile Picture" loading="lazy" />
        <div class="w-100">
          <div class="mb-3">
            <span class="fw-bold text-white fs-7"><?= $data["user"]->display_name ?: "" ?></span>
            <span class="text-secondary small ms-1" style="font-size: 0.75rem">@<?= $data["user"]->username ?></span>
          </div>
          <div class="mb-4">
            <textarea name="content"
              class="form-control bg-transparent border-0 text-white shadow-none p-0 fs-7 lh-base" style="resize: none;"
              rows="8" placeholder="What's happening? Conclude your thoughts here..." maxlength="300"
              required></textarea>
          </div>
          <div class="mb-4">
            <input type="file" name="image" id="imageFileInput" accept="image/*" class="d-none" />
            <button type="button" id="btnUploadTrigger"
              class="btn w-100 text-secondary rounded-2 py-3 px-3 d-flex align-items-center justify-content-between shadow-none btn-vercel-secondary"
              style="
                          border-style: dashed !important;
                          background-color: rgba(255, 255, 255, 0.01);
                        ">
              <div class="d-flex align-items-center gap-2">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                  <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                  <circle cx="9" cy="9" r="2" />
                  <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                </svg>
                <span class="small fw-medium">
                  Add a photo from your device
                </span>
              </div>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="12" y1="5" x2="12" y2="19" />
                <line x1="5" y1="12" x2="19" y2="12" />
              </svg>
            </button>
          </div>
          <div id="previewContainer"
            class="position-relative mb-4 border border-secondary border-opacity-25 rounded-2 overflow-hidden d-none"
            style="
                        border-color: rgba(255, 255, 255, 0.08) !important;
                      ">
            <img id="imagePreview" src="#" alt="Attachment Preview" class="img-fluid w-100"
              style="max-height: 300px; object-fit: cover" />

            <button type="button" id="btnRemovePreview"
              class="btn btn-dark bg-black bg-opacity-75 text-white position-absolute top-0 end-0 m-2 rounded-circle d-flex align-items-center justify-content-center p-0 shadow-none"
              style="
                          width: 28px;
                          height: 28px;
                          border: 1px solid rgba(255, 255, 255, 0.15);
                        ">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
              </svg>
            </button>
          </div>
          <div class="d-flex align-items-center justify-content-between pt-3 grid-border-top">
            <button type="submit" id="btn-submit-post" disabled class="btn btn-sm btn-vercel-primary px-4 py-2 fs-7">
              Post
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>