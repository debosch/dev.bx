<?php
//CalculatorTest.php
use \PHPUnit\Framework\TestCase;

require_once(__DIR__.'/../lib/Calculator.php');

class CalculatorTest extends TestCase
{
    public function testAdd(): void
    {
        $calculator = new Calculator();
        self::assertEquals(4, $calculator->add(2, 2));
    }

    public function testDivide(): void
    {
        $calculator = new Calculator();

        self::assertEquals(4, $calculator->divide(8, 2));
        self::assertEquals(-4, $calculator->divide(-8, 2));
        self::assertEquals(0, $calculator->divide(0, 2534534));

        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage("Divider cant be a zero");
        $calculator->divide(5, 0);
    }

    public function testSubtract(): void
    {
        $calculator = new Calculator();

        self::assertEquals(0, $calculator->subtract(2, 2));
        self::assertEquals(4, $calculator->subtract(2, -2));
        self::assertEquals(2333, $calculator->subtract(3333, 1000));
    }

    public function testMultiply(): void
    {
        $calculator = new Calculator();

        self::assertEquals(0, $calculator->multiply(123237, 0));
        self::assertEquals(4, $calculator->multiply(2, 2));
    }

    public function testPow(): void
    {
        $calculator = new Calculator();

        self::assertEquals(1, $calculator->pow(5463437, 0));
        self::assertEquals(0.25, $calculator->pow(2, -2));
        self::assertEquals(27, $calculator->pow(3, 3));
        self::assertEquals(1, $calculator->pow(1, 33));
        self::assertEquals(4, $calculator->pow(-2, 2));
        self::assertEquals(-8, $calculator->pow(-2, 3));
        self::assertEquals(0, $calculator->pow(0, 3));
    }

    public function testSqrt(): void
    {
        $calculator = new Calculator();

        self::assertEquals(0, $calculator->sqrt(0));
        self::assertEquals(1, $calculator->sqrt(1));
        self::assertEquals(4, $calculator->sqrt(16));
        self::assertEquals(10, $calculator->sqrt(100));

        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage("Argument can't be a negative number");
        $calculator->sqrt(-1);
    }
}
