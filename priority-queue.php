<?php

class ListNode
{
    public $data = null;
    public $next = null;
    public $priority = null;

    public function __construct(string $data = null, int $priority = null)
    {
        $this->data = $data;
        $this->priority = $priority;
    }
}

class LinkedList
{
    private $_firstNode = null;
    private $_totalNodes = 0;

    public function insert(string $data = null, int $priority = null)
    {
        $newNode = new ListNode($data, $priority);

        if ($this->_firstNode === null) {
            $this->_firstNode = $newNode;
        } else {
            $previous = $this->_firstNode;
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                if ($currentNode->priority < $priority) {
                    if ($currentNode === $this->_firstNode) {
                        $previous = $this->_firstNode;
                        $this->_firstNode = $newNode;
                        $newNode->next = $previous;
                        $this->_totalNodes++;
                        return;
                    }
                    $previous->next = $newNode;
                    $newNode->next = $currentNode;
                    $this->_totalNodes++;
                    return;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
        return true;
    }

    public function display()
    {
        echo "Total Nodes " . $this->_totalNodes . "<br/>";
        $currentNode = $this->_firstNode;
        while ($currentNode !== null) {
            echo $currentNode->data . "<br/>";
            $currentNode = $currentNode->next;
        }
    }
}

interface PriorityQueue
{
    public function enqueue(string $item, int $priority); // insert
}

class AgentQueue implements PriorityQueue
{

    private $queue;

    public function __construct()
    {
        $this->queue = new LinkedList();
    }

    public function display()
    {
        return $this->queue->display();
    }

    public function enqueue(string $item, int $priority)
    {
        return $this->queue->insert($item, $priority);
    }
}

// try {
//     $agents = new AgentQueue(10);
//     $agents->enqueue("Fred", 1);
//     $agents->enqueue("John", 2);
//     $agents->enqueue("Keith", 3);
//     $agents->enqueue("Adiyan", 4);
//     $agents->enqueue("Mikhael", 5);
//     echo $agents->display();
// } catch (Exception $e) {
//     echo $e->getMessage();
// }

class MyPQ extends SplPriorityQueue
{
    public function compare($priority1, $priority2)
    {
        return $priority1 <=> $priority2;
    }
}

$agents = new MyPQ();
$agents->insert("Fred", 1);
$agents->insert("John", 2);
$agents->insert("Keith", 3);
$agents->insert("Adiyan", 4);
$agents->insert("Mikhael", 2);

$agents->setExtractFlags(MyPQ::EXTR_BOTH);

echo $agents->top()['data'];

echo "<br/><br/>";

while ($agents->valid()) {
    $current = $agents->current();
    echo $current['data'] . "<br/>";
    $agents->next();
}
