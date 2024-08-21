<?php require basePath("/views/partials/head.php") ?>
<?php require basePath("/views/partials/nav.php") ?>

<main>
  <div class="flex items-center justify-center min-h-full px-4 py-12 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
      <div>
        <img class="w-auto h-12 mx-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
          alt="Your Company">
        <h2 class="mt-6 text-3xl font-bold tracking-tight text-center text-gray-900">Log In!</h2>
      </div>

      <form class="mt-8 space-y-6" action="/sessions" method="POST">
        <div class="-space-y-px rounded-md shadow-sm">
          <div>
            <label for="email" class="sr-only">Email address</label>
            <input id="email" name="email" type="email" autocomplete="email" value=<?= htmlspecialchars($form_data['email']) ?> required
              class="relative block w-full px-3 py-2 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-none appearance-none rounded-t-md focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
              placeholder="Email address">
          </div>

          <div>
            <label for="password" class="sr-only">Password</label>
            <input id="password" name="password" type="password" autocomplete="current-password" value=<?= htmlspecialchars($form_data['password']) ?? '' ?> required
              class="relative block w-full px-3 py-2 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-none appearance-none rounded-b-md focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
              placeholder="Password">
          </div>
        </div>

        <div>
          <button type="submit"
            class="relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md group hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Log in
          </button>
        </div>

        <ul>
          <?php if (isset($errors['email'])) : ?>
            <li class="mt-2 text-xs text-red-500"><?= $errors['email'] ?></li>
          <?php endif; ?>

          <?php if (isset($errors['password'])) : ?>
            <li class="mt-2 text-xs text-red-500"><?= $errors['password'] ?></li>
          <?php endif; ?>
        </ul>
      </form>
    </div>
  </div>
</main>


<?php require basePath("/views/partials/footer.php") ?>