<?php

class ListNode
{
    public $data = null;
    public $next = null;
    public $prev = null;

    public function __construct(string $data = null)
    {
        $this->data = $data;
    }
}

class DoublyLinkedList
{
    private $_firstNode = null;
    private $_lastNode = null;
    private $_totalNode = 0;

    public function insertAtFirst(string $data = null)
    {
        $newNode = new ListNode($data);
        if ($this->_firstNode === null) {
            $this->_firstNode = $newNode;
            $this->_lastNode = $newNode;
        } else {
            $currentFirstNode = $this->_firstNode;
            $this->_firstNode = $newNode;
            $newNode->next = $currentFirstNode;
            $currentFirstNode->prev = $newNode;
        }
        $this->_totalNode++;
        return true;
    }

    public function insertAtLast(string $data = null)
    {
        $newNode = new ListNode($data);
        if ($this->_firstNode === null) {
            $this->_firstNode = $newNode;
            $this->_lastNode = $newNode;
        } else {
            $currentLastNode = $this->_lastNode;
            $currentLastNode->next = $newNode;
            $newNode->prev = $currentLastNode;
            $this->_lastNode = $newNode;
        }
        $this->_totalNode++;
        return true;
    }

    public function insertBefore(string $data = null, string $query = null)
    {
        $newNode = new ListNode($data);
        if ($this->_firstNode !== null) {
            $previous = null;
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $query) {
                    $newNode->next = $currentNode;
                    $currentNode->prev = $newNode;
                    if ($previous !== null) {
                        $previous->next = $newNode;
                    } else {
                        $currentNode = $newNode;
                    }
                    $this->_totalNodes++;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    public function insertAfter(string $data = null, string $query = null)
    {
        $newNode = new ListNode($data);
        if ($this->_firstNode !== null) {
            $nextNode = null;
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                $nextNode = $currentNode->next;
                if ($currentNode->data === $query) {
                    if ($nextNode !== null) {
                        $newNode->next = $nextNode;
                    }
                    if ($currentNode === $this->_lastNode) {
                        $this->_lastNode = $newNode;
                    }
                    $currentNode->next = $newNode;
                    $nextNode->prev = $newNode;
                    $newNode->prev = $currentNode;
                    $this->_totalNode++;
                    break;
                }
                $currentNode = $currentNode->next;
            }
        }
    }

    public function deleteFirst()
    {
        if ($this->_firstNode !== null) {
            if ($this->_firstNode->next !== null) {
                $this->_firstNode = $this->_firstNode->next;
                $this->_firstNode->prev = null;
            } else {
                $this->_firstNode = null;
            }
            $this->_totalNode--;
            return true;
        }
        return false;
    }

    public function deleteLast()
    {
        if ($this->_lastNode !== null) {
            $currentNode = $this->_lastNode;
            if ($currentNode->prev === null) {
                $this->_firstNode = null;
                $this->_lastNode = null;
            } else {
                $previousNode = $currentNode->prev;
                $this->_lastNode = $previousNode;
                $previousNode->next = null;
            }
            $this->_totalNode--;
            return true;
        }
        return false;
    }

    public function delete(string $query = null)
    {
        if ($this->_firstNode) {
            $previous = null;
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $query) {
                    if ($currentNode->next === null) {
                        if ($previous) {
                            $previous->next = null;
                        } else {
                            $this->_firstNode = null;
                            $this->_lastNode = null;
                        }
                    } else {
                        if ($previous) {
                            $previous->next = $currentNode->next;
                            $currentNode->next->prev = $previous;
                        } else {
                            $this->_firstNode = $currentNode->next;
                        }
                    }
                    $this->_totalNode--;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    public function displayForward()
    {
        echo "Total Node: " . $this->_totalNode . "<br/>";
        $currentNode = $this->_firstNode;
        while ($currentNode !== null) {
            echo $currentNode->data . "<br/>";
            $currentNode = $currentNode->next;
        }
    }

    public function displayBackward()
    {
        echo "Total Node: " . $this->_totalNode . "<br/>";
        $currentNode = $this->_lastNode;
        while ($currentNode !== null) {
            echo $currentNode->data . "<br/>";
            $currentNode = $currentNode->prev;
        }
    }
}

$BookTitles =
    new SplDoublyLinkedList();
$BookTitles->push("Introduction to Algorithm");
$BookTitles->push("Introduction to PHP and Data structures");
$BookTitles->push("Programming Intelligence");
$BookTitles->push("Mediawiki Administrative tutorial guide");
$BookTitles->add(1, "Introduction to Calculus");
$BookTitles->add(3, "Introduction to Graph Theory");
for ($BookTitles->rewind(); $BookTitles->valid(); $BookTitles->next()) {
    echo $BookTitles->current() . "<br/>";
}
