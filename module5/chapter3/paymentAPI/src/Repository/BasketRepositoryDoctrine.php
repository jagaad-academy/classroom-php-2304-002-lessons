<?php
/**
 * PaymentsRepositoryDoctrine.php
 * hennadii.shvedko
 * 04.10.2023
 */

namespace PaymentApi\Repository;

use Doctrine\ORM\Exception\NotSupported;
use PaymentApi\Model\Basket;

class BasketRepositoryDoctrine extends A_Repository implements BasketRepository
{

    /**
     * @throws NotSupported
     */
    public function findAll(): array
    {
        return $this->em->getRepository(Basket::class)->findAll();
    }

    /**
     * @throws NotSupported
     */
    public function findById(int $basketId): Basket|null
    {
        return $this->em->getRepository(Basket::class)->find($basketId);
    }
}
