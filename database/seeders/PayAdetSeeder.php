<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateInterval;
use DatePeriod;
use DateTime;

class PayAdetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $period = new DatePeriod(
            new DateTime('2021-10-13'),
            DateInterval::createFromDateString('1 day'),
            new DateTime('2024-10-13')
        );

        foreach (['IPB', 'IIH'] as $fon_code) {
            $fon_id = DB::table('fons')->where('code', $fon_code)->first()->id;

            foreach ($period as $dt) {
                DB::table('payAdet')->insert([
                    'fon_id' => $fon_id,
                    'payAdet' => fake()->randomNumber(9, true),
                    'date' => $dt->format("Y-m-d"),
                ]);
            }
        }
    }
}
