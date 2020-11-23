<?php

interface IMovable
{
    function IsPossibleToMove($from, $to) : bool;
}