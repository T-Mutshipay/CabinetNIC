<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/');
Route::get('/articles', function () {
    return view('articles');
})->name('articles'); 
Route::get('/avocats',function(){
    return view('avocats');
})->name('avocats');