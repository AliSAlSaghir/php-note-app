<?php

$config = require basePath("/config.php");

$db = new Database($config['database']);

$id = $_GET['id'] ?? 2;

$query = "SELECT * FROM notes where user_id= :id";
$notes = $db->query($query, [':id' => $id])->get();

require view("notes/index.view.php", [
  'heading' => "My Notes",
  'notes' => $notes
]);
