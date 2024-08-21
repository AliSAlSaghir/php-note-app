<?php

function dd($value) {
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  die();
}

function abort($code = 404) {
  http_response_code($code);
  require basePath("/../views/{$code}.php");
  die();
}

function urlIs($pattern) {
  $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

  // Check if the pattern ends with a wildcard '*'
  if (substr($pattern, -1) === '*') {
    // Remove the wildcard and match the beginning of the URI
    $pattern = rtrim($pattern, '*');
    return strpos($uri, $pattern) === 0;
  }

  return $uri === $pattern;
}


function authorize($condition, $status = Response::FORBIDDEN) {
  if (!$condition) abort($status);
}

function basePath($path) {
  return __DIR__ . $path;
}

function view($path, $attributes = []) {
  extract($attributes);
  require basePath('/views/' . $path);
}
