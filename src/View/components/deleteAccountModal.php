<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel"
  aria-hidden="true" style="backdrop-filter: blur(8px)">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 400px">
    <div class="modal-content bg-black border border-secondary border-opacity-25" style="border-radius: 8px">
      <div class="modal-body p-4 text-start">
        <h5 class="fw-bold fs-6 text-white mb-2 tracking-tight" id="deleteAccountModalLabel">
          Are you absolutely sure?
        </h5>
        <p class="text-secondary small mb-4" style="color: #a1a1aa !important; line-height: 1.5">
          This action cannot be undone. This will permanently delete your
          profile `@evanalifian`, posts, and sessions.
        </p>
        <form action="/profile/delete" method="POST">
          <div class="mb-4">
            <label for="confirmUsername" class="form-label small fw-medium mb-1-5" style="color: #a1a1aa">
              To confirm, type
              <span class="text-white font-monospace">delete-my-account</span>
              below:
            </label>
            <input type="text" class="form-control form-control-vercel shadow-none py-2 px-3 fs-7" id="confirmUsername"
              name="confirm_text" placeholder="delete-my-account" />
          </div>
          <div class="d-flex flex-column gap-2">
            <button type="submit" class="btn btn-vercel-danger-solid w-100 py-2 fs-7 shadow-sm">
              Confirm Delete Account
            </button>
            <button type="button" class="btn btn-vercel-secondary w-100 py-2 fs-7 text-white" data-bs-dismiss="modal">
              Cancel
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>