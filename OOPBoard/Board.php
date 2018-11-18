<?php

namespace OOPBoard;

class Board implements BoardInterface
{
    private $board = [];
    
    private $currentPosition;

    const X = ['A','B','C','D','E','F','G','H'];
    const Y = [1, 2, 3, 4, 5, 6, 7, 8];

    public function __construct() 
    {        
        $symbol = 65;
        
        for ($y=8; $y >= 1; $y--) { 
            for ($x=65; $x <= $symbol+7; $x++) { 
                $this->board[chr($x)][$y] = 0;
            }  
        }
        
    }

    public function setPosition(Figure $figure, $position): void
    {       
        if (!$this->checkPosition($position)) {
            return;
        }

        $x = strtoupper($position[0]);
        $y = $position[1];

        $isPossible = $figure->firstRules();
        $dataFigure = $figure->getFigure();

        foreach ($isPossible as $pos) {
            if ($pos === strtoupper($position)) {
                if ($this->board[$x][$y] === 0) {
                    $this->board[$x][$y] = $dataFigure['id'];

                    $figure->currentPosition = strtoupper($position);
                } else {
                    echo 'Position busy!' . PHP_EOL;
                }
                
                return;
            } 
        }

        echo 'Figure ' . $dataFigure['figure'] . ' cannot be set to position ' . strtoupper($position) . '!' . PHP_EOL;

        return;
    }

    public function checkPosition($position): bool
    {
        if (strlen($position) > 2) {
            echo 'Goes beyond the board!' . PHP_EOL;

            return false;
        }

        $x = $this->checkValue(self::X, strtoupper($position[0]));
        $y = $this->checkValue(self::Y, intval($position[1]));
            
        if (!$x || !$y) {
            echo 'Wrong position!' . PHP_EOL;

            return false; 
        } else {
            return true;
        }
    }

    public function checkValue($axes, $value)
    {
        foreach ($axes as $axis) {
            if ($axis === $value) {
                return $value;
            };
        }

        return false;
    }

    public function move(Figure $figure, $toPosition)
    {
        if (!$this->checkPosition($toPosition)) {
            return;
        }

        $figure->moveLogic($toPosition);

        $x = strtoupper($toPosition[0]);
        $y = $toPosition[1];
    }



    public function showBoard(): void 
    {
        $symbol = 65;

        echo '   A  B  C  D  E  F  G  H ' . PHP_EOL;
        
        for ($y=8; $y >= 1; $y--) { 
            echo $y . ' ';
            
            for ($x=65; $x <= $symbol+7; $x++) { 
                echo '[' . $this->board[chr($x)][$y] . ']';
            }  

            echo PHP_EOL;
        }
    }
}
