<?php

namespace khomeriki\RussianRoulette\Commands;

use Illuminate\Console\Command;
use khomeriki\RussianRoulette\Facades\RussianRoulette;

class RussianRouletteCommand extends Command
{
    public $signature = 'play:russian-roulette';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('shooting...');
        $killed = RussianRoulette::shoot();

        $this->comment($killed ? 'now you can search for a new job' : 'you are lucky, something went wrong');

        return self::SUCCESS;
    }
}
