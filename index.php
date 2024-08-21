<?php

session_start();

const BASE_PATH = __DIR__ . '/';
require BASE_PATH . "functions.php";


spl_autoload_register(function ($class) {
  $directories = ['/', '/middleware/'];

  foreach ($directories as $directory) {
    $path = basePath($directory . $class . '.php');
    if (file_exists($path)) {
      require $path;
      return;
    }
  }
});



require basePath('/bootstrap.php');

require basePath("/Router.php");
$router = new Router();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = require basePath("/routes.php");

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
