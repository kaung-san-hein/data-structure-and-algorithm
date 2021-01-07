<?php

interface Queue
{
    public function enqueue(string $item); // insert
    public function dequeue(); // pop
    public function peek();  // similar top from stack
    public function isEmpty();
}

class CircularQueue implements Queue
{
    private $queue;
    private $limit;
    private $front = 0;
    private $rear = 0;

    public function __construct(int $limit = 5)
    {
        $this->limit = $limit;
        $this->queue = [];
    }

    public function size()
    {
        if ($this->rear > $this->front) {
            return $this->rear - $this->front;
        }
        return $this->limit - $this->rear + $this->front;
    }

    public function display()
    {
        print_r($this->queue);
        echo "<br/>";
        echo "Front :" . $this->front . "<br/>";
        echo "Rear :" . $this->rear . "<br/>";
    }

    public function isEmpty()
    {
        return $this->rear == $this->front;
    }

    public function isFull()
    {
        $diff = $this->rear - $this->front;
        if ($diff == -1 || $diff == ($this->limit - 1))
            return true;
        return false;
    }

    public function enqueue(string $item)
    {
        if ($this->isFull()) {
            throw new OverflowException("Queue is full");
        } else {
            $this->queue[$this->rear] = $item; // [4],[0],[1],[2]
            $this->rear = ($this->rear + 1) % $this->limit; // 3/5
        }
    }

    public function dequeue()
    {
        $item = "";
        if ($this->isEmpty()) {
            throw new UnderflowException('Queue is empty');
        } else {
            $item = $this->queue[$this->front];
            $this->queue[$this->front] = null;
            $this->front = ($this->front + 1) % $this->limit;
        }

        return $item;
    }

    public function peek()
    {
        return $this->queue[$this->front];
    }
}

$cq = new CircularQueue(5);
$cq->enqueue("One");
$cq->enqueue("Two");
$cq->enqueue("Three");
$cq->enqueue("Four");
$cq->dequeue();
$cq->dequeue();
$cq->dequeue();
$cq->dequeue(); // 4/4
$cq->enqueue("One");
$cq->enqueue("Two");
$cq->enqueue("Three");
$cq->enqueue("Four");

$cq->display();
