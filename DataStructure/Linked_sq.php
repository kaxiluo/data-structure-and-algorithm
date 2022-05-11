<?php

class Node
{
    public $data = null;
    public $next = null;

    public function __construct($data = null)
    {
        $this->data = $data;
    }
}

/**单链表
 * Class Linear
 */
class Linked_sq
{
    protected $head;

    public function __construct()
    {
        $this->head = new Node();
    }

    public function add($index, $value)
    {
        $length = $this->getLength();
        if ($index < 0 || $index > $length) {
            return false;
        }

        $head = $this->head;
        for ($i = 0; $i < $index; $i++) {
            $head = $head->next;
        }

        $node = new Node($value);
        $node->next = $head->next;
        $head->next = $node;

        return true;
    }

    public function delete($index)
    {
        $length = $this->getLength();
        if ($index < 0 || $index >= $length) {
            return false;
        }

        $head = $this->head;
        for ($i = 0; $i < $index; $i++) {
            $head = $head->next;
        }

        $deleteNode = $head->next;
        $head->next = $head->next->next;

        unset($deleteNode);
    }

    public function getValueByIndex($index)
    {
        $length = $this->getLength();
        if ($index < 0 || $index >= $length) {
            return null;
        }

        $head = $this->head;
        for ($i = 0; $i < $index; $i++) {
            $head = $head->next;
        }

        return $head->next->data;
    }

    public function getLength()
    {
        $length = 0;
        $head = $this->head;
        while ($head->next) {
            $head = $head->next;
            $length++;
        }
        return $length;
    }

    public function truncate()
    {
        $head = $this->head;
        while ($head->next) {
            $tmp = $head->next;
            unset($head->next);
            $head = $tmp;
        }
    }

    public function printAll()
    {
        $head = $this->head;
        while ($head->next) {
            echo (string)$head->next->data . ' ';
            $head = $head->next;
        }
        echo PHP_EOL;
    }
}

$line = new Linked_sq();
$line->add(0, 5);
$line->add(1, 8);
$line->add(2, 2);
$line->add(3, 9);

$line->printAll();

$line->add(2, 222);

$line->printAll();

echo $line->getValueByIndex(3) . PHP_EOL;

$line->delete(3);

$line->printAll();
