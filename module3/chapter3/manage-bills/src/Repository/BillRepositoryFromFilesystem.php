<?php

namespace ManageBills\Repository;

use ManageBills\Entity\Bill;

class BillRepositoryFromFilesystem implements BillRepository
{
    private const STORAGE_FILE = __DIR__ . '/../../database/storage.json';

    public function store(Bill $bill): void
    {
        $billsFromFs = $this->getFileContents();
        $billsFromFs[] = [
            'name' => $bill->name(),
            'description' => $bill->description(),
            'amount' => $bill->amount(),
            'category' => $bill->category(),
            'due_date' => $bill->dueDate(),
            'paid' => (int)$bill->isPaid(),
        ];
        file_put_contents(self::STORAGE_FILE, json_encode($billsFromFs));
    }

    /** @return Bill[] */
    public function findAll(): array
    {
        $billsFromFs = $this->getFileContents();
        $bills = [];
        foreach ($billsFromFs as $billsArray) {
            $bills[] = new Bill(
                $billsArray['name'],
                $billsArray['description'],
                $billsArray['amount'],
                $billsArray['due_date'],
                $billsArray['category']
            );
        }
        return $bills;
    }

    private function getFileContents(): array
    {
        if (! file_exists(self::STORAGE_FILE)) {
            return [];
        }
        return json_decode(file_get_contents(self::STORAGE_FILE), true);
    }
}
