<?php

function validateUserInputs(array $inputs): bool
{
    if ($inputs['password'] !== $inputs['repeat_password']) {
        throw new InvalidArgumentException('Passwords do not match');
    }

    if (getUserByEmail($inputs['email']) !== null) {
        throw new InvalidArgumentException('User email already exists');
    }

    return true;
}
