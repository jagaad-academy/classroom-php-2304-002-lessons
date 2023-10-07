<?php
/**
 * CustomersRepository.php
 * hennadii.shvedko
 * 03.10.2023
 */

namespace PaymentApi\Repository;

use PaymentApi\Model\Basket;

interface BasketRepository
{
    public function store(Basket $basket): void;
    public function update(Basket $basket): void;
    public function remove(Basket $basket): void;
    public function findAll(): array;
    public function findById(int $basketId): Basket|null;
}
