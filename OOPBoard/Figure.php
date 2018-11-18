<?php

namespace OOPBoard;

class Figure implements FigureInterface 
{
	protected $figure;
	protected $isBlack;
	protected $id;
    
    public function setFigure($figure, $isBlack): void 
    {
		switch ($figure) {
			case 'pawn':
				$this->id = 1;
				break;
			case 'bishop':
				$this->id = 2;
				break;
			case 'knight':
				$this->id = 3;
				break;
			case 'castle':
				$this->id = 4;
				break;
			case 'queen':
				$this->id = 5;
				break;
			case 'king':
				$this->id = 6;
				break;
			default:
				echo 'This figure does not exist!';
				return;
				break;
		}

		$this->figure = $figure;
		$this->isBlack = $isBlack;
	}

	public function getFigure(): array 
    {
		return ['id' => $this->id, 'figure' => $this->figure, 'isBlack' => $this->isBlack];
	}
}