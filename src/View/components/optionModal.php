<div class="modal fade" id="profileActionModal" tabindex="-1" aria-labelledby="profileActionModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" style="max-width: 360px">
    <div class="modal-content bg-black border rounded-2" style="
            border-color: rgba(255, 255, 255, 0.12) !important;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.8);
          ">
      <!-- Header Modal Minimalis -->
      <div class="modal-header border-bottom py-2-5 px-3 d-flex justify-content-between align-items-center"
        style="border-color: rgba(255, 255, 255, 0.06) !important">
        <h6 class="modal-title fw-medium tracking-tight" id="profileActionModalLabel" style="
                font-size: 0.75rem;
                font-family: monospace;
                text-transform: uppercase;
                letter-spacing: 0.05em;
              ">
          Account Options
        </h6>
        <button type="button" class="btn p-0 border-0 text-secondary bg-transparent hover-light shadow-none"
          data-bs-dismiss="modal" aria-label="Close">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
      </div>

      <!-- Body / List Dropdown Aksi -->
      <div class="modal-body p-1">
        <div class="d-flex flex-column gap-1">
          <!-- Pilihan 1: Settings -->
          <a href="/profile/settings"
            class="d-flex align-items-center justify-content-between text-decoration-none rounded px-3 py-2 text-secondary v-modal-item">
            <div class="d-flex align-items-center gap-2">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="3"></circle>
                <path
                  d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z">
                </path>
              </svg>
              <span class="fs-7 fw-medium">Settings</span>
            </div>
          </a>

          <!-- Divider Tipis -->
          <div class="my-1 border-top" style="
                  border-color: rgba(255, 255, 255, 0.06) !important;
                "></div>

          <!-- Pilihan 2: Log Out -->
          <a href="/logout"
            class="d-flex align-items-center justify-content-between text-decoration-none rounded px-3 py-2 text-secondary v-modal-item-danger">
            <div class="d-flex align-items-center gap-2 text-danger">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" y1="12" x2="9" y2="12"></line>
              </svg>
              <span class="fs-7 fw-medium">Log out</span>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>