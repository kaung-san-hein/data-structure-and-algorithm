<?php

require_once 'linked-list.php';

interface Stack
{
    public function push(string $item);
    public function pop();
    public function top();
    public function isEmpty();
}

class Books implements Stack
{

    private $limit;
    private $stack;

    public function __construct(int $limit = 20)
    {
        $this->limit = $limit;
        $this->stack = [];
    }

    public function push(string $item)
    {
        if (count($this->stack) < $this->limit) {
            array_push($this->stack, $item);
        } else {
            throw new OverflowException("Stack is full");
        }
    }

    public function pop(): string
    {
        if ($this->isEmpty()) {
            throw new UnderflowException("Stack is empty");
        } else {
            return array_pop($this->stack);
        }
    }

    public function top(): string
    {
        return end($this->stack);
    }

    public function isEmpty(): bool
    {
        return empty($this->stack);
    }
}

// try {
//     $programmingBooks = new Books(10);
//     $programmingBooks->push("Introduction to PHP7");
//     $programmingBooks->push("Mastering JavaScript");
//     $programmingBooks->push("MySQL Workbench tutorial");
//     echo $programmingBooks->pop() . "<br/>";
//     echo $programmingBooks->top() . "<br/>";
// } catch (Exception $e) {
//     echo $e->getMessage();
// }

class BookList implements Stack
{
    private $stack;
    public function __construct()
    {
        $this->stack = new LinkedList();
    }
    public function pop(): string
    {
        if ($this->isEmpty()) {
            throw new UnderflowException('Stack is empty');
        } else {
            $lastItem = $this->top();
            $this->stack->deleteLast();
            return $lastItem;
        }
    }
    public function push(string $newItem)
    {
        $this->stack->insert($newItem);
    }
    public function top(): string
    {
        return $this->stack->getNthNode($this->stack->getSize())->data;
    }
    public function isEmpty(): bool
    {
        return $this->stack->getSize() == 0;
    }
}

try {
    $programmingBooks = new BookList();
    $programmingBooks->push("Introduction to PHP7");
    $programmingBooks->push("Mastering JavaScript");
    $programmingBooks->push("MySQL Workbench tutorial");
    echo $programmingBooks->pop() . "<br/>";
    echo $programmingBooks->pop() . "<br/>";
    echo $programmingBooks->top() . "<br/>";
} catch (Exception $e) {
    echo $e->getMessage();
}

echo "<br/><br/><br/>";

$books = new SplStack();
$books->push("Introduction to PHP7");
$books->push("Mastering JavaScript");
$books->push("MySQL Workbench tutorial");

echo $books->pop() . "<br/>";
echo $books->top() . "<br/>";
