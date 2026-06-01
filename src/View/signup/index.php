<div class="container min-vh-100 d-flex flex-column justify-content-center py-5">
  <div class="row justify-content-center w-100 m-0">
    <div class="col-12 col-sm-10 col-md-8 col-lg-5 p-0">

      <!-- Logo & Back Navigation -->
      <div class="text-center mb-5">
        <a href="/" class="d-inline-flex align-items-center text-decoration-none text-dark gap-2 mb-3">
          <i class="bi bi-box-seam-fill text-dark fs-3"></i>
          <span class="fw-bold fs-4 tracking-tight">php-boilerplate</span>
        </a>
        <h1 class="h4 fw-bold text-dark mb-1">Create your account</h1>
        <p class="text-secondary small">Start with the best lightweight foundation for your project</p>
      </div>

      <!-- Minimalist Sign Up Card -->
      <div class="card border border-light-subtle rounded-4 bg-white p-4 p-sm-5 shadow-sm">
        <form action="/signup" method="POST" autocomplete="off">

          <!-- Full Name Input -->
          <div class="mb-4">
            <label for="name" class="form-label text-secondary small fw-semibold text-uppercase tracking-wider">Full
              Name</label>
            <div class="input-group border rounded-3 overflow-hidden">
              <span class="input-group-text bg-light border-0 text-secondary px-3"><i class="bi bi-person"></i></span>
              <input type="text" class="form-control bg-light border-0 py-3 px-1 fs-6 text-dark" id="name" name="name"
                placeholder="John Doe">
            </div>
          </div>

          <!-- Username Input -->
          <div class="mb-4">
            <label for="username"
              class="form-label text-secondary small fw-semibold text-uppercase tracking-wider">Username</label>
            <div class="input-group border rounded-3 overflow-hidden">
              <span class="input-group-text bg-light border-0 text-secondary px-3"><i class="bi bi-at"></i></span>
              <input type="text" class="form-control bg-light border-0 py-3 px-1 fs-6 text-dark" id="username"
                name="username" placeholder="johndoe">
            </div>
          </div>

          <!-- Password Input -->
          <div class="mb-4">
            <label for="password"
              class="form-label text-secondary small fw-semibold text-uppercase tracking-wider mb-0">Password</label>
            <div class="input-group border rounded-3 overflow-hidden">
              <span class="input-group-text bg-light border-0 text-secondary px-3"><i
                  class="bi bi-shield-lock"></i></span>
              <input type="password" class="form-control bg-light border-0 py-3 px-1 fs-6 text-dark" id="password"
                name="password" placeholder="••••••••">
            </div>
          </div>

          <!-- Submit Button -->
          <button type="submit" class="btn btn-dark btn-lg w-100 py-3 rounded-3 fw-medium fs-6 shadow-sm mb-4">
            Sign Up <i class="bi bi-arrow-right ms-1"></i>
          </button>

        </form>
      </div>

      <!-- Additional Links -->
      <p class="text-center text-secondary small mt-4 mb-0">
        Already have an account? <a href="/login" class="text-dark fw-bold text-decoration-none">Sign in</a>
      </p>

    </div>
  </div>
</div>

<!-- Bootstrap Toast Container (Renders dynamically from PHP $error_message variable) -->
<?php if (isset($data["error_message"]) && !empty($data["error_message"])): ?>
  <div class="toast-container position-fixed bottom-0 end-0 p-4" style="z-index: 1055;">
    <div id="errorToast" class="toast align-items-center text-bg-danger border-0 rounded-3 shadow" role="alert"
      aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
      <div class="d-flex">
        <div class="toast-body d-flex align-items-center gap-2 py-3">
          <i class="bi bi-exclamation-circle-fill fs-5"></i>
          <div>
            <strong>Error:</strong>
            <?php echo htmlspecialchars($data["error_message"]); ?>
          </div>
        </div>
        <button type="button" class="btn-close btn-close-white me-3 m-auto" data-bs-dismiss="toast"
          aria-label="Close"></button>
      </div>
    </div>
  </div>
<?php endif; ?>

<script>
  // Automatically show the toast on load if the elements exist in DOM
  document.addEventListener('DOMContentLoaded', function () {
    const toastElement = document.getElementById('errorToast');
    if (toastElement) {
      const toast = new bootstrap.Toast(toastElement);
      toast.show();
    }
  });
</script>