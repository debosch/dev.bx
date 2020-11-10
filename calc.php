<?php

require_once 'input.php';

function calculate($a, $b, $action)
{
    if (!in_array($action, ['+', '-', '*', '/']))
    {
        return false;
    }

    switch ($action)
    {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
        case '/':
            if ($b == 0)
            {
                return false;
            }
            return $a / $b;
        default:
            return null;
    }
}

/*
 * @test 1 sdfld 2 = false
 * @test 1 + 2 = 4
 * @test 2 * 2 = 4
 * @test 4 - 4 = 0
 * @test 1 / 2 = 0.5
 * @test 2 / 0 = false
*/

function calculateTest()
{
    $result = calculate(1,2, '+');
    echo "Результат 1 + 2: {$result}" . ($result === 3 ? " passed" : " failed") . PHP_EOL;

    $result = calculate(2,2, '*');
    echo "Результат 2 * 2: {$result}" . ($result === 4 ? " passed" : " failed") . PHP_EOL;

    $result = calculate(4,4, '-');
    echo "Результат 4 - 4: {$result}" . ($result === 0 ? " passed" : " failed") . PHP_EOL;

    $result = calculate(1,2, '+');
    echo "Результат 1 + 2: {$result}" . ($result === 3 ? " passed" : " failed") . PHP_EOL;

    $result = calculate(1,2, 'aadfsdf');
    echo "Результат 1 asddf 2: {$result}" . ($result === false ? " passed" : " failed") . PHP_EOL;

    $result = calculate(1,0, '/');
    echo "Результат 1 / 0: {$result}" . ($result === false ? " passed" : " failed") . PHP_EOL;
}

calculateTest();