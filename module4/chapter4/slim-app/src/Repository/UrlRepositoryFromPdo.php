<?php

declare(strict_types=1);

namespace ShortenUrl\Repository;

use PDO;
use Ramsey\Uuid\UuidInterface;
use ShortenUrl\Entity\Url;

class UrlRepositoryFromPdo implements UrlRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function store(Url $url): void
    {
        $stm = $this->pdo->prepare(<<<SQL
            INSERT INTO urls VALUES (:id, :name, :url, :short_url, :visits, :last_visit)
            ON DUPLICATE KEY UPDATE    
            name=:name, 
            url=:url, 
            short_url=:short_url, 
            visits_count=:visits, 
            last_visit=:last_visit
        SQL);

        $stm->bindValue(':id', $url->id()->toString());
        $stm->bindValue(':name', $url->name());
        $stm->bindValue(':url', $url->url());
        $stm->bindValue(':short_url', $url->shortUrl());
        $stm->bindValue(':visits', $url->visits());
        $stm->bindValue(':last_visit', $url->lastVisit()?->format('Y-m-d H:i:s'));

        $stm->execute();
    }

    public function findByShortUrl(string $shortUrl): Url
    {
        $stm = $this->pdo->prepare(<<<SQL
            SELECT id, name, url, short_url, visits_count, last_visit
            FROM urls
            WHERE short_url=? 
        SQL);
        $stm->execute([$shortUrl]);
        $data = $stm->fetch(PDO::FETCH_ASSOC);
        return Url::populate($data);
    }

    /** @return Url[] */
    public function all(): array
    {
        $result = $this->pdo
            ->query('SELECT id, name, url, short_url, visits_count, last_visit FROM urls')
            ->fetchAll(PDO::FETCH_ASSOC);

        $urls = [];
        foreach ($result as $urlData) {
            $urls[] = Url::populate($urlData);
        }

        return $urls;
    }

    public function find(UuidInterface $id): Url
    {
        $stm = $this->pdo->prepare(<<<SQL
            SELECT id, name, url, short_url, visits_count, last_visit 
            FROM urls
            WHERE id=?
        SQL);
        $stm->execute([$id->toString()]);
        $data = $stm->fetch(PDO::FETCH_ASSOC);
        return Url::populate($data);
    }
}
