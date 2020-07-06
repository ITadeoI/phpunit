<?php

/**
 * Queue
 *
 * A first-in, first-out data structure
 */
class Queue
{
    public const MAX_ITEM = 5;

    /**
     * Queue items
     * @var array
     */
    protected $items = [];

    /**
     * Add an item to the end of the queue
     *
     * @param mixed $item The item
     * @throws QueueException
     */
    public function push($item)
    {
        if ($this->getCount() == self::MAX_ITEM) {

            throw new QueueException('Queue is full');
        }

        $this->items[] = $item;
    }

    /**
     * Take an item off the head of the queue
     *
     * @return mixed The item
     */
    public function pop()
    {
        return array_shift($this->items);
    }

    /**
     * Get the total number of items in the queue
     *
     * @return integer The number of items
     */
    public function getCount()
    {
        return count($this->items);
    }

    /**
     * @return array
     */
    public function clean()
    {
        return $this->items = [];
    }
}
