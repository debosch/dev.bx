<?php

function readFromConsole()
{
    $input = explode(" ", trim(fgets(STDIN)));
    $result_input = [];

    foreach($input as $value)
    {
        $result_input[] = (int)$value;
    }

    return $result_input;
}

function getSumOfElements()
{
    return array_sum(readFromConsole());
}