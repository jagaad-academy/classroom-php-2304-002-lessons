<?php
/**
 * CustomersRepositoryDoctrine.php
 * hennadii.shvedko
 * 03.10.2023
 */

namespace PaymentApi\Repository;

use Doctrine\ORM\Exception\NotSupported;
use PaymentApi\Model\Customers;

final class CustomersRepositoryDoctrine extends A_Repository implements CustomersRepository
{
    /**
     * @throws NotSupported
     */
    public function findAll(): array
    {
        return $this->em->getRepository(Customers::class)->findAll();
    }

    /**
     * @throws NotSupported
     */
    public function findById(int $customerId): Customers|null
    {
        return $this->em->getRepository(Customers::class)->find($customerId);
    }
}
