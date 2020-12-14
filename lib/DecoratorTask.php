<?php

interface IDrawer
{
    public function draw(): void;
}

class ConsoleDrawer implements IDrawer
{
    public function draw(): void
    {
        echo "";
    }
}

class DrawerDecorator implements IDrawer
{
    protected $drawer;

    public function __construct(IDrawer $drawer)
    {
        $this->drawer = $drawer;
    }

    public function draw(): void
    {
       echo "";
    }
}

class CircleDrawer extends DrawerDecorator
{
    public function draw(): void
    {
        parent::draw();
        $this->drawCircle();
    }

    protected function drawCircle(): void
    {
        echo "shape Circle\n";
    }
}

class SquareDrawer extends DrawerDecorator
{
    public function draw(): void
    {
        parent::draw();
        $this->drawSquare();
    }

    protected function drawSquare(): void
    {
        echo "shape Square\n";
    }
}

class DrawerUser
{
    protected $drawer;

    public function __construct(IDrawer $drawer)
    {
        $this->drawer = $drawer;
    }

    public function draw($color): void
    {
        echo $color." colored ";
        $this->drawer->draw();
    }
}

$drawer = new ConsoleDrawer();
$drawer = new SquareDrawer($drawer);

$redShape = new DrawerUser($drawer);
$redShape->draw("Red");

/*
	Необходимо воспользоваться шаблоном проектирования "Декоратор" для того, чтобы иметь возможность
	"получать" в итоге фигуры разных цветов, например вызов декоратора:
	$redShape->draw();
	должен вывести:
	"Red colored Shape Square" либо "Red colored Shape Circle"
	в зависимости от того, какую фигуру мы оборачиваем декоратором.
 */

