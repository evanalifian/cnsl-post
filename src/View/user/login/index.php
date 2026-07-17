<main class="flex-shrink-0 d-flex align-items-center my-auto py-5">
  <div class="container" style="max-width: 960px">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-6 col-lg-5 col-xl-4">
        <div class="text-center mb-5">
          <h2 class="fw-bold fs-3 text-gradient mb-2 tracking-tight">
            Welcome back
          </h2>
        </div>
        <form action="/login" method="POST">
          <div class="mb-3 text-start">
            <label for="username" class="form-label small fw-medium mb-1-5" style="color: #a1a1aa">Username</label>
            <input type="text" class="form-control form-control-vercel shadow-none py-2 px-3" id="username"
              name="username" placeholder="e.g., johndoe" />
          </div>
          <div class="mb-4 text-start">
            <label for="password" class="form-label small fw-medium mb-1-5" style="color: #a1a1aa">Password</label>
            <input type="password" class="form-control form-control-vercel shadow-none py-2 px-3" id="password"
              name="password" placeholder="••••••••" />
          </div>
          <button type="submit" class="btn btn-vercel-primary w-100 py-2-5 mb-4 shadow-sm">
            Log In
          </button>
        </form>
        <div class="text-center">
          <p class="text-secondary small mb-0" style="color: #666666 !important">
            Don't have an account?
            <a href="/signup" class="text-white text-decoration-none fw-medium">Sign up</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</main>