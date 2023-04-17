<?php

return [
    'host' => $_ENV['DB_HOST'] ?? '',
    'name' => $_ENV['DB_NAME'] ?? '',
    'user' => $_ENV['DB_USER'] ?? '',
    'pass' => $_ENV['DB_PASS'] ?? '',
];
