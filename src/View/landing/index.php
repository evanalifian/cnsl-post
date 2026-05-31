<!-- Hero Section (Centered & Typographic) -->
<header class="py-5 bg-body">
  <div class="container py-5">
    <div class="row justify-content-center text-center py-4">
      <div class="col-lg-8">
        <div
          class="d-inline-flex align-items-center gap-2 border border-light-subtle rounded-pill px-3 py-1.5 mb-4 bg-body-tertiary">
          <span class="badge bg-dark rounded-pill fw-medium">v1.0.0</span>
          <span class="text-body-secondary small fw-medium">Simple. Structured. Stable.</span>
        </div>

        <h1 class="display-3 fw-bold text-dark lh-sm mb-4">
          The raw foundation for modern PHP development.
        </h1>

        <p class="lead text-body-secondary mb-5 px-lg-5">
          A clean-slate PHP boilerplate designed for developers who appreciate lightweight codebases, logical directory
          structures, and zero-framework overhead.
        </p>

        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-3">
          <a href="#structure" class="btn btn-dark btn-lg px-4 py-3 fs-6 rounded-3">
            Get Started
          </a>
          <div
            class="d-flex align-items-center gap-2 border border-light-subtle rounded-3 bg-body-tertiary px-3 py-2 font-monospace text-body-secondary small">
            <i class="bi bi-chevron-right text-muted"></i>
            <span>git clone https://github.com/evanalifian/php-boilerplate.git</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Clean Features Section (Borderless, High-Whitespace) -->
<section id="features" class="py-5 bg-body-tertiary border-top border-bottom border-light-subtle">
  <div class="container py-5">
    <div class="row g-5">
      <div class="col-md-4">
        <div class="d-flex flex-column gap-3">
          <div class="text-dark"><i class="bi bi-lightning-charge fs-3"></i></div>
          <h4 class="fw-semibold text-dark m-0">Zero Framework Bloat</h4>
          <p class="text-body-secondary small lh-base m-0">
            Skip the heavy vendor overhead and start directly with raw PHP execution. It is tailored for high-speed
            microservices or bespoke web utilities.
          </p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="d-flex flex-column gap-3">
          <div class="text-dark"><i class="bi bi-diagram-3 fs-3"></i></div>
          <h4 class="fw-semibold text-dark m-0">Modern Standards</h4>
          <p class="text-body-secondary small lh-base m-0">
            Strict PSR guidelines, fully compatible class autoloading logic, and a clean configuration architecture
            using standardized environment setups.
          </p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="d-flex flex-column gap-3">
          <div class="text-dark"><i class="bi bi-eye-slash fs-3"></i></div>
          <h4 class="fw-semibold text-dark m-0">Isolated Web Root</h4>
          <p class="text-body-secondary small lh-base m-0">
            Enhanced core directory safety. By pointing your server index directly inside the public-facing directory,
            your source files remain safe.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Clean Structure Section (Asymmetric Minimalist Design) -->
<section id="structure" class="py-5 bg-body">
  <div class="container py-5">
    <div class="row g-5 align-items-center">
      <div class="col-lg-5">
        <div
          class="badge bg-dark-subtle text-dark border border-dark-subtle px-3 py-1.5 rounded-pill mb-3 fw-medium small">
          <i class="bi bi-folder-check me-1"></i> Architecture
        </div>
        <h2 class="fw-bold text-dark mb-3">Logical Layout</h2>
        <p class="text-body-secondary mb-4">
          No guesswork required. This boilerplate divides configurations, core modules, route views, and assets exactly
          where your logical thinking demands.
        </p>
        <div class="d-flex flex-column gap-4">
          <div class="d-flex align-items-start gap-3">
            <i class="bi bi-check-circle-fill text-dark fs-5"></i>
            <div>
              <h6 class="fw-semibold text-dark mb-1">Composer Integration Ready</h6>
              <p class="text-body-secondary small m-0">Easily inject any modern PHP libraries with automated namespaces.
              </p>
            </div>
          </div>
          <div class="d-flex align-items-start gap-3">
            <i class="bi bi-check-circle-fill text-dark fs-5"></i>
            <div>
              <h6 class="fw-semibold text-dark mb-1">Predictable Routing</h6>
              <p class="text-body-secondary small m-0">Configured to cleanly handle standard controller-to-view
                relationships.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="border border-light-subtle rounded-4 bg-body-tertiary p-4">
          <div class="d-flex align-items-center justify-content-between pb-3 border-bottom border-light-subtle mb-3">
            <span class="font-monospace text-body-secondary small"><i
                class="bi bi-folder-symlink me-1 text-secondary"></i> root/</span>
            <span class="badge bg-light border text-secondary fw-normal">Project Map</span>
          </div>
          <div class="font-monospace text-body-secondary small d-flex flex-column gap-2">
            <div class="d-flex justify-content-between">
              <span><i class="bi bi-folder2 text-secondary me-2"></i>app/</span>
              <span class="text-muted text-xs">Application source code</span>
            </div>
            <div class="d-flex justify-content-between ms-3">
              <span><i class="bi bi-folder2 text-secondary me-2"></i>Controllers/</span>
              <span class="text-muted text-xs">Logic controllers</span>
            </div>
            <div class="d-flex justify-content-between ms-3">
              <span><i class="bi bi-folder2 text-secondary me-2"></i>Models/</span>
              <span class="text-muted text-xs">Database schema models</span>
            </div>
            <div class="d-flex justify-content-between">
              <span><i class="bi bi-folder2 text-secondary me-2"></i>public/</span>
              <span class="text-muted text-xs">Web index root</span>
            </div>
            <div class="d-flex justify-content-between ms-3 text-dark fw-semibold">
              <span><i class="bi bi-file-code me-2 text-dark"></i>index.php</span>
              <span class="text-muted text-xs">Main router script gateway</span>
            </div>
            <div class="d-flex justify-content-between">
              <span><i class="bi bi-folder2 text-secondary me-2"></i>views/</span>
              <span class="text-muted text-xs">UI view templates</span>
            </div>
            <div class="d-flex justify-content-between">
              <span><i class="bi bi-filetype-json text-secondary me-2"></i>composer.json</span>
              <span class="text-muted text-xs">JSON manifest</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>