<?php

function readFromConsole($input = "") : string
{
    if (!$input)
    {
        $input = trim(fgets(STDIN));
    }

    return $input;
}

function readUntilStop() : array
{
    $result = [];

    echo "Чтобы прекратить вводить числа, напишите \"stop\"".PHP_EOL;
    echo "Введите входные данные:".PHP_EOL;

    while (($input = readFromConsole()) != "stop")
    {
        $result[] = $input;
    }

    return $result;
}

function printResult($result)
{
    echo "Результат: {$result}";
}
