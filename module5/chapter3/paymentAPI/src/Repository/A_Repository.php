<?php
/**
 * A_Repository.php
 * hennadii.shvedko
 * 03.10.2023
 */

namespace PaymentApi\Repository;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use PaymentApi\Model\A_Model;

abstract class A_Repository
{
    public function __construct(protected EntityManager $em){}


    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function store(A_Model $model): void
    {
        $this->em->persist($model);
        $this->em->flush();
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function update(A_Model $model): void
    {
        $this->em->persist($model);
        $this->em->flush();
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function remove(A_Model $model): void
    {
        $this->em->remove($model);
        $this->em->flush();
    }
}
