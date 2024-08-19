<?php

$config = require "config.php";

$db = new Database($config['database']);

$id = $_GET['id'] ?? 2;
$query = "SELECT * FROM notes where user_id= :id";
$notes = $db->query($query, [':id' => $id])->get();


$heading = " My Notes";

require "views/notes.view.php";
