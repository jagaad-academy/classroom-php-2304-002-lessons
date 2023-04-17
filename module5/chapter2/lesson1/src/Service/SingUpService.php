<?php

declare(strict_types=1);

namespace OrmLesson\Service;

use OrmLesson\Entity\User;
use OrmLesson\Repository\UserRepository;

final class SingUpService
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function singUp(string $email): User
    {
        $user = new User($email);
        $this->userRepository->store($user);
        return $user;
    }
}
