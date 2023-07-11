<?php

namespace OnlineStoreProject\Entities;

interface I_Entities
{
    public function findById(int $id): I_Entities;

    public function findAllById(int $id): array;
}
