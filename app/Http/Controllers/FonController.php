<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Fon;
use Attribute;
use League\CommonMark\Extension\Attributes\Node\Attributes;
use DateTime;

class FonController extends Controller
{
    public function selectFon()
    {
        $fon_codes = [];

        foreach (Fon::all() as $fon)
            array_push($fon_codes, $fon->code);

        return view('selector', compact('fon_codes'));
    }

    public function showFon($fon_code)
    {
        $fon = Fon::where('code', $fon_code)->first();

        $fonprices = DB::table('fonprices')
            ->where('fon_id', $fon->id)
            ->orderByDesc('date')
            ->get();

        $fonPriceLast = $fonprices->first();
        $fonPrice = $fonPriceLast->price;

        $fonVolatility = DB::table('volatility')
            ->where('fon_id', $fon->id)
            ->orderByDesc(column: 'date')
            ->get();

        $fonPayAdet = DB::table('payAdet')
            ->where('fon_id', $fon->id)
            ->orderByDesc('date')
            ->first()
            ->payAdet;

        $fonYatirimciSayisi = DB::table('yatirimciSayisi')
            ->where('fon_id', $fon->id)
            ->orderByDesc('date')
            ->first()
            ->yatirimciSayisi;

        $time = new DateTime($fonPriceLast->date);
        $time = $time->format('Y-m-d');

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

        $fonPayAdetMonthly =
            $fonYatirimciSayisiMonthly =
            $fonPriceMonthly =
            $fonPriceDiffs =
            $fonpricesForChart =
            $ftdforBarChartData =
            $fonVolatilityForChart = [];

        // fonPayAdetMonthly - fonYatirimciSayisiMonthly - fonPriceMonthly
        for ($i = 6; $i > 0; $i--) {
            array_push($fonPayAdetMonthly, getDataMonthly(
                $fon,
                $time,
                '-' . $i . ' month',
                'payAdet',
                'payAdet'
            ));

            array_push($fonYatirimciSayisiMonthly, getDataMonthly(
                $fon,
                $time,
                '-' . $i . ' month',
                'yatirimciSayisi',
                'yatirimciSayisi'
            ));

            array_push($fonPriceMonthly, getDataMonthly(
                $fon,
                $time,
                '-' . $i . ' month',
                'fonprices',
                'price'
            ));
        }

        // fonPriceDiffs
        foreach (['1Month', '3Month', '6Month', '1Year', '3Year', '5Year'] as $diff) {
            $fonPriceDiffs[$diff] = getFonPriceDiff(
                $fon,
                $time,
                '-' . substr($diff, 0, 1) . ' ' . strtolower(substr($diff, 1)),
                $fonPrice
            );
        }

        // fonpricesForChart
        $fonprices->each(function ($item) use (&$fonpricesForChart) {
            array_push($fonpricesForChart, $item->price);
        });

        // fonVolatilityForChart
        $fonVolatility->each(function ($item) use (&$fonVolatilityForChart) {
            array_push($fonVolatilityForChart, $item->volatility);
        });

        // wh1000forBarChart --- STATIC DATA
        $wh1000forBarChart = [
            '1Month' => [1020, 984, 925, 909, 901],
            '3Month' => [1037, 1036, 1005, 803, 788],
            '6Month' => [1189, 1076, 1055, 928, 907],
        ];

        // priceforAreaChart - volatilityforAreaChart - wh1000forLineChart
        $priceforAreaChart = json_encode($fonpricesForChart);
        $volatilityforAreaChart = json_encode($fonVolatilityForChart);
        $wh1000forBarChart = json_encode($wh1000forBarChart);

        // ftdforBarChartData
        for ($i = 0; $i < 6; $i++)
            array_push($ftdforBarChartData, $fonPayAdetMonthly[$i] * $fonPriceMonthly[$i]);

        $ftdforBarChart = json_encode($ftdforBarChartData);

        return view('fon', compact(
            'fon',
            'fonPrice',
            'time',
            'fonPayAdet',
            'fonYatirimciSayisi',
            'fonPriceDiffs',
            'fonPayAdetMonthly',
            'fonYatirimciSayisiMonthly',
            'priceforAreaChart',
            'ftdforBarChart',
            'wh1000forBarChart',
            'volatilityforAreaChart'
        ));
    }
}
