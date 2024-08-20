<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = require basePath("/routes.php");

function routeToController($uri, $routes) {
  if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
  } else {
    abort();
  }
}

function abort($code = 404) {
  http_response_code($code);
  require basePath("/../views/{$code}.php");
  die();
}

routeToController($uri, $routes);

// array(6) {
//   ["/"]=>
//   string(21) "controllers/index.php"
//   ["/about"]=>
//   string(21) "controllers/about.php"
//   ["/contact"]=>
//   string(23) "controllers/contact.php"
//   ["/notes"]=>
//   string(27) "controllers/notes/index.php"
//   ["/notes/create"]=>
//   string(28) "controllers/notes/create.php"
//   ["/note"]=>
//   string(26) "controllers/notes/show.php"
// }

// string(8) "/public/"