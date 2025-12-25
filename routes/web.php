<?php

use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin');
});

Route::get('/locations', [LocationController::class, 'index']);
Route::get('/employe', [LocationController::class, 'employee']);
