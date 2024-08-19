<?php

$heading = "Note";
$currentUserId = 2;
$config = require "config.php";

$db = new Database($config['database']);

$query = "SELECT * FROM notes where id= :id";
$note = $db->query($query, [':id' => $_GET['id']])->findOrFail();


authorize($note['user_id'] == $currentUserId);

require "views/note.view.php";
