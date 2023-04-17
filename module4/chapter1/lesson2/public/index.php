<?php

require_once __DIR__ . '/../vendor/autoload.php';

use QualityToolsExample\Mailer;

$log = \QualityToolsExample\LoggerFactory::make();

$mailer = new Mailer($log);
$mailer->send('lucas.oliveira@jagaad.com');
