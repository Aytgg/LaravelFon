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

        $fonPriceLast = DB::table('fonprices')
            ->where('fon_id', $fon->id)
            ->orderByDesc('date')
            ->first();
        $fonPrice = $fonPriceLast->price;

        $time = new DateTime($fonPriceLast->date);

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

        $fonPriceDiff1Month = getFonPriceDiff(
            $fon,
            $time->format('Y-m-d'),
            '-1 month',
            $fonPrice
        );

        $fonPriceDiff3Month = getFonPriceDiff(
            $fon,
            $time->format('Y-m-d'),
            '-3 month',
            $fonPrice
        );

        $fonPriceDiff6Month = getFonPriceDiff(
            $fon,
            $time->format('Y-m-d'),
            '-6 month',
            $fonPrice
        );

        $fonPriceDiff1Year = getFonPriceDiff(
            $fon,
            $time->format('Y-m-d'),
            '-1 year',
            $fonPrice
        );

        $fonPriceDiff3Year = getFonPriceDiff(
            $fon,
            $time->format('Y-m-d'),
            '-3 year',
            $fonPrice
        );

        $fonPriceDiff5Year = getFonPriceDiff(
            $fon,
            $time->format('Y-m-d'),
            '-5 year',
            $fonPrice
        );

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

        $time = $time->format('Y-m-d');

        return view('fon', compact(
            'fon',
            'fonPrice',
            'time',
            'fonPayAdet',
            'fonYatirimciSayisi',
            'fonPriceDiff1Month',
            'fonPriceDiff3Month',
            'fonPriceDiff6Month',
            'fonPriceDiff1Year',
            'fonPriceDiff3Year',
            'fonPriceDiff5Year',
        ));
    }
}
