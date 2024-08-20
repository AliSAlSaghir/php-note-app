<?php

require 'Container.php';
require 'App.php';
require 'Database.php';

$container = new Container();

$container->bind('Database', function () {
  $config = require basePath('/config.php');

  return new Database($config['database']);
});

App::setContainer($container);
