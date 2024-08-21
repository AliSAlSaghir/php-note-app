<?php

$email = $_POST['email'];
$password = $_POST['password'];

require basePath("/core/Validator.php");

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::email($email)) $errors['email'] = 'Please provide a valid email address!';
if (!Validator::string($password, 7, 255)) $errors['password'] = 'Password should be at least 7 characters long!';
if (!empty($errors)) {
  require view("registration/create.view.php", [
    'errors' => $errors,
  ]);
}

$user = $db->query("SELECT * FROM users WHERE email = :email", [
  ":email" => $email
])->find();

if ($user) {
  header('location: /');
  die();
} else {

  $db->query('INSERT INTO users(email,password) VALUES(:email,:password)', [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT),
  ]);

  login([
    'email' => $email
  ]);

  header('location: /');

  die();
}
