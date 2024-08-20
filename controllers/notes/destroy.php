<?php


$currentUserId = 2;
$config = require basePath("/config.php");

$db = new Database($config['database']);


$query = "SELECT * FROM notes where id= :id";
$note = $db->query($query, [':id' => $_POST['id']])->findOrFail();

if (!$note) abort();
if ($note['user_id'] != $currentUserId) abort(Response::FORBIDDEN);

authorize($note['user_id'] == $currentUserId);

$db->query('DELETE from notes where id = :id', [':id' => $_POST['id']]);

header('location: /notes');
exit();
