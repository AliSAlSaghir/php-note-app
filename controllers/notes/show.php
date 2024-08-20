<?php


$currentUserId = 2;
$config = require basePath("/config.php");

$db = new Database($config['database']);

$query = "SELECT * FROM notes where id= :id";
$note = $db->query($query, [':id' => $_GET['id']])->findOrFail();

if (!$note) abort();
$currentUserId = 2;
if ($note['user_id'] != $currentUserId) abort(Response::FORBIDDEN);

authorize($note['user_id'] == $currentUserId);

require view("notes/show.view.php", [
  'heading' => "Note",
  'note' => $note
]);
