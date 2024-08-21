<?php

$email = $_POST['email'];
$password = $_POST['password'];

require basePath("/Validator.php");

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::email($email)) $errors['email'] = 'Please provide a valid email address!';
if (!Validator::string($password, 7, 255)) $errors['password'] = 'Password should be at least 7 characters long!';
if (!empty($errors)) {
  require view("sessions/create.view.php", [
    'errors' => $errors,
  ]);
}

$user = $db->query("SELECT * FROM users WHERE email = :email", [
  ":email" => $email
])->find();

if ($user) {
  if (password_verify($password, $user['password'])) {
    login([
      'email' => $email
    ]);

    header('location: /');
    die();
  }
}


return view('sessions/create.view.php', [
  'errors' => [
    'email' => 'No matching account found for that email address password'
  ]
]);
