<?php

namespace OOPBoard;

use OOPBoard\Pawn;

class Pawn extends Figure implements PawnInterface
{
    public $isMove = false; // Ходила ли пешка или это первый раз.  
    public $currentPosition;

    public function firstRules(): array
    {
        $dataFigure = self::getFigure();

        if ($dataFigure['isBlack']) {
            return ['A7','B7','C7','D7','E7','F7','G7','H7'];
        } else {
            return ['A2','B2','C2','D2','E2','F2','G2','H2'];
        } 
    }
    
    public function checkMove($toPosition): ?array 
    {
        $dataFigure = self::getFigure();
        
        $col = $this->currentPosition[0];
        $row = $this->currentPosition[1];

        if (strtoupper($toPosition[0]) === $col) {
            if (!$this->isMove) {
                if (!$dataFigure['isBlack']) {
                    return [$col . ($row + 1), $col . ($row + 2)]; 
                } else {
                    return [$col . ($row - 1), $col . ($row - 2)]; 
                }
            } else {
                if (!$dataFigure['isBlack']) {
                    return [$col . ($row + 1)]; 
                } else {
                    return [$col . ($row - 1)];
                }
            }
        } else {
            echo 'Can not move!' . PHP_EOL;

            return null;
        }
    }
}
