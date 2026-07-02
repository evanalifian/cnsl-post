<div class="col-12 d-block d-lg-none fixed-bottom bg-black border-top border-secondary border-opacity-25 py-3 px-2 z-3">
  <div class="d-flex flex-row justify-content-around align-items-center mx-auto" style="max-width: 500px">
    <?php foreach ($navLinks as $nav): ?>
      <a href="<?= $nav["path"] ?>"
        class="
      <?= $nav["path"] === $_SERVER['REQUEST_URI'] ? $activeNavItem : $navItem ?>">
        <?= $nav["icon"] ?>
      </a>
    <?php endforeach ?>
    <a href="/profile" class="text-secondary text-decoration-none">
      <img src="<?= $user["avatar_url"] ?>" class="bg-secondary bg-opacity-25 border border-secondary border-opacity-50 rounded-circle d-flex
              align-items-center justify-content-center flex-shrink-0 object-fit-cover"
        style="width: 28px; height: 28px;" alt="Profile Picture" />
    </a>
  </div>
</div>
</div>
</div>
<?php if (isset($data["components"])): ?>
  <?php foreach ($data["components"] as $component) {
    require_once __DIR__ . "/../components/$component";
  } ?>
<?php endif ?>
<script src="/public/js/bootstrap.bundle.min.js"></script>
<?php if (isset($data["scripts"])): ?>
  <?php foreach ($data["scripts"] as $script): ?>
    <script src="/public/js/<?= $script ?>"></script>
  <?php endforeach ?>
<?php endif ?>
</body>

</html>