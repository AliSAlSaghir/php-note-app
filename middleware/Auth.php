<?php

class Auth {
  public function handle() {
    if (!$_SESSION['user'] ?? false) {
      header('Location: /register');
      exit();
    }
  }
}
