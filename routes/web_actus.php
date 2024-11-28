<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActualiteController;

Route::get('welcome', [ActualiteController::class, 'index']);
Route::get('/articles/{id}', [ActualiteController::class, 'show'])->name('actualites.show');


 