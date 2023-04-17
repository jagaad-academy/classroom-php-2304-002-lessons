<?php

namespace Jagaad\Presentation\Option;

use Jagaad\Presentation\Option;
use Jagaad\Shop\Product;

class MonitorOption extends ProductOption implements Option
{
    public function key(): string
    {
        return '3';
    }

    public function description(): string
    {
        return 'Monitor, $500';
    }

    public function handle(): void
    {
        $this->addProduct(new Product('Monitor', 500));
    }
}
