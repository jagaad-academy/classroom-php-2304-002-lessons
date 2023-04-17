<?php

function validateTransactionInputs(array $inputs): bool
{
    $arrDate = explode('-', $inputs['transaction_date']);
    if (count($arrDate) !== 3) {
        throw new InvalidArgumentException('Invalid transaction_date');
    }
    if (! checkdate($arrDate[1], $arrDate[2], $arrDate[0])) {
        throw new InvalidArgumentException('Invalid transaction_date');
    }

    if ($inputs['amount'] <= 0) {
        throw new InvalidArgumentException('Invalid amount');
    }

    $validTypes = ['income', 'expenses'];
    if (! in_array($inputs['type'], $validTypes)) {
        throw new InvalidArgumentException('Invalid type, it must be "income" or "expenses"');
    }

    $validStatus = ['paid', 'unpaid'];
    if ($inputs['type'] === 'expenses' && ! in_array($inputs['status'], $validStatus)) {
        throw new InvalidArgumentException('Invalid status, it must be "paid" or "unpaid"');
    }

    $validStatus = ['received', 'unreceived'];
    if ($inputs['type'] === 'income' && ! in_array($inputs['status'], $validStatus)) {
        throw new InvalidArgumentException('Invalid status, it must be "received" or "unreceived"');
    }

    return true;
}
