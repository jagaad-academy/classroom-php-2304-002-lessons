<?php

namespace ManageBills\Repository;

use ManageBills\Entity\Bill;

interface BillRepository
{
    public function store(Bill $bill): void;
    /** @return Bill[] */
    public function findAll(): array;
    public function find(int $id): Bill;
}
