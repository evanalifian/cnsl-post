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