<?php

require basePath("/core/Validator.php");

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) $errors['body'] = 'A body with no more than 1000 characters is required!';
if (!empty($errors)) {
  require view("notes/create.view.php", [
    'heading' => "Create Note",
    'errors' => $errors,
  ]);
}

$db->query('INSERT INTO notes(body,user_id) VALUES(:body,:user_id)', [
  'body' => $_POST['body'],
  'user_id' => 2
]);
header('location: /notes');
die();
