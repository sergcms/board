<?php

namespace OOPBoard;

interface FigureInterface 
{
    public function setFigure($figure, $isBlack): void;
    public function getFigure(): array;
}
