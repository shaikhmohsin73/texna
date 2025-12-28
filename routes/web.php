<?php

use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/form', function () {
    return view('form');
});
Route::get('/admin', [LocationController::class, 'admin']);

Route::get('/locations', [LocationController::class, 'index']);
Route::get('/employe', [LocationController::class, 'employee']);





// Table employees {
//   id integer [primary key]
//   username varchar
//   mobile_no integer
//   photo varchar
//   role varchar
//   status integer
//   created_at timestamp
// }

// table location{
//   id integer [primary key]
//   e_id integer
//   lang integer
//   long integer
// }

// Ref: "employees"."id" < "location"."e_id"