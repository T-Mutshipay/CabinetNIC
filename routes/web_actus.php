<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActualiteController;

Route::get('welcome', [ActualiteController::class, 'index']);
