<?php

namespace OOPBoard;

spl_autoload_register(function($class) {
    require __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
});

$board = new StandartBoard();
$peshka = new Figure();

$board->setPosition($peshka, 'a6');