<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('anuncios', \App\Http\Controllers\AnuncioController::class);
