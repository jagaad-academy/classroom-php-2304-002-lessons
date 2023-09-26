<?php
/**
 * MethodsRepository.php
 * hennadii.shvedko
 * 26.09.2023
 */

namespace PaymentApi\Repository;

use PaymentApi\Model\Methods;

interface MethodsRepository
{
    public function store(Methods $method): void;
    public function update(Methods $method): void;
    public function remove(Methods $method): void;
    public function findAll(): array;
    public function findById(int $methodId): Methods|null;
}
