<?php

declare(strict_types=1);

namespace SimpleShop\Repository;

use SimpleShop\Model\Product;

interface ProductRepository
{
    public function store(Product $product): void;
}
