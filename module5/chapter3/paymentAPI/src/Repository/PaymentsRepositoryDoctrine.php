<?php
/**
 * PaymentsRepositoryDoctrine.php
 * hennadii.shvedko
 * 04.10.2023
 */

namespace PaymentApi\Repository;

use Doctrine\ORM\Exception\NotSupported;
use PaymentApi\Model\Payments;

class PaymentsRepositoryDoctrine extends A_Repository implements PaymentsRepository
{

    /**
     * @throws NotSupported
     */
    public function findAll(): array
    {
        return $this->em->getRepository(Payments::class)->findAll();
    }

    /**
     * @throws NotSupported
     */
    public function findById(int $paymentId): Payments|null
    {
        return $this->em->getRepository(Payments::class)->find($paymentId);
    }
}
