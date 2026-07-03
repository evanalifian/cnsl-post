<div class="col-12 col-md-10 col-lg-6 px-0 min-h-100 mb-5 pb-5 mb-lg-0 pb-lg-0 mx-auto">
  <div class="sticky-top bg-black bg-opacity-75 border-bottom border-secondary border-opacity-25 py-3 px-4" style="
              backdrop-filter: blur(8px);
              -webkit-backdrop-filter: blur(8px);
              z-index: 1020;
            ">
    <h1 class="fw-bold fs-5 mb-0 tracking-tight">Home</h1>
  </div>
  <?php if (count($data["posts"]) === 0): ?>
    <p>masih kosong</p>
  <?php else: ?>
    <?php require_once __DIR__ . "/postList.php" ?>
  <?php endif ?>
</div>