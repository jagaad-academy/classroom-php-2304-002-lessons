<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank, Assert\Email]
    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[Assert\Length(min: 20)]
    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[Assert\Length(min: 50)]
    #[ORM\Column(type: 'text')]
    private ?string $description = null;

    #[Assert\NotBlank]
    #[ORM\Column]
    private ?\DateTime $proposedMeetingDate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getProposedMeetingDate(): ?\DateTime
    {
        return $this->proposedMeetingDate;
    }

    public function setProposedMeetingDate(\DateTime $proposedMeetingDate): self
    {
        $this->proposedMeetingDate = $proposedMeetingDate;

        return $this;
    }
}
