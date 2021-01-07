<?php

class ListNode
{
    public $data = null;
    public $next = null;

    public function __construct(string $data = null)
    {
        $this->data = $data;
    }
}

class CircularLinkedList
{
    private $_firstNode = null;
    private $_totalNode = 0;

    public function insertAtEnd(string $data = null)
    {
        $newNode = new ListNode($data);
        if ($this->_firstNode === null) {
            $this->_firstNode = $newNode;
        } else {
            $currentNode = $this->_firstNode;
            while ($currentNode->next !== $this->_firstNode) {
                $currentNode = $currentNode->next;
            }
            $currentNode->next = $newNode;
        }
        $newNode->next = $this->_firstNode;
        $this->_firstNode++;
        return true;
    }

    public function display()
    {
        echo "Total : " . $this->_totalNode . "<br/>";
        $currentNode = $this->_firstNode;
        while ($currentNode->next !== $this->_firstNode) {
            echo $currentNode->data . "<br/>";
            $currentNode = $currentNode->next;
        }
        if ($currentNode) {
            echo $currentNode->data . "<br/>";
        }
    }
}
