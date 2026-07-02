<div class="d-flex flex-column align-items-center justify-content-center text-center py-5 px-4 mt-4">
  <div
    class="bg-secondary bg-opacity-10 border border-secondary border-opacity-25 rounded-circle d-flex align-items-center justify-content-center mb-3"
    style="width: 64px; height: 64px;">
    <i class="bi bi-person-x text-secondary fs-3"></i>
  </div>
  <h3 class="fw-bold fs-6 text-white mb-1">No users found</h3>
  <p class="text-secondary small mb-0" style="max-width: 280px;">
    We couldn't find anyone matching "
    <?= htmlspecialchars($_GET['query']) ?>". Check the spelling and try again.
  </p>
</div>