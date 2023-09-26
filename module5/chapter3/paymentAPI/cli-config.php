<?php

use DI\Container;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

/** @var Container $container */
$container = require_once __DIR__ . '/container/container.php';

return ConsoleRunner::createHelperSet($container->get(EntityManager::class));
