</div>
</div>
</main>
<div class="d-block d-md-none fixed-bottom navbar-blur grid-border-top py-2 px-3" style="z-index: 1030">
  <div class="d-flex justify-content-around align-items-center">
    <?php foreach ($navMenu as $menu): ?>
      <a href="<?= $menu["path"] ?>"
        class="<?= $_SERVER['REQUEST_URI'] === $menu["path"] ? "text-white" : "text-secondary" ?> p-2"><?= $menu["icon"] ?></a>
    <?php endforeach; ?>
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