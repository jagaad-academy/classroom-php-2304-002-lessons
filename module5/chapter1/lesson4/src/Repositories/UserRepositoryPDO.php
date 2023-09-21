<?php
/**
 * UserRepositoryPDO.php
 * hennadii.shvedko
 * 21.09.2023
 */

namespace APIDocker\Repositories;

use APIDocker\Entities\Users;
use APIDocker\Repositories\UserRepository;

class UserRepositoryPDO implements UserRepository
{

    public function store(Users $user): void
    {
        // TODO: Implement store() method.
    }

    public function findAll(): array
    {
        // TODO: Implement findAll() method.
    }

    public function findById(int $userId): Users
    {
        // TODO: Implement findById() method.
    }
}
