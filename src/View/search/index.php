<div class="col-12 col-md-9" style="padding-top: 70px;">
  <div class="d-flex flex-column gap-4">
    <div class="pb-4 grid-border-bottom">
      <h2 class="fw-bold fs-4 text-gradient mb-3 tracking-tight">
        Search
      </h2>
      <form action="/search" method="GET" class="d-flex gap-2 p-1 rounded-2" style="
                    background-color: rgba(255, 255, 255, 0.02);
                    border: 1px solid rgba(255, 255, 255, 0.08);
                  ">
        <div class="input-group">
          <span class="input-group-text bg-transparent border-0 text-secondary ps-3">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
              <circle cx="11" cy="11" r="8"></circle>
              <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
          </span>
          <input type="text" name="query" class="form-control bg-transparent border-0 text-white shadow-none py-2 fs-7"
            value="<?= isset($_GET['query']) ? htmlspecialchars($_GET['query']) : '' ?>"
            placeholder="Search username or name" autocomplete="off" />
        </div>
        <button class="btn btn-sm btn-vercel-primary px-4 py-2 fs-7" type="submit">
          Search
        </button>
      </form>
    </div>
    <?php
    if (isset($data["users"]) && !empty($data["users"])) {
      require_once __DIR__ . "/userList.php";
    } else if (isset($_GET['query'])) {
      require_once __DIR__ . "/usersNotFound.php";
    } else {
      require_once __DIR__ . "/searchBanner.php";
    }
    ?>
  </div>
</div>