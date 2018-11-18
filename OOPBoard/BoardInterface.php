<?php

namespace OOPBoard;

interface BoardInterface 
{
    public function setPosition(Figure $figure, $position): void;
    public function checkPosition($position): bool;
    public function checkValue($axes, $value);
    public function move(Figure $figure, $toPosition);
    public function showBoard(): void;
}
