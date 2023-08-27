<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->queue = new \PHPUnitLesson\Queue();
    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testAnItemIsAddedToQueue()
    {
        $this->queue->push('testItem');

        $this->assertEquals(1, $this->queue->getCount());
    }

    public function testAnItemIsRemovedFromQueue()
    {
        $this->queue->push('testItem');

        $item = $this->queue->pop();

        $this->assertEquals(0, $this->queue->getCount());

        $this->assertEquals('testItem', $item);
    }
}
