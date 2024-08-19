<?php

$config = require "config.php";

$db = new Database($config['database']);

$query = "SELECT * FROM notes where id= :id";
$note = $db->query($query, [':id' => $_GET['id']])->fetch();

if (!$note) abort();
$currentUserId = 2;
if ($note['user_id'] !== $currentUserId) abort(Response::FORBIDDEN);


$heading = "Note";

require "views/note.view.php";
