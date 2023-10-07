<?php
/**
 * Customers.php
 * hennadii.shvedko
 * 03.10.2023
 */

namespace PaymentApi\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity, ORM\Table(name: 'customers')]
class Customers extends A_Model
{
    #[ORM\Id, ORM\Column(type: 'integer'), ORM\GeneratedValue(strategy: 'AUTO')]
    private int $id;

    #[ORM\Column(type: 'string', nullable: false)]
    private string $name;

    #[ORM\Column(type: 'string', nullable: false)]
    private string $address;

    #[ORM\Column(name: 'is_active', type: 'boolean', nullable: false)]
    private bool $isActive;
    #[ORM\OneToMany(mappedBy: "customer", targetEntity: Payments::class)]
    private Collection $payments;
    #[ORM\OneToMany(mappedBy: "basket", targetEntity: Basket::class)]
    private Collection $basket;

    public function __construct()
    {
        $this->payments = new ArrayCollection();
        $this->basket = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }

    public function getPayments(): ArrayCollection
    {
        return $this->payments;
    }

    public function setPayments(ArrayCollection $payments): void
    {
        $this->payments = $payments;
    }

    public function getBasket(): ArrayCollection
    {
        return $this->basket;
    }

    public function setBasket(ArrayCollection $basket): void
    {
        $this->basket = $basket;
    }
}
