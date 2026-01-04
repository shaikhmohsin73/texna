<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PartyImportController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest:admin')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'logins'])->name('login.submit');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/employees', [LocationController::class, 'employee'])->name('employee');
    Route::get('/employees/ajax', [LocationController::class, 'employeeAjax'])->name('employee.ajax');
    Route::post('/employees/update-approval', [LocationController::class, 'updateApprovalStatus'])->name('employee.updateApproval');
    Route::get('/admin', [LocationController::class, 'admin']);
    Route::get('/locations', [LocationController::class, 'index']);
    Route::get('/form', function () {
        return view('form');
    });
    Route::post('/form', [LocationController::class, 'store'])->name('projects.store');
    Route::get('/form/{id}', [LocationController::class, 'edit']);
    Route::get('/list', [AuthController::class, 'formlist'])->name('formlist');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    ROute::get('party_name', [PartyImportController::class, 'party_name'])->name('party_name');
    Route::get('party-list', [PartyImportController::class, 'getPartyList'])->name('party.list');
    Route::get('/party/create', [PartyImportController::class, 'create'])->name('party.create');
    Route::post('/party/store', [PartyImportController::class, 'store'])->name('party.store');
    Route::get('/party/view/{id}', [PartyImportController::class, 'view']);
    Route::get('/party/edit/{id}', [PartyImportController::class, 'edit']);
    Route::put('/party/update/{id}', [PartyImportController::class, 'update'])->name('party.update');
    Route::delete('/party/delete/{id}', [PartyImportController::class, 'destroy']);
});
// Route::get('/party-import', [PartyImportController::class, 'importget']);
// Route::post('/party-import', [PartyImportController::class, 'import']);
