<?php

function readFromConsole()
{
    echo "Введите числа, сумму которых хотите получить:\n";

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
    $result = array_sum(readFromConsole());

    echo "Результат: {$result}";
    return $result;
}