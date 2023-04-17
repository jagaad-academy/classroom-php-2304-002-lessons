<?php

declare(strict_types=1);

namespace OrmLesson\Repository;

use OrmLesson\Entity\User;

interface UserRepository
{
    public function store(User $user): void;
    public function find(string $userId): User;
}
