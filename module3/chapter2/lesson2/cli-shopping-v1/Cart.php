<?php

class Cart {
    /** @var Product[] */
    private array $products;

    public function __construct(Product $product = null)
    {
        $this->products = [];
        
        if ($product !== null) {
            $this->add($product);
        }
    }

    public function add(Product $product): void
    {
        $this->products[] = $product;
    }

    /**
     * @return Product[]
     */
    public function products(): array
    {
        return $this->products;
    }

    // @todo remove product
}
