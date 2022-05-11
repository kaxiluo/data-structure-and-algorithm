<?php

/**顺序存储的线性表
 * Class Linear
 */
class Linear
{
    protected $items = [];

    public function add($index, $value)
    {
        $length = $this->getLength();
        if ($index < 0 || $index > $length) {
            return false;
        }

        //index后面的元素向后移动一位
        for ($i = $length; $i > $index; $i--) {
            $this->items[$i] = $this->items[$i - 1];
        }

        $this->items[$index] = $value;
        return true;
    }

    public function edit($index, $value)
    {
        $length = $this->getLength();
        if ($index < 0 || $index >= $length) {
            return false;
        }
        $this->items[$index] = $value;
    }

    public function delete($index)
    {
        $length = $this->getLength();
        if ($index < 0 || $index >= $length) {
            return false;
        }

        //index之后的元素前移一位
        for ($i = $index; $i < $length - 1; $i++) {
            $this->items[$i] = $this->items[$i + 1];
        }

        unset($this->items[$length - 1]);
    }

    public function getValueByIndex($index)
    {
        $length = $this->getLength();
        if ($index < 0 || $index >= $length) {
            return null;
        }

        return $this->items[$index];

    }

    public function getIndexByValue($value)
    {
        $length = $this->getLength();
        $index = null;
        for ($i = 0; $i < $length; $i++) {
            if ($this->items[$i] == $value) {
                $index = $i;
            }
        }
        return $index;
    }

    public function getLength()
    {
        return count($this->items);
    }

    public function truncate()
    {
        $this->items = [];
    }

    public function printAll()
    {
        $length = $this->getLength();
        for ($i = 0; $i < $length; $i++) {
            echo $this->items[$i] . ' ';
        }
        echo PHP_EOL;
    }
}

$line = new Linear();
$line->add(0, 5);
$line->add(1, 8);
$line->add(2, 2);
$line->add(3, 9);
$line->add(4, 3);

$line->printAll();

$line->edit(3, 99);
$line->printAll();

$line->add(2, 222);

$line->printAll();

echo $line->getValueByIndex(3) . PHP_EOL;

echo $line->getIndexByValue(5) . PHP_EOL;

$line->delete(3);

$line->printAll();
