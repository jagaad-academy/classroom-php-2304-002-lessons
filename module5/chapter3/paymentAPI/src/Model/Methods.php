<?php
/**
 * Methods.php
 * hennadii.shvedko
 * 26.09.2023
 */

namespace PaymentApi\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity, ORM\Table(name: 'methods')]
class Methods extends A_Model
{
    #[ORM\Id, ORM\Column(type: 'integer'), ORM\GeneratedValue(strategy: 'AUTO')]
    private int $id;

    #[ORM\Column(type: 'string', unique: true, nullable: false)]
    private string $name;

    #[ORM\Column(name: 'is_active', type: 'boolean', nullable: false)]
    private bool $isActive;

    #[ORM\OneToMany(mappedBy: "method", targetEntity: Payments::class)]
    private Collection $method;

    public function __construct()
    {
        $this->method = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }

    public function getMethod(): ArrayCollection
    {
        return $this->method;
    }

    public function setMethod(ArrayCollection $method): void
    {
        $this->method = $method;
    }
}
