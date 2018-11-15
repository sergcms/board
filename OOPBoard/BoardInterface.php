<?php

namespace OOPBoard;

interface BoardInterface 
{
    public function showBoard();
    public function setPosition(Figure $figure, $position);
    public function move($from, $to, Figure $figure);
}
