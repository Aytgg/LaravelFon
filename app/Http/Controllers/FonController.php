<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fon;
use Attribute;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class FonController extends Controller
{
    public function selectFon() {
        $fon_codes = [];

        foreach (Fon::all() as $fon)
            array_push($fon_codes, $fon->code);

        return view('selector', compact('fon_codes'));
    }

    public function showFon($fon_code) {
        $fon = Fon::where('code', $fon_code)->first();

        return view('fon', compact('fon'));
    }
}
