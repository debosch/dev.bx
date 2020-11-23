<?php

class Rook extends ChessFigure
{
    public function IsPossibleToMove($from, $to): bool
    {
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
