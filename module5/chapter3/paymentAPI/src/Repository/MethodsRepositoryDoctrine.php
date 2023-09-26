<?php
/**
 * MethodsRepositoryDoctrine.php
 * hennadii.shvedko
 * 26.09.2023
 */

namespace PaymentApi\Repository;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\NotSupported;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use PaymentApi\Model\Methods;

class MethodsRepositoryDoctrine implements MethodsRepository
{
    public function __construct(private EntityManager $em){}

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function store(Methods $method): void
    {
        $this->em->persist($method);
        $this->em->flush();
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function update(Methods $method): void
    {
        $this->em->persist($method);
        $this->em->flush();
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function remove(Methods $method): void
    {
        $this->em->remove($method);
        $this->em->flush();
    }

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
