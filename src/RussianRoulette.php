<?php

namespace khomeriki\RussianRoulette;

use Exception;
use Illuminate\Support\Facades\DB;

class RussianRoulette
{
    /**
     * @throws Exception
     */
    public function shoot(): bool
    {
        [$tables, $tableProperty] = $this->getTables();
        try {
            $randomTable = $tables[array_rand($tables)]->$tableProperty;

            return (bool) DB::table($randomTable)->inRandomOrder()->delete();
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @throws Exception
     */
    public function getTables(): array
    {
        $connection = DB::connection()->getDriverName();

        switch ($connection) {
            case 'mysql':
                $tables = DB::select('SHOW TABLES');
                $tableProperty = 'Tables_in_'.env('DB_DATABASE');
                break;

            case 'pgsql':
                $tables = DB::select("SELECT table_name FROM information_schema.tables WHERE table_schema='public'");
                $tableProperty = 'table_name';
                break;

            case 'sqlite':
                $tables = DB::select("SELECT name FROM sqlite_master WHERE type='table'");
                $tableProperty = 'name';
                break;

            default:
                throw new Exception('Database driver not supported');
        }
        if (count($tables) === 0) {
            throw new Exception('Looser, you have no tables');
        }

        return [$tables, $tableProperty];
    }
}
