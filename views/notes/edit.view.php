<?php require basePath("/views/partials/head.php") ?>
<?php require basePath("/views/partials/nav.php") ?>

<?php require basePath("/views/partials/banner.php") ?>

<main>
  <div class=" mx-4 my-6 py-6 px-4 sm:px-6 lg:px-8 w-[55%] bg-white shadow-md rounded">
    <form method="POST" action="/note">
      <input type="hidden" name="_method" value="PATCH">
      <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
      <div class="space-y-12">
        <div class="col-span-full">
          <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
          <div class="mt-2">
            <textarea id="body" name="body" rows="3" placeholder="Here's an idea for a note..." class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $note['body'] ?? '' ?></textarea>
            <?php if (isset($errors['body'])): ?>
              <p class="mt-2 text-sm text-red-500"><?= $errors['body'] ?></p>
            <?php endif; ?>
          </div>
        </div>
        <div class="flex items-center justify-end mt-4 gap-x-4">
          <a href="/notes" class="px-3 py-2 text-sm font-semibold text-white bg-gray-600 rounded-md shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Cancel</a>
          <button type="submit" class="px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
        </div>
    </form>
  </div>
</main>

<?php require basePath("/views/partials/footer.php") ?>