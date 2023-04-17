<?php

declare(strict_types=1);

namespace SimpleShop\Exception;

final class InvalidInputException extends \InvalidArgumentException
{
    private array $errors = [];

    public function getInputErrors(): array
    {
        return $this->errors;
    }

    public static function fromErrors(array $errors): self
    {
        $exception = new self('invalid inputs exception');
        $exception->errors = $errors;
        return $exception;
    }
}
