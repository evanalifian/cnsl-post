<?php if (isset($data["components"])): ?>
  <?php foreach ($data["components"] as $component) {
    require_once __DIR__ . "/../components/$component";
  } ?>
<?php endif ?>
<footer class="footer mt-auto py-3 bg-black">
  <div class="container text-center">
    <p class="text-body-secondary mb-0 small" style="font-size: 0.75rem; letter-spacing: 0.05em;">
      &copy; 2026 cnsl-post. All rights reserved.
    </p>
  </div>
</footer>
<script src="/public/js/bootstrap.bundle.min.js"></script>
<?php if (isset($data["scripts"])): ?>
  <?php foreach ($data["scripts"] as $script): ?>
    <script src="/public/js/<?= $script ?>"></script>
  <?php endforeach ?>
<?php endif ?>
</body>
</html>