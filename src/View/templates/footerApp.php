</div>
</div>
</main>
<div class="d-block d-md-none fixed-bottom navbar-blur grid-border-top py-2 px-3" style="z-index: 1030">
  <div class="d-flex justify-content-around align-items-center">
    <a href="/home" class="text-white p-2">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
      </svg>
    </a>
    <a href="/search" class="text-secondary p-2">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <circle cx="11" cy="11" r="8"></circle>
        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
      </svg>
    </a>
    <a href="/post/create" class="text-secondary p-2">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <circle cx="12" cy="12" r="10"></circle>
        <line x1="12" y1="8" x2="12" y2="16"></line>
        <line x1="8" y1="12" x2="16" y2="12"></line>
      </svg>
    </a>
    <a href="/profile" class="text-secondary p-2">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
        <circle cx="12" cy="7" r="4"></circle>
      </svg>
    </a>
  </div>
</div>
<?php if (isset($data["components"])): ?>
  <?php foreach ($data["components"] as $component) {
    require_once __DIR__ . "/../components/$component";
  } ?>
<?php endif ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<?php if (isset($data["scripts"])): ?>
  <?php foreach ($data["scripts"] as $script): ?>
    <script src="/public/js/<?= $script ?>"></script>
  <?php endforeach ?>
<?php endif ?>
</body>

</html>