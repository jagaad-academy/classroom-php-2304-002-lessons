<?php

namespace ManageBills\Action;

use ManageBills\Entity\Bill;
use ManageBills\Factory\BillRepositoryFactory;

class CreateBillAction
{
    public function handle(): void
    {
        $amount = 100;
        $dueDate = 12;
        $category = 'CategoryTest';

        $bill = new Bill(
            filter_input(INPUT_POST, 'name'),
            filter_input(INPUT_POST, 'description'),
            $amount,
            $dueDate,
            $category,
        );

        $repository = BillRepositoryFactory::make();
        $repository->store($bill);

        header('Location: /index.php');
    }
}
