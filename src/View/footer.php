<?php if ($_SERVER['REQUEST_URI'] !== "/login" && $_SERVER['REQUEST_URI'] !== "/signup"): ?>
  <footer id="docs" class="py-4 border-top bg-light">
    <div class="container">
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
        <div class="small text-secondary text-center text-md-start">
          &copy; 2026 <a href="https://github.com/evanalifian" class="text-dark fw-medium text-decoration-none">Evan
            Alifian</a>. Built for speed and clean code.
        </div>
        <div class="d-flex gap-4 small justify-content-center">
          <a href="https://github.com/evanalifian/php-boilerplate/blob/main/README.md" target="_blank"
            class="text-secondary text-decoration-none custom-link">Documentation</a>
        </div>
      </div>
    </div>
  </footer>
<?php endif ?>

<script src="/public/js/bootstrap.bundle.min.js"></script>
<?php if (isset($data["scripts"])): ?>
  <?php foreach ($data["scripts"] as $script): ?>
    <script src="/public/js/<?= $script ?>"></script>
  <?php endforeach ?>
<?php endif ?>
</body>

</html>