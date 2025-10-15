<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/theme-utilities', function () {
    return view('theme-utilities');
});