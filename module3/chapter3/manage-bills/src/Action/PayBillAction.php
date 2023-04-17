<?php

namespace ManageBills\Action;

use ManageBills\Factory\BillRepositoryFactory;

class PayBillAction
{
    public function handle(): void
    {
        $id = (int)filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $billRepository = BillRepositoryFactory::make();
        $bill = $billRepository->find($id);
        $bill->paid();
        $billRepository->store($bill);

        header('Location: /index.php');
    }
}