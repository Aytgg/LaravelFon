<?php

use Illuminate\Support\Facades\Route;

Route::get('/',
    ['App\Http\Controllers\FonController'::Class, 'selectFon'])
    ->name('selector');

Route::permanentRedirect('/{alpha2code}', '/{alpha2code}/fons/IPB');

Route::get('/{alpha2code}/fons/{fon_code}',
    ['App\Http\Controllers\FonController'::Class, 'showFon'])
    ->name('fon');