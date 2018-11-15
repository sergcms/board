<?php

namespace OOPBoard;

class Figure implements FigureInterface 
{
    const FIGURE_PAWN   = 1;  // пешка
	const FIGURE_BISHOP = 2;  // слон
	const FIGURE_KNIGHT = 3;  // конь
	const FIGURE_CASTLE = 4;  // ладья
	const FIGURE_QUEEN  = 5;  // ферзь
	const FIGURE_KING   = 6;  // король
    
    public function setFigure($figure) 
    {
        
    }
}