<?php

namespace Jagaad\Presentation\Option;

use Jagaad\Presentation\Option;
use Jagaad\Shop\Product;

class KeyboardOption extends ProductOption implements Option
{
    public function key(): string
    {
        return '2';
    }

    public function description(): string
    {
        return 'Keyboard, $100';
    }

    public function handle(): void
    {
        $this->addProduct(new Product('Keyboard', 100));
    }
}
