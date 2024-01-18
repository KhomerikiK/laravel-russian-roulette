<?php

namespace khomeriki\RussianRoulette\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use khomeriki\RussianRoulette\RussianRouletteServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'khomeriki\\RussianRoulette\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            RussianRouletteServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        $migration = include __DIR__.'/../database/migrations/create_random_table.php.stub';
        $migration->up();
    }
}
