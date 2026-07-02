<div class="col-12 col-md-10 col-lg-6 px-0 min-h-100 mb-5 pb-5 pb-lg-0 mx-auto">
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
      <img src="<?= $data["user"]["avatar_url"] ?>"
        class="bg-secondary bg-opacity-25 border border-secondary border-opacity-50 rounded-circle object-fit-cover"
        style="width:80px;height:80px;" alt="Preview">
      <div class="d-flex flex-column">
        <h3 class="fs-6 fw-bold mb-3">Profile picture</h3>
        <button type="button" class="btn btn-sm btn-light px-3 rounded-pill fw-medium" data-bs-toggle="modal"
          data-bs-target="#changePictureModal">
          Change Picture
        </button>
      </div>
    </div>
  </div>

  <div class="p-4 border-bottom border-secondary border-opacity-25">
    <form action="/profile/update" method="POST">
      <div class="mb-3">
        <label for="display_name" class="form-label small fw-medium mb-1">Display Name</label>
        <input type="text"
          class="form-control form-control-sm bg-transparent text-white border-secondary border-opacity-50 rounded-3 shadow-none py-2"
          id="display_name" name="display_name" value="<?= $data["user"]["display_name"] ?>"
          placeholder="your display name">
      </div>
      <div class="mb-3">
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

      <div class="d-flex gap-3 pt-2">
        <button type="submit" class="btn btn-sm btn-light flex-grow-1 py-2 rounded-pill fw-semibold">
          Save Changes
        </button>
        <a href="/profile"
          class="btn btn-sm btn-outline-secondary flex-grow-1 py-2 rounded-pill fw-semibold text-white text-decoration-none">
          Cancel
        </a>
      </div>
    </form>
  </div>

  <div class="p-4 border-bottom border-secondary border-opacity-25">
    <div class="d-flex flex-column align-items-start align-items-md-center justify-content-between flex-md-row gap-3">
      <div>
        <h3 class="fs-6 fw-bold mb-1">Log out</h3>
        <p class="text-body-secondary small mb-0">Your current active session will be terminated.</p>
      </div>
      <a href="/logout"
        class="btn btn-sm btn-outline-secondary px-3 rounded-pill fw-medium text-white text-decoration-none shadow-none">
        <i class="bi bi-box-arrow-right me-1"></i> Log Out
      </a>
    </div>
  </div>

  <div class="p-4 rounded-bottom-4">
    <div class="d-flex align-items-center gap-2 text-danger mb-2">
      <i class="bi bi-exclamation-triangle-fill"></i>
      <h3 class="fs-6 fw-bold mb-0">Danger Zone</h3>
    </div>
    <p class="text-body-secondary small mb-3">
      Deleting your account is permanent. All your posts, profile information, and follower relationships will be
      deleted from the system and cannot be recovered.
    </p>
    <button type="button" class="btn btn-sm btn-danger px-4 rounded-pill fw-semibold shadow-none" data-bs-toggle="modal"
      data-bs-target="#deleteAccountModal">
      Delete Account
    </button>
  </div>
</div>