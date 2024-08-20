<?php

function dd($value) {
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  die();
}

function urlIs($value) {
  return $_SERVER['REQUEST_URI'] === $value;
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
