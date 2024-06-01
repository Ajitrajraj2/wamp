<?php

class NumberProcessor
{
    private $numbers;

    public function __construct($numbers)
    {
        $this->numbers = $numbers;
    }

    public function findSmallestNumber()
    {
        $smallest = $this->numbers[0];

        foreach ($this->numbers as $number) {
            if ($number < $smallest) {
                $smallest = $number;
            }
        }

        return $smallest;
    }
}

// Usage example:
$numbers = [10, 5, 8];
$processor = new NumberProcessor($numbers);
$smallestNumber = $processor->findSmallestNumber();

echo "The smallest number among " . implode(', ', $numbers) . " is: " . $smallestNumber;
