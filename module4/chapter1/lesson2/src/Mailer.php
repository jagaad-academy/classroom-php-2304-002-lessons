<?php

declare(strict_types=1);

namespace QualityToolsExample;

use Psr\Log\LoggerInterface;

final class Mailer
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function send(string $to): void
    {
        $this->logger->info('the email was sent to: ' . $to);

        // log that the email was sent
        echo 'Email sent to: ' . $to;
    }
}
