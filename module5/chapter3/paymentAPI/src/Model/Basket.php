<?php
/**
 * Basket.php
 * hennadii.shvedko
 * 06.10.2023
 */

namespace PaymentApi\Model;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity, ORM\Table(name:'basket')]
class Basket extends A_Model
{
    #[ORM\Id, ORM\Column(type: 'integer'), ORM\GeneratedValue(strategy: 'AUTO')]
    private int $id;

    #[ORM\Column(name: 'product_name', type: 'string', nullable: false)]
    private string $productName;

    #[ORM\Column(name: 'product_gtin', type: 'string', nullable: false)]
    private string $productGTIN;

    #[ORM\Column(type: 'integer', nullable: false)]
    private int $quantity;

    #[ORM\Column(name: 'customer_id', type: 'integer', nullable: false)]
    private int $customerId;

    #[ORM\Column(name: 'amount', type: 'float', nullable: false)]
    private float $amount;

    #[ORM\ManyToOne(targetEntity: Customers::class, inversedBy: "basket")]
    #[ORM\JoinColumn(name: "customer_id", referencedColumnName: "id")]
    private Customers $customer;

    public function getId(): int
    {
        return $this->id;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): void
    {
        $this->productName = $productName;
    }

    public function getProductGTIN(): string
    {
        return $this->productGTIN;
    }

    public function setProductGTIN(string $productGTIN): void
    {
        $this->productGTIN = $productGTIN;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    public function setCustomerId(int $customerId): void
    {
        $this->customerId = $customerId;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function getCustomer(): Customers
    {
        return $this->customer;
    }

    public function setCustomer(Customers $customer): void
    {
        $this->customer = $customer;
    }
}
