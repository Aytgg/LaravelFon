<?php

use Illuminate\Support\Facades\Route;

Route::get(
    '/{seg1}/{seg2}/{seg3}',
    ['App\Http\Controllers\FonController'::class, 'routeEmpty']
)->name('routeMe3');

Route::get('/fons/{fon_code}',
    ['App\Http\Controllers\FonController'::Class, 'showFon'])
    ->name('fon');

Route::get(
    '/{seg1}/{seg2}',
    ['App\Http\Controllers\FonController'::class, 'routeEmpty']
)->name('routeMe2');

Route::get('/{seg1}', ['App\Http\Controllers\FonController'::class, 'routeEmpty'])
    ->name('routeMe1');

Route::get('/', ['App\Http\Controllers\FonController'::class, 'routeEmpty'])
    ->name('routeMe0');


// Route::get('/',
//     ['App\Http\Controllers\FonController'::Class, 'selectFon'])
//     ->name('selector');

// Route::permanentRedirect('/{alpha2code}', '/{alpha2code}/fons/IPB');