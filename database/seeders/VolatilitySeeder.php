<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\File;

class VolatilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        define("SQLFILE1", 'database\seeders\volatility1.sql');
        DB::unprepared(File::get(SQLFILE1));

        define("SQLFILE2", 'database\seeders\volatility1.sql');
        DB::unprepared(File::get(SQLFILE2));
    }
}
