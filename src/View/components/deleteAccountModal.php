<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
    <div class="modal-content bg-black border border-secondary border-opacity-50 rounded-4 p-2">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold fs-6 tracking-tight text-white" id="deleteAccountModalLabel">Permanently delete account?</h5>
        <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal" aria-label="Close"
          style="font-size: 0.75rem;"></button>
      </div>
      <div class="modal-body py-3">
        <p class="text-secondary small mb-0">Are you absolutely sure? This action will delete all your data and cannot be undone later.</p>
      </div>
      <div class="modal-footer border-0 pt-0 d-flex gap-2">
        <button type="button"
          class="btn btn-sm btn-outline-secondary rounded-pill px-3 fw-medium text-white flex-grow-1 shadow-none"
          data-bs-dismiss="modal">
          Cancel
        </button>
        <form action="/profile/delete" method="POST" class="flex-grow-1 m-0">
          <button type="submit" class="btn btn-sm btn-danger rounded-pill px-3 fw-semibold w-100 shadow-none">
            Delete account
          </button>
        </form>
      </div>
    </div>
  </div>
</div>