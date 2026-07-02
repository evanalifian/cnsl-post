<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1055;">
  <div id="toastError" class="toast align-items-center text-danger bg-danger-subtle border-0 rounded-3 shadow-lg"
    role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex py-1 px-2">
      <div class="toast-body d-flex align-items-center gap-2 small fw-medium">
        <i class="bi bi-exclamation-circle-fill"></i>
        <span><?= $data["error_message"] ?></span>
      </div>
      <button type="button" class="btn-close btn-close-white m-auto me-2 shadow-none small" data-bs-dismiss="toast"
        aria-label="Close" style="font-size: 0.75rem;"></button>
    </div>
  </div>
</div>