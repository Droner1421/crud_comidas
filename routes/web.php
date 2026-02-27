<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComidasController;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return Redirect::route('comidas.index');
}); 
Route::resource('comidas', ComidasController::class);
