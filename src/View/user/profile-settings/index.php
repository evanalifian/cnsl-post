<div class="col-12 col-md-9" style="padding-top: 70px;">
  <div class="d-flex flex-column gap-5">
    <!-- Header Section -->
    <div class="pb-3 grid-border-bottom">
      <h2 class="fw-bold fs-4 text-gradient mb-1 tracking-tight">
        Settings
      </h2>
      <p class="text-secondary small mb-0" style="color: #a1a1aa !important">
        Manage your profile information and account parameters.
      </p>
    </div>

    <!-- Bagian 1: Avatar Management -->
    <div class="text-start">
      <h3 class="fs-6 fw-bold text-white mb-3 font-monospace tracking-tight">
        Profile Picture
      </h3>
      <div
        class="d-flex align-items-center gap-4 flex-wrap flex-sm-nowrap p-4 rounded border border-secondary border-opacity-10"
        style="background-color: rgba(255, 255, 255, 0.01)">
        <img src="<?= $data["user"]->avatar_url ?>"
        class="bg-secondary bg-opacity-25 border border-secondary border-opacity-50 rounded-circle object-fit-cover"
        style="width:70px;height:70px;" alt="Preview" loading="lazy">
        <div class="w-100">
          <form action="/profile/update-avatar" method="POST" enctype="multipart/form-data">
            <p class="text-secondary small mb-3" style="color: #a1a1aa !important">
              JPG, GIF, or PNG. Max size of 2MB.
            </p>
            <div class="d-flex gap-2">
              <input type="file" name="avatar" id="avatarInput" class="d-none" accept="image/*" />
              <button type="button" class="btn btn-sm btn-vercel-secondary px-3 py-2 fs-7 text-white" onclick="
                            document.getElementById('avatarInput').click()
                          ">
                Choose File
              </button>
              <button type="submit" class="btn btn-sm btn-vercel-primary px-3 py-2 fs-7">
                Upload
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Bagian 2: General Profile Form (Login.html Style) -->
    <div class="text-start">
      <h3 class="fs-6 fw-bold text-white mb-4 font-monospace tracking-tight">
        General Information
      </h3>

      <form action="/profile/update" method="POST">
        <div class="row g-4">
          <div class="col-12 col-sm-6">
            <label for="display_name" class="form-label small fw-medium mb-1-5" style="color: #a1a1aa">
              Display Name
            </label>
            <input type="text" class="form-control form-control-vercel shadow-none py-2 px-3 fs-7" id="display_name"
              name="display_name" value="<?= $data["user"]->display_name ?>" placeholder="e.g., John Doe" />
          </div>

          <div class="col-12 col-sm-6">
            <label for="username" class="form-label small fw-medium mb-1-5" style="color: #a1a1aa">
              Username
            </label>
            <input type="text" class="form-control form-control-vercel shadow-none py-2 px-3 fs-7" id="username"
              name="username" value="<?= $data["user"]->username ?>" placeholder="e.g., johndoe" />
          </div>

          <div class="col-12">
            <label for="bio" class="form-label small fw-medium mb-1-5" style="color: #a1a1aa">
              Bio
            </label>
            <textarea class="form-control form-control-vercel shadow-none py-2 px-3 fs-7" id="bio" name="bio" rows="3"
              placeholder="Tell us about yourself..." style="resize: none"><?= $data["user"]->bio ?></textarea>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex justify-content-end gap-2 mt-5 pt-4 grid-border-top">
          <button type="reset" class="btn btn-sm btn-vercel-secondary px-4 py-2 fs-7 text-white">
            Cancel
          </button>
          <button type="submit" class="btn btn-sm btn-vercel-primary px-4 py-2 fs-7 shadow-sm">
            Save Changes
          </button>
        </div>
      </form>
    </div>

    <!-- Bagian 3: Danger Zone -->
    <div class="text-start mt-2">
      <h3 class="fs-6 fw-bold text-danger mb-3 font-monospace tracking-tight">
        Danger Zone
      </h3>
      <div
        class="p-4 rounded border border-danger border-opacity-25 d-flex align-items-center justify-content-between flex-wrap gap-3"
        style="background-color: rgba(255, 77, 77, 0.02)">
        <div>
          <h4 class="fs-7 fw-bold text-white mb-1">Delete Account</h4>
          <p class="text-secondary small mb-0" style="color: #a1a1aa !important; max-width: 480px">
            Permanently remove your personal account and all of your
            posts. This action is irreversible.
          </p>
        </div>
        <div>
          <!-- Trigger Modal Button -->
          <button type="button" class="btn btn-sm btn-vercel-danger px-3 py-2 fs-7 shadow-sm" data-bs-toggle="modal"
            data-bs-target="#deleteAccountModal">
            Delete Account
          </button>
        </div>
      </div>
    </div>
  </div>
</div>