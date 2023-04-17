<?php

declare(strict_types=1);

namespace RestApi\School;

use OpenApi\Annotations as OA;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @OA\Schema(schema="Student", required={"name"})
 */
final class Student
{
    private UuidInterface $id;

    public function __construct(
        /** @OA\Property(example="Lucas") */
        private string $name,
        /** @OA\Property(example="de Oliveira") */
        private string $lastName,
        /** @OA\Property(example="Brazil") */
        private string $country,
    ) {
        $this->id = Uuid::uuid4();
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function lastName(): string
    {
        return $this->lastName;
    }

    public function country(): string
    {
        return $this->country;
    }
}
