<?php
/**
 * Product.php
 * hennadii.shvedko
 * 22.09.2023
 */

namespace HennadiiShvedko\Lesson3;

class Product
{
    public function __construct(private string $name){}

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
