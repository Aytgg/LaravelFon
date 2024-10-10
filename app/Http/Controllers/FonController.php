<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fon;

class FonController extends Controller
{
    public function selectFon() {
        $fons = Fon::all();

        return view('selector', compact('fons'));
    }

    public function showFon($fon_code) {
        $fon = Fon::where('code', $fon_code)->first();

        return view('fon', compact('fon'));
    }
}
