<?php
//CalculatorTest.php
use \PHPUnit\Framework\TestCase;
require_once (__DIR__ . '/../lib/Calculator.php');

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

	    $this->expectException(InvalidArgumentException::class);
	    $this->expectExceptionMessage("Divider cant be a zero");
	    $calculator->divide(5,0);
    }
}
