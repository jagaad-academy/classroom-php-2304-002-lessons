<?php
/**
 * MethodsRepositoryDoctrine.php
 * hennadii.shvedko
 * 26.09.2023
 */

namespace PaymentApi\Repository;

use Doctrine\ORM\Exception\NotSupported;
use PaymentApi\Model\Methods;

class MethodsRepositoryDoctrine extends A_Repository implements MethodsRepository
{

    /**
     * @throws NotSupported
     */
    public function findAll(): array
    {
        return $this->em->getRepository(Methods::class)->findAll();
    }

    /**
     * @throws NotSupported
     */
    public function findById(int $methodId): Methods|null
    {
        return $this->em->getRepository(Methods::class)->find($methodId);
    }
}
