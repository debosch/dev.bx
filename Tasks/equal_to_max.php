<?php

require_once 'input.php';

$maxNumber = 0;

function findEqualsToMax($array) : int
{
    $maxNumber = max($array);
    $counter = 0;

    foreach ($array as $number)
    {
        if ($number == $maxNumber)
        {
            $counter++;
        }
    }

    echo PHP_EOL."Result: {$counter}".PHP_EOL;

    return $counter;
}
