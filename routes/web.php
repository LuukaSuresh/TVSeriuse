<?php

use App\Http\Controllers\TVSeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tvseries.index');
});

Route::resource('tvseries', TVSeriesController::class);