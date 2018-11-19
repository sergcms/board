<?php

namespace OOPBoard;

interface PawnInterface 
{
    public function firstRules(): array;
    public function checkMove($toPosition): ?array ;
}