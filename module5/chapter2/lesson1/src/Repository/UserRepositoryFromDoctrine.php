<?php

declare(strict_types=1);

namespace OrmLesson\Repository;

use Doctrine\ORM\EntityManager;
use OrmLesson\Entity\User;

final class UserRepositoryFromDoctrine implements UserRepository
{
    public function __construct(private EntityManager $entityManager)
    {
    }

    public function store(User $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function find(string $userId): User
    {
        return $this->entityManager->getRepository(User::class)->find($userId);
    }
}
