<?php

namespace OnlineStoreProject\Entities;

interface I_Entities
{
    public function findById(int $id): array;

    public function findAllById(int $id): array;

    public function findAll(): array;

    public function insert(array $values): bool;

    public function deleteById(int $id): bool;
}
