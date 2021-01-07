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

class LinkedList implements Iterator
{
    private $_firstNode = null;
    private $_totalNodes = 0;

    private $_currentNode = null;
    private $_currentPosition = 0;

    public function current()
    {
        return $this->_currentNode->data;
    }
    public function next()
    {
        $this->_currentPosition++;
        $this->_currentNode = $this->_currentNode->next;
    }
    public function key()
    {
        return $this->_currentPosition;
    }
    public function rewind()
    {
        $this->_currentPosition = 0;
        $this->_currentNode = $this->_firstNode;
    }
    public function valid()
    {
        return $this->_currentNode !== NULL;
    }

    public function insert(string $data = null)
    {
        $newNode = new ListNode($data);

        if ($this->_firstNode === null) {
            $this->_firstNode = $newNode;
        } else {
            $currentNode = $this->_firstNode;
            while ($currentNode->next !== null) {
                $currentNode = $currentNode->next;
            }
            $currentNode->next = $newNode;
        }
        $this->_totalNodes++;
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

    public function insertAtFirst(string $data = null)
    {
        $newNode = new ListNode($data);

        if ($this->_firstNode === null) {
            $this->_firstNode = $newNode;
        } else {
            $currentNode = $this->_firstNode;
            $this->_firstNode = $newNode;
            $newNode->next = $currentNode;
        }
        $this->_totalNodes++;
        return true;
    }

    public function search(string $data = null)
    {
        if ($this->_totalNodes) {
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $data) {
                    return $currentNode;
                }
                $currentNode = $currentNode->next;
            }
        }
        return false;
    }

    public function insertBefore(string $data = null, string $query = null)
    {
        $newNode = new ListNode($data);
        if ($this->_firstNode) {
            $previous = null;
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $query) {
                    $newNode->next = $currentNode;
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
        if ($this->_firstNode) {
            $nextNode = null;
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                $nextNode = $currentNode->next;
                if ($currentNode->data === $query) {
                    $currentNode->next = $newNode;
                    if ($nextNode !== null) {
                        $newNode->next = $nextNode;
                    }
                    $this->_totalNodes++;
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
            } else {
                $this->_firstNode = null;
            }
            $this->_totalNodes--;
            return true;
        }
        return false;
    }

    public function deleteLast()
    {
        if ($this->_firstNode !== null) {
            $currentNode = $this->_firstNode;
            if ($currentNode->next === null) {
                $this->_firstNode = null;
            } else {
                $previous = null;
                while ($currentNode->next !== null) {
                    $previous = $currentNode;
                    $currentNode = $currentNode->next;
                }
                $previous->next = null;
                $this->_totalNodes--;
                return true;
            }
        }
        return false;
    }

    public function delete(string $query = null)
    {
        if ($this->_firstNode !== null) {
            $previous = null;
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $query) {
                    if ($currentNode->next === null) {
                        if ($previous !== null) {
                            $previous->next = null;
                        } else {
                            $this->_firstNode = null;
                        }
                    } else {
                        if ($previous !== null) {
                            $previous->next = $currentNode->next;
                        } else {
                            $this->_firstNode = $currentNode->next;
                        }
                    }
                    $this->_totalNodes--;
                    return true;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
        return false;
    }

    public function reverse()
    {
        if ($this->_firstNode !== null) {
            if ($this->_firstNode->next !== null) {
                $reverseList = null;
                $next = null;
                $currentNode = $this->_firstNode;
                while ($currentNode !== null) {
                    $next = $currentNode->next;  // web design // null
                    $currentNode->next = $reverseList; // web development
                    $reverseList = $currentNode; // web design
                    $currentNode = $next; // null
                }
                $this->_firstNode = $reverseList;
            }
        }
    }

    public function getNthNode(int $n = 0)
    {
        $count = 1;
        if ($this->_firstNode !== null) {
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                if ($count === $n) {
                    return $currentNode;
                }
                $count++;
                $currentNode = $currentNode->next;
            }
        }
    }

    public function getSize()
    {
        return $this->_totalNodes;
    }
}

// $bookTitles = new LinkedList();
// $bookTitles->insert("Web Development"); // current
// $bookTitles->insert("Web Design");
// $bookTitles->insert("App Development");
// $bookTitles->insert("Desktop Development");
// $bookTitles->insertBefore("Before Design", "Web Design");
// $bookTitles->insertAfter("After Web Development", "Web Development");
// $bookTitles->display();

// echo "<br/><br/><br/>";

// foreach ($bookTitles as $title) {
//     echo $title . "<br/>";
// }

// echo "<br/><br/><br/>";

// for (
//     $bookTitles->rewind();
//     $bookTitles->valid();
//     $bookTitles->next()
// ) {
//     echo $bookTitles->current() . "<br/>";
// }
