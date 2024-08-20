<?php

$currentUserId = 2;
$db = App::resolve(Database::class);

$query = "SELECT * FROM notes where id= :id";
$note = $db->query($query, [':id' => $_POST['id']])->findOrFail();

if (!$note) abort();
if ($note['user_id'] != $currentUserId) abort(Response::FORBIDDEN);

authorize($note['user_id'] == $currentUserId);

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) $errors['body'] = 'A body with no more than 1000 characters is required!';
if (!empty($errors)) {
  require view("notes/edit.view.php", [
    'heading' => "Edit Note",
    'errors' => $errors,
  ]);
}

$db->query('UPDATE notes SET body= :body WHERE id = :id', [
  'body' => $_POST['body'],
  'id' => $_POST['id'],
]);
header('location: /notes');
die();
