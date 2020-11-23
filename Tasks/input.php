<?php

function readFromConsole($input = "")
{
    if (!$input)
    {

        $input = trim(fgets(STDIN));
    }

    switch ($input)
    {
        case "true":
            printResult($input);
            return true;

        case "false":
            printResult($input);
            return false;

        case "!stop":
            return null;

        case is_float($input):
            printResult($input);
            return (float)$input;

        case is_numeric($input):
            return (int)$input;

        default:
            return $input;
    }
}

function readUntilStop() : array
{
    $result = [];

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
