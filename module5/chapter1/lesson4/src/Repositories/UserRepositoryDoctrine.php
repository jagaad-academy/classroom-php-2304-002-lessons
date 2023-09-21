<?php
/**
 * UserRepositoryDoctrine.php
 * hennadii.shvedko
 * 21.09.2023
 */

namespace APIDocker\Repositories;

use APIDocker\Entities\Users;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\NotSupported;
use Doctrine\ORM\Exception\ORMException;

class UserRepositoryDoctrine implements UserRepository
{
    public function __construct(private EntityManager $entityManager)
    {
    }

    public function store(Users $user): void
    {
        try {
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        } catch (ORMException $e) {
            error_log($e->getMessage());
        }
    }

    public function remove(Users $user): void
    {
        try {
            $this->entityManager->remove($user);
            $this->entityManager->flush();
        } catch (ORMException $e) {
            error_log($e->getMessage());
        }
    }

    public function update(Users $user): void
    {
        try {
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        } catch (ORMException $e) {
            error_log($e->getMessage());
        }
    }

    public function findAll(): array
    {
        try {
            $users = $this->entityManager->getRepository(Users::class)->findAll();
        } catch (NotSupported $e) {
            error_log($e->getMessage());
            $users = [];
        }

        return $users;
    }

    public function findById(int $userId): Users|null
    {
        try {
            $user = $this->entityManager->getRepository(Users::class)->find($userId);
        } catch (NotSupported $e) {
            $user = null;
            error_log($e->getMessage());
        }

        return $user;
    }
}
