<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('selector');
})->name('selector');

Route::get('/fons/{fon_code}', function ($fon_code) {
    return view('fon', ['fon_code' => $fon_code]);
})->name('fon'); // Add a controller for this route !!!