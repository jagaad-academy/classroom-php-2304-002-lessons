<?php

namespace Jagaad\Presentation\Option;

use Jagaad\Presentation\Option;
use Jagaad\Shop\Cart;
use Jagaad\Shop\Product;

class LaptopOption extends ProductOption implements Option
{
    public function key(): string
    {
        return '1';
    }

    public function description(): string
    {
        return 'Laptop, $100';
    }

    public function handle(): void
    {
        $this->addProduct(new Product('Laptop Linux', 1000));
    }
}
