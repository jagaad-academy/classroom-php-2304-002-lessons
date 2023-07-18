<?php

use Example;

class Logger
{
    public function log($message)
    {
        echo $message . PHP_EOL;
    }

    public function error($message)
    {
        error_log($message);
        die;
    }
}

class DataMigrator extends Logger
{
    public string $test;
    private $logger1;

    public function __construct()
    {
        $this->logger1 = new Logger();
    }

    public function migrate()
    {
        $this->logger1->log('Migrating. Please wait...');
    }

    public function showErrorMessage()
    {
        $this->logger1->error('Fatal Error!');
    }
}

$dataMigrator = new DataMigrator();
$dataMigrator->migrate();
$dataMigrator->showErrorMessage();
