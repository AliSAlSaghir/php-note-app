<?php require basePath("/views/partials/head.php") ?>
<?php require basePath("/views/partials/nav.php") ?>

<?php require basePath("/views/partials/banner.php") ?>

<main>
  <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <ul>
      <?php foreach ($notes as $note): ?>
        <li><a href="note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline"><?= htmlspecialchars($note['body']) ?></a></li>
      <?php endforeach ?>
    </ul>
    <p class="mt-6"><a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a></p>
  </div>
</main>

<?php require basePath("/views/partials/footer.php") ?>