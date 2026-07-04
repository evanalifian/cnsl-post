<div class="modal fade" id="deletePostModal" tabindex="-1" aria-labelledby="deletePostModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
    <div class="modal-content bg-black border border-secondary border-opacity-50 rounded-4 p-2">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold fs-6 tracking-tight text-white d-flex align-items-center gap-2"
          id="deletePostModalLabel">
          <i class="bi bi-exclamation-triangle-fill text-danger"></i> Delete Post?
        </h5>
        <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal" aria-label="Close"
          style="font-size: 0.75rem;"></button>
      </div>
      <div class="modal-body py-3">
        <p class="text-body-secondary small mb-0">
          This action cannot be undone. This post will be permanently removed from your profile and the system
          infrastructure.
        </p>
      </div>
      <div class="modal-footer border-0 pt-0">
        <form id="deletePostForm" action="" method="POST" class="w-100 m-0 d-flex gap-2">
          <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill flex-grow-1 text-white shadow-none"
            data-bs-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-sm btn-danger rounded-pill flex-grow-1 fw-semibold shadow-none">
            Delete Permanently
          </button>
        </form>
      </div>
    </div>
  </div>
</div>