<?php

declare(strict_types=1);

namespace SimpleShop\Exception;

final class DuplicatedProductException extends \DomainException
{
    public static function fromName(string $name): self
    {
        return new self("Product with the name '$name' already exists");
    }
}
