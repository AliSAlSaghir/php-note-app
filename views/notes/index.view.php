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
    <p class="mt-6"><a href="/notes/create" class="px-3 py-[0.65rem] text-sm font-semibold text-white bg-blue-600 rounded-md shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Create Note</a></p>
  </div>
</main>

<?php require basePath("/views/partials/footer.php") ?>