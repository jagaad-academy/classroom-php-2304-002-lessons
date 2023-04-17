<?php

declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    #[Assert\NotBlank, Assert\Email]
    private string $email;

    #[Assert\Length(min: 5, max: 100, minMessage: 'invalid min length')]
    private string $title;

    private string $description;
    private ?\DateTime $proposedMeetingDate;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getProposedMeetingDate(): ?\DateTime
    {
        return $this->proposedMeetingDate;
    }

    public function setProposedMeetingDate(?\DateTime $proposedMeetingDate): void
    {
        $this->proposedMeetingDate = $proposedMeetingDate;
    }
}