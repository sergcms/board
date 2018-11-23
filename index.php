<?php

namespace OOPBoard;

spl_autoload_register(function($class) {
    require __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
});

// pawn   = 1;  // пешка
// bishop = 2;  // слон
// knight = 3;  // конь
// castle = 4;  // ладья
// queen  = 5;  // ферзь
// king   = 6;  // король
// setFigure(фигура, цвет) // цвет: черный - true, белый - false

$board = new Board();

$pawn = new Pawn();
$pawn->setFigure('pawn', false);

$board->setPosition($pawn, 'e2');
$board->moveFigure($pawn, 'E4');

$board->showBoard();