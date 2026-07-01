<div class="col-12 col-md-10 col-lg-6 px-0 min-h-100 mb-5 pb-5 mb-lg-0 pb-lg-0 mx-auto">
  <div class="sticky-top bg-black bg-opacity-75 border-bottom border-secondary border-opacity-25 py-3 px-4"
    style="backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); z-index: 1020;">
    <div class="d-flex align-items-center gap-3">
      <a href="/profile" class="text-white text-decoration-none">
        <i class="bi bi-arrow-left fs-5"></i>
      </a>
      <h1 class="fw-bold fs-5 mb-0 tracking-tight">Edit Profile</h1>
    </div>
  </div>
  <div class="p-4 border-bottom border-secondary border-opacity-25">
    <div class="d-flex align-items-center gap-4">
      <img src="/public/<?= $data["user"]["avatar_url"] ?>"
        class="bg-secondary bg-opacity-25 border border-secondary border-opacity-50 rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 object-fit-cover"
        style="width: 80px; height: 80px;" alt="Profile Picture" />
      <div>
        <form action="api/upload_avatar.php" method="POST" enctype="multipart/form-data">
          <h3 class="fs-6 fw-bold mb-3">Profile picture</h3>
          <div class="d-flex gap-2">
            <label for="avatarFile" class="btn btn-sm btn-light px-3 rounded-pill fw-medium">
              Upload new
            </label>
            <input type="file" id="avatarFile" class="d-none" accept="image/*" onchange="this.form.submit()" />
            <button type="button" class="btn btn-sm btn-outline-danger px-3 rounded-pill fw-medium">
              Remove
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="p-4">
    <form action="/profile/update" method="POST">
      <div class="mb-4">
        <label for="display_name" class="form-label small fw-medium mb-1">Name</label>
        <input type="text"
          class="form-control form-control-sm bg-transparent text-white border-secondary border-opacity-50 rounded-3 shadow-none py-2"
          id="display_name" name="display_name" value="<?= $data["user"]["display_name"] ?>"
          placeholder="Your display name">
      </div>
      <div class="mb-4">
        <label for="username" class="form-label small fw-medium mb-1">Username</label>
        <input type="text"
          class="form-control form-control-sm bg-transparent text-white border-secondary border-opacity-50 rounded-3 shadow-none py-2"
          id="username" name="username" value="<?= $data["user"]["username"] ?>" placeholder="choose a username">
      </div>
      <div class="mb-4">
        <label for="bio" class="form-label small fw-medium mb-1">Bio</label>
        <textarea
          class="form-control form-control-sm bg-transparent text-white border-secondary border-opacity-50 rounded-3 shadow-none py-2"
          id="bio" name="bio" rows="3" placeholder="Describe yourself..."
          style="resize: none;"><?= $data["user"]["bio"] ?></textarea>
      </div>
      <!-- <div class="mb-4">
        <label for="link" class="form-label small fw-medium mb-1">Link</label>
        <input type="url"
          class="form-control form-control-sm bg-transparent text-white border-secondary border-opacity-50 rounded-3 shadow-none py-2"
          id="link" name="link" value="https://github.com/evanalifian" placeholder="https://example.com">
      </div> -->
      <div class="d-flex gap-3 pt-2">
        <button type="submit" class="btn btn-sm btn-light flex-grow-1 py-2 rounded-pill fw-semibold">
          Save Changes
        </button>
        <a href="/profile"
          class="btn btn-sm btn-outline-secondary text-white text-decoration-none flex-grow-1 py-2 rounded-pill fw-semibold">
          Cancel
        </a>
      </div>
    </form>
  </div>
</div>