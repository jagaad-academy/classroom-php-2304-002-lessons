<?php

namespace ManageBills\Entity;

use DateTimeImmutable;

class Bill
{
    private ?int $id;
    private string $name;
    private ?string $description;
    private float $amount;
    private int $dueDate;
    private string $category;

    private bool $paid;
    private mixed $paidDate;

    public function __construct(
        string $name = '',
        ?string $description = null,
        float $amount = 0,
        int $dueDate = 0,
        string $category = 'default'
    ) {
        $this->id = null;
        $this->name = $name;
        $this->description = $description;
        $this->amount = $amount;
        $this->dueDate = $dueDate;
        $this->category = $category;
        $this->paid = false;
        $this->paidDate = null;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function isPaid(): bool
    {
        return $this->paid;
    }

    public function paidDate(): ?DateTimeImmutable
    {
        if (is_string($this->paidDate)) {
            return new DateTimeImmutable($this->paidDate);
        }
        return $this->paidDate;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function amount(): float
    {
        return $this->amount;
    }

    public function dueDate(): int
    {
        return $this->dueDate;
    }

    public function category(): string
    {
        return $this->category;
    }

    public function paid(): void
    {
        if ($this->isPaid()) {
            return;
        }
        $this->paid = true;
        $this->paidDate = new DateTimeImmutable('now');
    }
}
