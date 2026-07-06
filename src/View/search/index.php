<div class="col-12 col-md-10 col-lg-6 px-0 min-h-100 mb-5 pb-5 mb-lg-0 pb-lg-0 mx-auto">

  <div class="sticky-top bg-black bg-opacity-75 border-bottom border-secondary border-opacity-25 py-3 px-4"
    style="backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); z-index: 1020;">
    <h1 class="fw-bold fs-5 mb-3 tracking-tight">Search</h1>

    <form action="/search" method="GET"
      class="input-group border border-secondary border-opacity-50 rounded-pill overflow-hidden bg-secondary bg-opacity-10 focus-within-border-light">
      <span class="input-group-text bg-transparent border-0 text-secondary ps-3">
        <i class="bi bi-search"></i>
      </span>
      <input type="text" name="query"
        class="form-control bg-transparent border-0 text-white shadow-none py-2-5 ps-1 fs-6"
        value="<?= isset($_GET['query']) ? htmlspecialchars($_GET['query']) : '' ?>"
        placeholder="Search username or name..." aria-label="Search username" autocomplete="off" />
      <button class="btn btn-light rounded-pill px-4 m-1 fw-semibold fs-7" type="submit">
        Search
      </button>
    </form>
  </div>

  <?php
  // 1. JIKA USER SUDAH MELAKUKAN PENCARIAN DAN HASILNYA ADA
  if (isset($data["users"]) && !empty($data["users"])) {
    require_once __DIR__ . "/userList.php";
  } else if (isset($_GET['query'])) {
    require_once __DIR__ . "/usersNotFound.php";
  } else {
    require_once __DIR__ . "/searchBanner.php";
  }
  ?>

</div>