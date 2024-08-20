<?php require basePath("/views/partials/head.php") ?>
<?php require basePath("/views/partials/nav.php") ?>

<?php require basePath("/views/partials/banner.php") ?>

<main>
  <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <p class="mb-6"><a href="/notes" class="text-blue-500 underline">go back</a></p>
    <p><?= htmlspecialchars($note['body']) ?></p>
    <form class="mt-6" method='POST'>
      <input type="hidden" name="id" value="<?= $note['id'] ?>" />
      <input type="hidden" name="_method" value="DELETE" />
      <button class="text-sm text-red-500">Delete</button>
    </form>
  </div>
</main>

<?php require basePath("/views/partials/footer.php") ?>