<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PartyImportController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest:admin')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'logins'])->name('login.submit');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/employees', [LocationController::class, 'employee'])->name('employee');
    Route::get('/employees/ajax', [LocationController::class, 'employeeAjax'])->name('employee.ajax');
    Route::post('/employees/update-approval', [LocationController::class, 'updateApprovalStatus'])->name('employee.updateApproval');
    Route::get('/location', [LocationController::class, 'admin']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    // Party Controller 
    ROute::get('party_name', [PartyImportController::class, 'party_name'])->name('party_name');
    Route::get('party-list', [PartyImportController::class, 'getPartyList'])->name('party.list');
    Route::get('/party/create', [PartyImportController::class, 'create'])->name('party.create');
    Route::post('/party/store', [PartyImportController::class, 'store'])->name('party.store');
    // Route::get('/party/view/{id}', [PartyImportController::class, 'view']);
    Route::get('/party/edit/{id}', [PartyImportController::class, 'edit']);
    Route::put('/party/update/{id}', [PartyImportController::class, 'update'])->name('party.update');
    Route::delete('/party/delete/{id}', [PartyImportController::class, 'destroy']);
    // form controller 
    Route::get('form_list', [ProductController::class, 'form'])->name('form_list');
    Route::get('form_list/data', [ProductController::class, 'formData'])->name('form_list.data');
    Route::get('form_create', [ProductController::class, 'form_create'])->name('form_create');
    Route::post('/form', [ProductController::class, 'store'])->name('projects.store');
    Route::get('/form_edit/{id}', [ProductController::class, 'edit'])->name('form_edit');
    Route::put('/production-cards/{id}', [ProductController::class, 'update'])->name('production-cards.update');
    Route::get('/production-cards/{id}/print', [ProductController::class, 'print']);
    Route::get('/production-cards/{id}/pdf', [ProductController::class, 'pdf']);
});
