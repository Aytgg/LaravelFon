<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use DateTime;

if (!function_exists('getFonPriceDiff')) {
    function getFonPriceDiff($fon, $date, $diff, $fonPrice)
    {
        $fonPriceOld = DB::table('fonprices')
            ->where('fon_id', $fon->id)
            ->where(
                'date',
                (new DateTime($date))->modify($diff)->format('Y-m-d')
            )
            ->first()
            ->price;

        return number_format(($fonPrice - $fonPriceOld) / $fonPriceOld * 100, 2);
    }
}

if (
    !function_exists(
        'function getDataMonthly($fon, $date, $diff, $table, $column)'
    )
) {
    function getDataMonthly($fon, $date, $diff, $table, $column)
    {
        return intval(
            round(
                DB::table($table)
                    ->where('fon_id', $fon->id)
                    ->where(
                        'date',
                        '>',
                        (new DateTime($date))->modify($diff)->format('Y-m-d')
                    )
                    ->where(
                        'date',
                        '<',
                        (new DateTime($date))->modify($diff)->modify('+1 month')->format('Y-m-d')
                    )
                    ->avg($column)
            )
        );
    }
}