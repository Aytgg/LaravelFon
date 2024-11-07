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

    public function index()
    {
        $fon_code = request('fon_code') ?? 'IPB';

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

        $fonPayAdetMonthly =
            $fonYatirimciSayisiMonthly =
            $fonPriceMonthly =
            $fonPriceDiffs =
            $fonpricesForChart =
            $ftdforBarChartData =
            $fonVolatilityForChart = [];

        // fonPayAdetMonthly - fonYatirimciSayisiMonthly - fonPriceMonthly
        for ($i = 6; $i > 0; $i--) {
            array_push($fonPayAdetMonthly, $this->getDataMonthly(
                $fon,
                $time,
                '-' . $i . ' month',
                'payAdet',
                'payAdet'
            ));

            array_push($fonYatirimciSayisiMonthly, $this->getDataMonthly(
                $fon,
                $time,
                '-' . $i . ' month',
                'yatirimciSayisi',
                'yatirimciSayisi'
            ));

            array_push($fonPriceMonthly, $this->getDataMonthly(
                $fon,
                $time,
                '-' . $i . ' month',
                'fonprices',
                'price'
            ));
        }

        // fonPriceDiffs
        foreach (['1Month', '3Month', '6Month', '1Year', '3Year', '5Year'] as $diff) {
            $fonPriceDiffs[$diff] = $this->getFonPriceDiff(
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

        $fonpricesForChartLast = [
            '7G' => [],
            '1A' => [],
            '3A' => [],
            '1Y' => [],
            '3Y' => []
        ];

        for ($i = 0; $i < 365 * 3; $i++)
            array_push($fonpricesForChartLast['3Y'], $fonpricesForChart[$i]);
        for ($i = 0; $i < 365; $i++)
            array_push($fonpricesForChartLast['1Y'], $fonpricesForChart[$i]);
        for ($i = 0; $i < 30 * 3; $i++)
            array_push($fonpricesForChartLast['3A'], $fonpricesForChart[$i]);
        for ($i = 0; $i < 30; $i++)
            array_push($fonpricesForChartLast['1A'], $fonpricesForChart[$i]);
        for ($i = 0; $i < 7; $i++)
            array_push($fonpricesForChartLast['7G'], $fonpricesForChart[$i]);

        foreach ($fonpricesForChartLast as $period => $data)
            $fonpricesForChartLast[$period] = array_reverse($data);

        // fonVolatilityForChart
        $fonVolatility->each(function ($item) use (&$fonVolatilityForChart) {
            array_push($fonVolatilityForChart, $item->volatility);
        });

        $fonVolatilityForChart = array_reverse($fonVolatilityForChart);

        // wh1000forBarChart --- STATIC DATA
        $wh1000forBarChart = [
            '1A' => [1020, 970, 897, 894, 893],
            '3A' => [1042, 1038, 964, 812, 797],
            '6A' => [1052, 1063, 1145, 930, 909],
        ];

        foreach (['1A', '3A', '6A'] as $period)
            for ($i = 0; $i < 5; $i++)
                $wh1000forBarChart[$period][$i] -= 1000;

        // vsdforBarChart --- STATIC DATA
        $vsdforBarChart = [
            'HS' => [60.43, 61.53, 61.44, 61.86, 62.28, 63.06, 62.64, 62.14, 62.08, 62.76],
            'YYF' => [16.73, 17.26, 17.10, 17.21, 17.60, 17.74, 16.86, 17.42, 17.88, 15.65],
            'YHS' => [11.01, 11.41, 11.40, 11.46, 11.66, 11.79, 11.77, 12.09, 12.81, 13.05],
            'TR' => [4.81, 0, 2.94, 0, 0, 0, 0, 0, 0, 0],
            'VİNT' => [2.36, 2.43, 2.42, 2.44, 2.50, 2.53, 2.52, 2.61, 2.74, 2.81],
            'GSYKB' => [0, 2.41, 0, 2.38, 2.44, 2.46, 2.44, 2.52, 2.64, 2.71],
            'Kalanlar' => [4.66, 4.96, 4.70, 4.65, 3.52, 2.42, 3.77, 3.22, 1.85, 3.02]
        ];

        // priceforAreaChart - volatilityforAreaChart - wh1000forLineChart
        $priceforAreaChart = json_encode($fonpricesForChartLast);
        $volatilityforAreaChart = json_encode($fonVolatilityForChart);
        $wh1000forBarChart = json_encode($wh1000forBarChart);

        // ftdforBarChartData
        for ($i = 0; $i < 6; $i++)
            array_push($ftdforBarChartData, $fonPayAdetMonthly[$i] * $fonPriceMonthly[$i]);

        $ftdforBarChart = json_encode($ftdforBarChartData);
        $vsdforBarChart = json_encode($vsdforBarChart);

        return view('page', compact(
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
            'volatilityforAreaChart',
            'vsdforBarChart'
        ));
    }

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

    public function route2()
    {
        // return 'HERE';
        return view('page');
    }

    public function route1()
    {
        return view('page');
    }

    public function route0()
    {
        return view('page');
    }
}