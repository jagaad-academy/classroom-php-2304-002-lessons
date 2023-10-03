<?php
/**
 * Routes.php
 * hennadii.shvedko
 * 03.10.2023
 */

namespace PaymentApi;

enum Routes: string
{
    case Methods = 'methods';
    case Customers = 'customers';
    case Payments = 'payments';
    case Basket = 'basket';

    public function toSingular(): string
    {
        return match ($this) {
            Routes::Methods => 'method',
            Routes::Customers => 'customer',
            Routes::Payments => 'payment',
            Routes::Basket => 'basket',
        };
    }
}
