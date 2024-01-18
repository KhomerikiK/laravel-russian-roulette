<?php

namespace khomeriki\RussianRoulette;

use khomeriki\RussianRoulette\Commands\RussianRouletteCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class RussianRouletteServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-russian-roulette')
            ->hasCommand(RussianRouletteCommand::class);
    }
}
