<?php

class Queen extends ChessFigure
{
    public function IsPossibleToMove($from, $to): bool
    {
        $vertical = $this->CheckVertical($from[1], $to[1]);
        $horizontal = $this->CheckVertical($from[0], $to[0]);
        $diagonal = $this->CheckDiagonal($from[0], $from[1], $to[0], $to[1]);

        if ($vertical || $horizontal || $diagonal)
        {
            echo "ДА";
            return true;
        }

        echo "НЕТ";
        return false;
    }
}