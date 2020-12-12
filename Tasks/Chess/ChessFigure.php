<?php

require_once 'Tasks/input.php';
require_once 'IMovable.php';

class ChessFigure implements IMovable
{
    public $place = [];
    public $desiredPlace = [];

    private const CHESS_BOUND_MAX = 8;
    private const CHESS_BOUND_MIN = 1;
    private const FIGURE_COORDS_SIZE = 2;

    public function __construct($param = "")
    {
        if (is_array($param) && count($param) == 4)
        {
            $this->place[] = $param[0];
            $this->place[] = $param[1];
            $this->desiredPlace[] = $param[2];
            $this->desiredPlace[] = $param[3];
        }
        else
        {
            echo "Введите координаты (По одной, разделив клавишей ENTER): ".PHP_EOL;
            $this->place[] = readFromConsole();
            $this->place[] = readFromConsole();
            $this->desiredPlace[] = readFromConsole();
            $this->desiredPlace[] = readFromConsole();
        }
    }

    protected function CheckHorizontal($x1, $x2): bool
    {
        if ($x1 === $x2)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    protected function CheckVertical($y1, $y2): bool
    {
        if ($y1 === $y2)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    protected function CheckDiagonal($x1, $y1, $x2, $y2): bool
    {
        if ($x2 - $x1 === $y2 - $y1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    protected function IsOutOfBounds($place, $desiredPlace): bool
    {
        for ($i = 0; $i < self::FIGURE_COORDS_SIZE; $i++)
        {
            if ($place[$i] > self::CHESS_BOUND_MAX || $place[$i] < self::CHESS_BOUND_MIN ||
                $desiredPlace[$i] > self::CHESS_BOUND_MAX || $desiredPlace[$i] < self::CHESS_BOUND_MIN)
            {
                return true;
            }
        }

        return false;
    }

    function IsPossibleToMove($from, $to) : bool
    {
        return true;
    }
}