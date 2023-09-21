<?php
/**
 * Books.php
 * hennadii.shvedko
 * 18.09.2023
 */

namespace APIDocker\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity, ORM\Table(name: 'books')]
final class Books
{
    #[ORM\Id, ORM\Column(type: 'integer'), ORM\GeneratedValue(strategy: 'AUTO')]
    private int $id;

    #[ORM\Column(type: 'string', nullable: false)]
    private string $name;

    #[ORM\Column(type: 'string', nullable: false)]
    private string $author;

    #[ORM\Column(name: 'issue_year', type: 'integer', nullable: false)]
    private int $issueYear;

    public function __construct(string $name, string $author, int $issueYear)
    {
        $this->name = $name;
        $this->author = $author;
        $this->issueYear = $issueYear;
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

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getIssueYear(): int
    {
        return $this->issueYear;
    }

    public function setIssueYear(int $issueYear): void
    {
        $this->issueYear = $issueYear;
    }
}
