<?php

namespace OOPBoard;

class StandartBoard implements BoardInterface
{
    private $board = [];
    const X = ['A','B','C','D','E','F','G','H'];
    const Y = [1, 2, 3, 4, 5, 6, 7, 8];

    public function __construct() 
    {        
        $symbol = 65;
        
        for ($x=65; $x <= $symbol+8; $x++) { 
            for ($y=1; $y <= 8 ; $y++) { 
                $this->board[chr($x)][$y] = 0;
            }  
        }
    }

    public function showBoard() 
    {
        $symbol = 65;

        for ($i=1; $i <= 8 ; $i++) { 
            for ($j=65; $j <= $symbol+8; $j++) { 
                echo ' [' . $this->board[$i][chr($j)] = 0 . '] ';
            }
            // echo '<br>';
            echo PHP_EOL;
        }    
    }

    public function setPosition(Figure $figure, $position)
    {
        $position = preg_split('//', $position, -1, PREG_SPLIT_NO_EMPTY);
        $x = strtoupper($position[0]);
        $y = $position[1];

        foreach ($axes as $axis) {
            if ($axis === $value) {
                return true;
            };
        }
    }

    public function move($from, $to, Figure $figure)
    {

    }
}
