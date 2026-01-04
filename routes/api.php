<?php

use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

Route::post('employee/register', [LocationController::class, 'employeeregister']);
Route::post('employee/location', [LocationController::class, 'employeelocation']);
Route::post('employee/status', [LocationController::class, 'employeelocation']);