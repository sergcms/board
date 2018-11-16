<?php

namespace OOPBoard;

interface BoardInterface 
{
    public function showBoard(): void;
    public function setPosition(Figure $figure, $position);
    public function checkPosition($axis, $value);
    public function move($from, $to, Figure $figure);
}
