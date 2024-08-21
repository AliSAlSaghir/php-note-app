<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>

<?php require "partials/banner.php" ?>

<main>
  <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
    Hello, <?= $_SESSION['user']['email'] ?? 'Guest' ?>
  </div>
</main>

<?php require "partials/footer.php" ?>