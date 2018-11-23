<?php

namespace OOPBoard;

class Board implements BoardInterface
{
    private $field;    
    const X = ['A','B','C','D','E','F','G','H'];
    const Y = 8;

    public function __construct() 
    {        
        foreach (self::X as $x) {
            for ($y = self::Y; $y >= 1 ; $y--) { 
                $this->field[$x . $y] = 0;
            }
        }
    }

    public function setPosition(Figure $figure, $position): void
    {       
        $position = strtoupper($position);

        if (!$this->checkPosition($position)) {
            return;
        }

        $isPossible = $figure->firstRules();
        $dataFigure = $figure->getFigure();

        foreach ($isPossible as $pos) {
            if ($pos === $position) {
                if ($this->field[$position] === 0) {
                    $this->field[$position] = $dataFigure['id'];

                    $figure->currentPosition = $position;
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
        if (!key_exists($position, $this->field)) {
            echo 'Wrong position!' . PHP_EOL;

            return false;
        }

        return true;
    }

    public function moveFigure(Figure $figure, $toPosition): void
    {
        $toPosition = strtoupper($toPosition);
        
        if (!$this->checkPosition($toPosition)) {
            return;
        }

        $isPossible = $figure->checkMove($toPosition);
        $dataFigure = $figure->getFigure();

        if ($isPossible) {
            foreach ($isPossible as $pos) {
                if ($pos === $toPosition) {
                    if ($this->field[$toPosition] === 0) {
                        $this->field[$toPosition] = $dataFigure['id'];
                        $this->field[$figure->currentPosition] = 0;
    
                        $figure->isMove = true;
                        $figure->currentPosition = $toPosition;
                        
                        return;
                    } else {
                        echo 'Position busy!' . PHP_EOL;
                    }
                }              
            }
        } else {
            echo 'Wrong position!' . PHP_EOL;

            return;
        } 

        echo 'Wrong position!' . PHP_EOL;

        return;
    }

    public function showBoard(): void 
    {
        
        for ($y = self::Y; $y >= 1; $y--) { 
            echo $y . ' ';
            
            foreach (self::X as $x) {
                echo '[' . $this->field[$x . $y] . ']';
            }

            echo PHP_EOL;
        }

        echo '   A  B  C  D  E  F  G  H ' . PHP_EOL;

    }
}
