<?php

namespace ManageBills\Factory;

use ManageBills\Repository\BillRepository;
use ManageBills\Repository\BillRepositoryFromPdo;

class BillRepositoryFactory
{
    public static function make(): BillRepository
    {
        $pdo = require __DIR__ . '/../../config/conn.php';
        return new BillRepositoryFromPdo($pdo);
    }
}
