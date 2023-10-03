<?php
/**
 * Customers.php
 * hennadii.shvedko
 * 03.10.2023
 */

namespace PaymentApi\Model;

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
}
