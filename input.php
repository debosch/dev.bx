<?php

function readFromConsole($input = "")
{
    if (!$input)
    {
        echo "Введите входные данные:".PHP_EOL;
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
            printResult("null");
            return null;

        case is_float($input):
            printResult($input);
            return (float)$input;

        case is_numeric($input):
            printResult($input);
            return (int)$input;

        default:
            printResult($input);
            return $input;
    }
}

function printResult($result)
{
    echo "Результат: {$result}";
}
