<?php

namespace khomeriki\RussianRoulette\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \khomeriki\RussianRoulette\RussianRoulette
 */
class RussianRoulette extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \khomeriki\RussianRoulette\RussianRoulette::class;
    }
}
