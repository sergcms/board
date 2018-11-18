<?php

namespace OOPBoard;

use OOPBoard\Pawn;

class Pawn extends Figure implements PawnInterface
{
    public $isMove = false; // Ходила ли пешка или это первый раз.  
    public $currentPosition;

    public function firstRules ()
    {
        $dataFigure = self::getFigure();

        if ($dataFigure['isBlack']) {
            return ['A7','B7','C7','D7','E7','F7','G7','H7'];
        } else {
            return ['A2','B2','C2','D2','E2','F2','G2','H2'];
        } 
    }
    
    public function moveLogic($toPosition) 
    {
        $dataFigure = self::getFigure();

        if (!$this->isMove) {
            if ($toPosition[0] === $currentPosition[0]) {
                if (!$dataFigure['isBlack']) {
                    return [$currentPosition[0] . $currentPosition[1] + 1, $currentPosition[0] . $currentPosition[1] + 2]; 
                } else {
                    return [$currentPosition[0] . $currentPosition[1] - 1, $currentPosition[0] . $currentPosition[1] - 2];
                }
            } else {
                echo 'Can not move!';

                return;
            }
        } else {
            if ($toPosition[0] === $currentPosition[0]) {
                if (!$dataFigure['isBlack']) {
                    return [$currentPosition[0] . $currentPosition[1] + 1]; 
                } else {
                    return [$currentPosition[0] . $currentPosition[1] - 1];
                }
            } else {
                echo 'Can not move!';

                return;
            }
        }

    }

    public function checkMove()
	{

    }
}
