<?php

require_once 'input.php';

$maxNumber = 0;

function findEqualsToMax($array) : int
{
    if (count($array) < 1)
    {
        return 0;
    }

    $maxNumber = max($array);
    $counter = 0;

    foreach ($array as $number)
    {
        if ($number == $maxNumber)
        {
            $counter++;
        }
    }

    return $counter;
}
