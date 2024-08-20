<?php

$currentUserId = 2;
$db = App::resolve(Database::class);

$query = "SELECT * FROM notes where id= :id";
$note = $db->query($query, [':id' => $_GET['id']])->findOrFail();

if (!$note) abort();
if ($note['user_id'] != $currentUserId) abort(Response::FORBIDDEN);

authorize($note['user_id'] == $currentUserId);


require view("notes/edit.view.php", [
  'heading' => "Edit Note",
  'errors' => [],
  'note' => $note
]);
