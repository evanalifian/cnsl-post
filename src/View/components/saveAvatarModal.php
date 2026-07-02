<div class="modal fade" id="changePictureModal" tabindex="-1" aria-labelledby="changePictureModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 440px;">
    <div class="modal-content bg-black border border-secondary border-opacity-50 rounded-4 p-2">

      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold fs-6 tracking-tight text-white" id="changePictureModalLabel">
          Update Profile Picture
        </h5>
        <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal" aria-label="Close"
          style="font-size: 0.75rem;"></button>
      </div>

      <form action="/profile/update-avatar" method="POST" enctype="multipart/form-data" class="m-0">

        <div class="modal-body py-4">
          <div class="mb-2">
            <label for="avatar" class="form-label small fw-medium text-secondary mb-2">
              Select image file
            </label>

            <input type="file"
              class="form-control form-control-sm bg-transparent text-white border-secondary border-opacity-50 rounded-3 shadow-none"
              id="avatar" name="avatar" accept="image/*" />
          </div>
          <div class="form-text text-secondary small px-1" style="font-size: 0.75rem;">
            Supported formats: PNG, JPG or JPEG. Maximum file size is 2MB.
          </div>
        </div>

        <div class="modal-footer border-0 pt-0">
          <button type="submit" class="btn btn-sm btn-light rounded-pill py-2 w-100 fw-semibold shadow-none" disabled>
            Upload and Save
          </button>
        </div>
      </form>

    </div>
  </div>
</div>