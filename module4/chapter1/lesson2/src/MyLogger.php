<?php

declare(strict_types=1);

namespace QualityToolsExample;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

final class MyLogger implements LoggerInterface
{
    public function emergency(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::EMERGENCY, $message);
    }

    public function alert(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::ALERT, $message);
    }

    public function critical(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::CRITICAL, $message);
    }

    public function error(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::ERROR, $message);
    }

    public function warning(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::WARNING, $message);
    }

    public function notice(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::NOTICE, $message);
    }

    public function info(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::INFO, $message);
    }

    public function debug(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::DEBUG, $message);
    }

    public function log($level, \Stringable|string $message, array $context = []): void
    {
        $now = (new \DateTimeImmutable())->format('Y-m-d H:i:s');
        $logMessage = $now . ': ' . $message;
        file_put_contents(__DIR__ . '/../log/all.log', $logMessage, FILE_APPEND);
    }
}
