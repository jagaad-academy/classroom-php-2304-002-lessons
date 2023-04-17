<?php

require_once __DIR__ . '/../boot.php';

use PdoApp\Database\PdoConnectionFactory;

$pdo = PdoConnectionFactory::make();

echo 'connected';
