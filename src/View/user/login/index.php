<main class="flex-shrink-0 d-flex align-items-center my-auto py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-6 col-lg-4">
        <div class="text-center mb-4">
          <h2 class="fw-bold fs-4 mb-1">Welcome back</h2>
          <p class="text-secondary small">Enter your details to access your account</p>
        </div>
        <form action="/login" method="POST">
          <div class="mb-3">
            <label for="username" class="form-label small fw-medium mb-1">Username</label>
            <input type="text"
              class="form-control form-control-sm bg-transparent text-white border-secondary border-opacity-50 rounded-3 shadow-none py-2"
              id="username" name="username">
          </div>
          <div class="mb-4">
            <label for="password" class="form-label small fw-medium mb-1">Password</label>
            <input type="password"
              class="form-control form-control-sm bg-transparent text-white border-secondary border-opacity-50 rounded-3 shadow-none py-2"
              id="password" name="password">
          </div>
          <button type="submit" class="btn btn-sm btn-light w-100 py-2 rounded-pill fw-semibold mb-3">Log In</button>
        </form>
        <div class="text-center">
          <p class="text-secondary small mb-0">
            Don't have an account? <a href="/signup" class="text-white text-decoration-none fw-medium">Sign up</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</main>