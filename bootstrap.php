<?php

require basePath('/core/Container.php');
require basePath('/core/App.php');
require basePath('/core/Database.php');

$container = new Container();

$container->bind('Database', function () {
  $config = require basePath('/config.php');

  return new Database($config['database']);
});

App::setContainer($container);
