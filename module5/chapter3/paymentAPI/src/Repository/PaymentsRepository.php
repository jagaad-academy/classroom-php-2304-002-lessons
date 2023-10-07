<?php
/**
 * PaymentsRepository.php
 * hennadii.shvedko
 * 04.10.2023
 */

namespace PaymentApi\Repository;

use PaymentApi\Model\Payments;

interface PaymentsRepository
{
    public function store(Payments $payments): void;
    public function update(Payments $payments): void;
    public function remove(Payments $payments): void;
    public function findAll(): array;
    public function findById(int $paymentId): Payments|null;
}
