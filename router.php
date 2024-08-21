<?php

class Router {
  public $routes = [];
  public function add($uri, $controller, $method) {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
      'middleware' => null,
    ];
    return $this;
  }
  public function get($uri, $controller) {
    return $this->add($uri, $controller, 'GET');
  }
  public function post($uri, $controller) {
    return $this->add($uri, $controller, 'POST');
  }
  public function put($uri, $controller) {
    return $this->add($uri, $controller, 'PUT');
  }
  public function patch($uri, $controller) {
    return $this->add($uri, $controller, 'PATCH');
  }
  public function delete($uri, $controller) {
    return $this->add($uri, $controller, 'DELETE');
  }
  public function route($uri, $method) {
    foreach ($this->routes as $route) {
      if ($route['uri'] == $uri && $route['method'] == strtoupper($method)) {
        if ($route['middleware'] === 'guest') {
          (new Guest)->handle();
        }
        if ($route['middleware'] === 'auth') {
          (new Auth)->handle();
        }
        return require basePath('/' . $route['controller']);
      }
    }
    $this->abort();
  }
  protected function abort($code = 404) {
    http_response_code($code);
    require basePath("/views/{$code}.php");
    die();
  }
  function only($key) {
    $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    return $this;
  }
}
