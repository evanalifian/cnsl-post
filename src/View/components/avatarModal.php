<div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="avatarModalLabel" aria-hidden="true"
  style="backdrop-filter: blur(4px); -webkit-backdrop-filter: blur(4px);">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-transparent border-0">

      <div class="d-flex justify-content-end mb-2">
        <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>

      <div class="modal-body p-0 text-center">
        <img src="<?= $data["user"]->avatar_url ?>"
          class="img-fluid rounded-circle border border-secondary border-opacity-25 shadow mx-auto object-fit-cover"
          style="max-width: 90%; max-height: 70vh; aspect-ratio: 1/1;" alt="
        <?= $data["user"]->display_name ?? $data["user"]->username ?>'s Avatar" />
      </div>

    </div>
  </div>
</div>