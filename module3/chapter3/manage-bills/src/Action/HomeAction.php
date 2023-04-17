<?php

namespace ManageBills\Action;

use ManageBills\Factory\BillRepositoryFactory;

class HomeAction
{
    public function handle(): void
    {
        $repository = BillRepositoryFactory::make();
        $bills = $repository->findAll();

        require_once __DIR__ . '/../../views/home.php';
    }
}
