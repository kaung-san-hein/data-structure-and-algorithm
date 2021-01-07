<?php

require_once 'linked-list.php';
class DeQueue
{
    private $limit;
    private $queue;

    public function __construct(int $limit = 20)
    {
        $this->limit = $limit;
        $this->queue = new LinkedList();
    }

    public function dequeueFromFront(): string
    {
        if ($this->isEmpty()) {
            throw new UnderflowException('Queue is empty');
        } else {
            $lastItem = $this->peekFront();
            $this->queue->deleteFirst();
            return $lastItem;
        }
    }
    public function dequeueFromBack(): string
    {
        if ($this->isEmpty()) {
            throw new UnderflowException('Queue is empty');
        } else {
            $lastItem = $this->peekBack();
            $this->queue->deleteLast();
            return $lastItem;
        }
    }

    public function enqueueAtBack(string $newItem)
    {
        if ($this->queue->getSize() < $this->limit) {
            $this->queue->insert($newItem);
        } else {
            throw new OverflowException('Queue is full');
        }
    }
    public function enqueueAtFront(string $newItem)
    {
        if ($this->queue->getSize() < $this->limit) {
            $this->queue->insertAtFirst($newItem);
        } else {
            throw new OverflowException('Queue is full');
        }
    }

    public function peekFront(): string
    {
        return $this->queue->getNthNode(1)->data;
    }
    public function peekBack(): string
    {
        return $this->queue->getNthNode($this->queue->getSize())->data;
    }

    public function isEmpty(): bool
    {
        return $this->queue->getSize() == 0;
    }
}

try {
    $agents = new DeQueue(10);
    $agents->enqueueAtFront("Fred");  // 3
    $agents->enqueueAtFront("John"); // 2
    $agents->enqueueAtBack("Keith"); // 4
    $agents->enqueueAtBack("Adiyan"); // 5
    $agents->enqueueAtFront("Mikhael"); // 1
    echo $agents->dequeueFromBack() . "<br/>";
    echo $agents->dequeueFromFront() . "<br/>";
    echo $agents->peekFront() . "<br/>";
} catch (Exception $e) {
    echo $e->getMessage();
}
