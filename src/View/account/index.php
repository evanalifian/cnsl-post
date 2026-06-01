<!-- Minimal Navbar -->
<nav class="navbar navbar-expand-lg border-bottom bg-white py-3">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center fw-bold tracking-tight text-dark" href="/">
      <i class="bi bi-box-seam-fill text-dark me-2"></i> php-boilerplate
    </a>
    <div class="ms-auto d-flex align-items-center gap-3">
      <span class="text-secondary small d-none d-sm-inline-block">Logged in as <strong
          class="text-dark"><?= $data["user"]["username"] ?></strong></span>
      <a href="/logout" class="btn btn-outline-danger btn-sm px-3 rounded-2 fw-medium">
        <i class="bi bi-box-arrow-right me-1"></i> Sign Out
      </a>
    </div>
  </div>
</nav>

<!-- Main Dashboard Container -->
<main class="container py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8">

      <!-- Back Link -->
      <div class="mb-4">
        <a href="/logout" class="text-secondary text-decoration-none small d-inline-flex align-items-center gap-1">
          <i class="bi bi-arrow-left"></i> Back to Homepage (log out)
        </a>
      </div>

      <!-- Section Header -->
      <div class="mb-4">
        <h1 class="h3 fw-bold text-dark mb-1">Account Settings</h1>
        <p class="text-secondary">Keep your personal profile details updated and accurate.</p>
      </div>

      <!-- Update Information Form Card -->
      <div class="card border border-light-subtle rounded-4 bg-white p-4 p-sm-5 shadow-sm mb-4">
        <h3 class="h5 fw-bold text-dark mb-4">Personal Information</h3>

        <form action="/account/update" method="POST" autocomplete="off">
          <div class="row g-4">
            <!-- Input Full Name -->
            <div class="col-md-6">
              <label for="name" class="form-label text-secondary small fw-semibold text-uppercase tracking-wider">Full
                Name</label>
              <div class="input-group border rounded-3 overflow-hidden">
                <span class="input-group-text bg-light border-0 text-secondary px-3"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control bg-light border-0 py-3 px-1 fs-6 text-dark" id="name" name="name"
                  value="<?= $data["user"]["name"] ?>" placeholder="John Doe">
              </div>
            </div>

            <!-- Input Username -->
            <div class="col-md-6">
              <label for="username"
                class="form-label text-secondary small fw-semibold text-uppercase tracking-wider">Username</label>
              <div class="input-group border rounded-3 overflow-hidden">
                <span class="input-group-text bg-light border-0 text-secondary px-3"><i class="bi bi-at"></i></span>
                <input type="text" class="form-control bg-light border-0 py-3 px-1 fs-6 text-dark" id="username"
                  name="username" value="<?= $data["user"]["username"] ?>" placeholder="johndoe">
              </div>
            </div>
          </div>

          <!-- Form Actions -->
          <div class="mt-4 pt-2 text-end">
            <button type="submit" class="btn btn-dark px-4 py-2.5 rounded-3 fw-medium small shadow-sm">
              Save Profile
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</main>

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