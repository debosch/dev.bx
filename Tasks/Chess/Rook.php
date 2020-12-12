<?php

class Rook extends ChessFigure
{
    public function IsPossibleToMove($from, $to): bool
    {
        if ($this->IsOutOfBounds($from, $to))
        {
            echo "НЕТ";
            return false;
        }

        if ($from === $to)
        {
            echo "НЕТ";
            return false;
        }

        $vertical = $this->CheckVertical($from[1], $to[1]);
        $horizontal = $this->CheckHorizontal($from[0], $to[0]);

        if ($vertical || $horizontal)
        {
            echo "ДА";
            return true;
        }

        echo "НЕТ";
        return false;
    }
}
