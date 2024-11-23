<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\CommentaireController;

Route::get('/', [ActualiteController::class, 'index'])->name('/');
Route::get('/articles', function () {
    return view('articles');
})->name('articles'); 
Route::get('/avocats',function(){
    return view('avocats');
})->name('avocats');

Route::post('/',[CommentaireController::class,'store'])->name('comment.store');

require __DIR__.'/web_actus.php';