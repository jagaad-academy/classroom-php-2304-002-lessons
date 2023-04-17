<?php

declare(strict_types=1);

namespace SimpleShop\Validator;

use SimpleShop\Exception\InvalidInputException;

final class CreateProductValidator
{
    public static function validate(array $inputs): void
    {
        $errors = [];
        $name = $inputs['name'] ?? '';

        if (trim($name) === '') {
            $errors[] = 'name should not be empty';
        }
        if (strlen($name) < 3) {
            $errors[] = 'name should have more than 2 characters';
        }
        if (strlen($name) > 255) {
            $errors[] = 'name should have max of 255 characters';
        }

        if (count($errors) > 0) {
            throw InvalidInputException::fromErrors($errors);
        }
    }
}
