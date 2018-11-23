<?php

namespace OOPBoard;

interface BoardInterface 
{
    public function setPosition(Figure $figure, $position): void;
    public function checkPosition($position): bool;
    public function moveFigure(Figure $figure, $toPosition): void;
    public function showBoard(): void;
}
