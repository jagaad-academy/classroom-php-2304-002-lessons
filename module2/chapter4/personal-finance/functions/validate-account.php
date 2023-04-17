<?php

function validateAccountInputs(array $inputs): bool
{
    $validTypes = ['credit', 'debit'];

    if (! in_array($inputs['type'], $validTypes)) {
        throw new InvalidArgumentException('Invalid account type');
    }

    return true;
}
