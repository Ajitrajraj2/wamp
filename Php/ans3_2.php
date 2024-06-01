<?php

class NumberHelper
{
    public function findSmallest($num1, $num2, $num3)
    {
        return min($num1, $num2, $num3);
    }
}

// Usage example:
$numberHelper = new NumberHelper();
$smallestNumber = $numberHelper->findSmallest(10, 5, 8);
echo "The smallest number is: " . $smallestNumber;

?>
