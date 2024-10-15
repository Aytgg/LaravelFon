<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateInterval;
use DatePeriod;
use DateTime;


class FonPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $period = new DatePeriod(
            new DateTime('2019-10-12'),
            DateInterval::createFromDateString('1 day'),
            new DateTime('2024-10-14')
        );

        foreach (['IPB', 'IIH'] as $fon_code) {
            $fon_id = DB::table('fons')->where('code', $fon_code)->first()->id;

            foreach ($period as $dt) {
                DB::table('fonprices')->insert([
                    'fon_id' => $fon_id,
                    'price' => fake()->randomFloat(2, 0.01, 999.99),
                    'date' => $dt->format("Y-m-d"),
                ]);
            }
        }
    }
}