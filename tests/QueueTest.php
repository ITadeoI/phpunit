<?php


use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue();
    }

    public function testNewQueueIsEmpty() {

        $this->assertEmpty($this->getCount());
    }

    public function testAnItemIsAddedToTheQueue() {

        $this->queue->push('Alice');

        $this->assertEquals(1, $this->queue->getCount());
    }

    public function testCleanTheQueue() {

        $this->queue->push('Alice');

        $this->assertEquals(1, $this->queue->getCount());

        $this->queue->clean();

        $this->assertEmpty($this->queue->getCount());
    }

    public function testAnItemIsRemovedFromTheQueue() {

        $this->queue->push('Alice');

        $this->assertEquals('Alice', $this->queue->pop());

        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue() {

        $this->queue->push('first');

        $this->queue->push('second');

        $this->assertEquals('first', $this->queue->pop());

        $this->assertEquals(1, $this->queue->getCount());

    }
}