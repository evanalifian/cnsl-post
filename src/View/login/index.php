<div class="container min-vh-100 d-flex flex-column justify-content-center py-5">
  <div class="row justify-content-center w-100 m-0">
    <div class="col-12 col-sm-10 col-md-8 col-lg-5 p-0">

      <!-- Logo & Back Navigation -->
      <div class="text-center mb-5">
        <a href="index.html" class="d-inline-flex align-items-center text-decoration-none text-dark gap-2 mb-3">
          <i class="bi bi-box-seam-fill text-dark fs-3"></i>
          <span class="fw-bold fs-4 tracking-tight">php-boilerplate</span>
        </a>
        <h1 class="h4 fw-bold text-dark mb-1">Welcome back</h1>
        <p class="text-secondary small">Enter your details to resume development</p>
      </div>

      <!-- Minimalist Login Card -->
      <div class="card border border-light-subtle rounded-4 bg-white p-4 p-sm-5 shadow-sm">
        <form action="#" method="POST" autocomplete="off">

          <!-- Email Input -->
          <div class="mb-4">
            <label for="email" class="form-label text-secondary small fw-semibold text-uppercase tracking-wider">Email
              Address</label>
            <div class="input-group border rounded-3 overflow-hidden">
              <span class="input-group-text bg-light border-0 text-secondary px-3"><i class="bi bi-envelope"></i></span>
              <input type="email" class="form-control bg-light border-0 py-3 px-1 fs-6 text-dark" id="email"
                placeholder="name@domain.com" required>
            </div>
          </div>

          <!-- Password Input -->
          <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <label for="password"
                class="form-label text-secondary small fw-semibold text-uppercase tracking-wider mb-0">Password</label>
            </div>
            <div class="input-group border rounded-3 overflow-hidden">
              <span class="input-group-text bg-light border-0 text-secondary px-3"><i
                  class="bi bi-shield-lock"></i></span>
              <input type="password" class="form-control bg-light border-0 py-3 px-1 fs-6 text-dark" id="password"
                placeholder="••••••••" required>
            </div>
          </div>

          <!-- Submit Button -->
          <button type="submit" class="btn btn-dark btn-lg w-100 py-3 rounded-3 fw-medium fs-6 shadow-sm mb-4">
            Sign In <i class="bi bi-arrow-right ms-1"></i>
          </button>

        </form>
      </div>

      <!-- Additional Links -->
      <p class="text-center text-secondary small mt-4 mb-0">
        Don't have an account? <a href="/signup" class="text-dark fw-bold text-decoration-none">Sign up now</a>
      </p>

    </div>
  </div>
</div>