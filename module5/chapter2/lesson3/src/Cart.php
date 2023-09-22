<?php
/**
 * Cart.php
 * hennadii.shvedko
 * 22.09.2023
 */

namespace HennadiiShvedko\Lesson3;

class Cart
{
    /**
     * @var int
     */
    private int $qnt;

    /*
     * @var Product[]
     */
    private array $products = [];

    public function __construct()
    {
        $this->qnt = 0;
    }

    public function getQnt(): int
    {
        return $this->qnt;
    }

    public function setQnt(int $qnt): void
    {
        $this->qnt = $qnt;
    }

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
        $this->qnt++;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function removeProduct(Product $productToRemove): void
    {
        $productName = $productToRemove->getName();

        foreach ($this->products as $key => $product) {
            if($productName == $product->getName()){
                unset($this->products[$key]);
                $this->qnt = count($this->products);
            }
        }
    }
}
