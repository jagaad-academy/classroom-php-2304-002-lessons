<?php
/**
 * countable.php
 * hennadii.shvedko
 * 12.09.2023
 */


class Users implements Countable
{
    public function __construct(private readonly int $count){}

    public function count(): int
    {
        return $this->count;
    }
}

$users = new Users(10);

echo count($users);
