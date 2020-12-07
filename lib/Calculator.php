<?php
//Calculator.php

class Calculator
{
    public function add(int $a, int $b): int
    {
        return $a + $b;
    }

    public function subtract(int $a, int $b): int
    {
        return $a - $b;
    }

    public function multiply(int $a, int $b): int
    {
        return $a * $b;
    }

    public function divide(int $a, int $b): float
    {
        if ($b === 0)
        {
            throw new InvalidArgumentException('Divider cant be a zero');
        }

        return $a / $b;
    }

    public function pow(int $base, int $exp): float
    {
        return $base**$exp;
    }

    public function sqrt(int $arg): float
    {
        if ($arg < 0)
        {
            throw new InvalidArgumentException("Argument can't be a negative number");
        }

        return sqrt($arg);
    }
}
