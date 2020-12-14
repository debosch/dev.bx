<?php

use \PHPUnit\Framework\TestCase;

require_once(__DIR__.'/../lib/DecoratorTask.php');

class DecoratorTaskTest extends TestCase
{
    public function testConsoleDrawer()
    {
        $consoleDrawer = new ConsoleDrawer();
        $consoleDrawer->draw();
        self::expectOutputString("");
    }

    public function testDrawerDecorator()
    {
        $drawer = new ConsoleDrawer();
        $drawerDecorator = new DrawerDecorator($drawer);
        $drawerDecorator->draw();
        self::expectOutputString("");
    }

    public function testCircleDrawer()
    {
        $drawer = new ConsoleDrawer();
        $circleDrawer = new CircleDrawer($drawer);
        $circleDrawer->draw();
        self::expectOutputString("shape Circle\n");
    }

    public function testSquareDrawer()
    {
        $drawer = new ConsoleDrawer();
        $squareDrawer = new SquareDrawer($drawer);
        $squareDrawer->draw();
        self::expectOutputString("shape Square\n");
    }

    public function testDrawerUser()
    {
        $drawer = new ConsoleDrawer();
        $drawerUser = new DrawerUser($drawer);
        $drawerUser->draw("blue");
        self::expectOutputString("blue colored ");
    }
}
