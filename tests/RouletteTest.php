<?php

it('can test', function () {
    \khomeriki\RussianRoulette\Facades\RussianRoulette::shoot();
    expect(true)->toBeTrue();
});

it('can execute command', function () {
    \Illuminate\Support\Facades\DB::table('random_table')->insert(['haha' => 'haha']);
    $this->artisan('play:russian-roulette')
        ->expectsOutput('now you can search for a new job')
        ->assertExitCode(0);
});

it('could not delete one', function () {
    $this->artisan('play:russian-roulette')
        ->expectsOutput('you are lucky, something went wrong')
        ->assertExitCode(0);
});
