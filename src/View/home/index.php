<div class="col-12 col-md-9" style="padding-top: 70px;">
  <div class="d-flex flex-column gap-4">
    <div class="pb-3 grid-border-bottom">
      <h2 class="fw-bold fs-4 text-gradient mb-1 tracking-tight">
        Timeline
      </h2>
      <p class="text-secondary small mb-0" style="color: #a1a1aa !important">
        Playground for thoughts and code documentation.
      </p>
    </div>
    <?php if ($data["posts"] === null): ?>
      <div class="d-flex flex-column align-items-center justify-content-center text-center py-5 px-4 mt-3">
        <div class="text-secondary mb-2 opacity-25">
          <i class="bi bi-chat-square-text" style="font-size: 2.5rem;"></i>
        </div>
        <h3 class="fw-bold fs-6 text-white mb-1">No posts yet</h3>
        <p class="text-secondary small mb-0">Be the first to share something!</p>
      </div>
    <?php else: ?>
      <?php require_once __DIR__ . "/postList.php" ?>
    <?php endif ?>
  </div>
</div>