<?php

use DI\Container;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__ . '/bootstrap.php';

/** @var Container $container */
$container = require __DIR__ . '/config/container.php';

return ConsoleRunner::createHelperSet($container->get(EntityManager::class));
