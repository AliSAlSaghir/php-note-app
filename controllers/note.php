<?php

$config = require "config.php";

$db = new Database($config['database']);

$query = "SELECT * FROM notes where id= :id";
$note = $db->query($query, [':id' => $_GET['id']])->fetch();


$heading = "Note";

require "views/note.view.php";
