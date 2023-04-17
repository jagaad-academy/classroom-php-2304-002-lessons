<?php

namespace Jagaad\Presentation\Option;

use Jagaad\Presentation\Option;
use Jagaad\Shop\Product;

class MouseOption extends ProductOption implements Option
{
    public function key(): string
    {
        return '4';
    }

    public function description(): string
    {
        return 'Mouse, $50';
    }

    public function handle(): void
    {
        $this->addProduct(new Product('Mouse', 50));
    }
}
