<?php
/**
 * CustomersRepository.php
 * hennadii.shvedko
 * 03.10.2023
 */

namespace PaymentApi\Repository;

use PaymentApi\Model\Customers;

interface CustomersRepository
{
    public function store(Customers $customer): void;
    public function update(Customers $customer): void;
    public function remove(Customers $customer): void;
    public function findAll(): array;
    public function findById(int $customerId): Customers|null;
}
