<?php

function assertEquals($expectedResult, $result, $message) : bool
{
    echo PHP_EOL;

    if ((int)$expectedResult == (int)$result)
    {
        echo "Test: {$message} - passed" . PHP_EOL;
        return true;
    }
    else
    {
        echo "Test: {$message} - failed" . PHP_EOL;
        return false;
    }
}
