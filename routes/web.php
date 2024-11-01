<?php

use Illuminate\Support\Facades\Route;

Route::get('/',
    ['App\Http\Controllers\FonController'::Class, 'selectFon'])
    ->name('selector');

Route::get('/fons/{fon_code}',
    ['App\Http\Controllers\FonController'::Class, 'showFon'])
    ->name('fon');