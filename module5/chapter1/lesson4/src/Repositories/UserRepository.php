<?php
/**
 * UserRepository.php
 * hennadii.shvedko
 * 21.09.2023
 */

namespace APIDocker\Repositories;

use APIDocker\Entities\Users;

interface UserRepository
{
    public function store(Users $user): void;
    public function update(Users $user): void;
    public function remove(Users $user): void;

    public function findAll(): array;

    public function findById(int $userId): Users|null;
}
