<?php

require_once 'input.php';

$maxNumber = 0;

function findEqualsToMax($input = "") : int
{
    if (!$input)
    {
        $input = readUntilStop();
    }

    if (count($input) < 1)
    {
        return 0;
    }

    $maxNumber = max($input);
    $counter = 0;

    foreach ($input as $number)
    {
        if ($number == $maxNumber)
        {
            $counter++;
        }
    }

    return $counter;
}

findEqualsToMax();