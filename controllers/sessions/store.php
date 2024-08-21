<?php


$email = $_POST['email'];
$password = $_POST['password'];

require basePath("/core/Validator.php");

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::email($email)) $errors['email'] = 'Please provide a valid email address!';
if (!Validator::string($password, 7, 255)) $errors['password'] = 'Password should be at least 7 characters long!';

if (!empty($errors)) {
  $_SESSION['errors'] = $errors;
  $_SESSION['form_data'] = [
    'email' => $email,
    'password' => $password
  ];
  redirect('/login');
}

$user = $db->query("SELECT * FROM users WHERE email = :email", [
  ":email" => $email
])->find();

if ($user && password_verify($password, $user['password'])) {
  login(['email' => $email]);

  redirect('/');
} else {
  // If authentication fails, redirect back with an error
  $_SESSION['errors'] = [
    'email' => 'No matching account found for that email address or incorrect password'
  ];
  $_SESSION['form_data'] = ['email' => $email]; // Optionally store form data
  redirect('/login');
}
