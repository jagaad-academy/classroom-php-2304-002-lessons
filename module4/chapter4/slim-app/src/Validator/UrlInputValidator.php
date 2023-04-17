<?php

declare(strict_types=1);

namespace ShortenUrl\Validator;

class UrlInputValidator
{
    public function validate(array $inputs): array
    {
        $errors = [];
        if (trim($inputs['name']) === '') {
            $errors[] = 'Input field "name" can not be empty';
        }
        if (trim($inputs['url']) === '') {
            $errors[] = 'Input field "url" can not be empty';
        }
        return $errors;
    }
}
