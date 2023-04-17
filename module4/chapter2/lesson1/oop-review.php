<?php

// anemic object: DTO
class Product1 {
    public string $id;
    public string $name;
    public string $qty;

    public function __construct(string $id, string $name, int $qty)
    {
        $this->id = $id;
        $this->name = $name;
        $this->qty = $qty;
    }
}

$p = new Product1(uniqid('id', true), 't-shirt', 50);
$p->id = 'new-id';
$p->name = 'cap';
$p->qty = -1;

// rich domain model
class Product2 {
    private string $id;
    private string $name;
    private string $qty;

    public function __construct(string $id, string $name, int $qty)
    {
        $this->id = $id;
        $this->name = $name;
        $this->qty = $qty;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function qty(): int
    {
        return $this->qty;
    }

    public function sell(int $amount): void
    {
        $res = $this->qty - $amount;
        if ($res < 0) {
            throw new InvalidArgumentException('Quantity not available');
        }
        $this->qty = $res;
    }

    public function update(string $name, int $qty): void
    {
        $this->name = $name;

        // @todo qty validation here
        $this->qty = $qty;
    }
}

$p = new Product2(uniqid('id', true), 't-shirt', 50);
$p->update('cap', 30);

