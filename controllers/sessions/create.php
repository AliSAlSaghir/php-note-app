<?php

$email = $_SESSION['form_data']['email'] ?? '';
$password = $_SESSION['form_data']['password'] ?? '';

view('sessions/create.view.php', [
  'errors' => $_SESSION['errors'] ?? [],
  'form_data' => [
    'email' => $email,
    'password' => $password
  ]
]);

unset($_SESSION['errors']);
unset($_SESSION['form_data']);
