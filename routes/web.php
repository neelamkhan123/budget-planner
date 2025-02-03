<?php

use App\Http\Controllers\BudgetAmountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\LeisureController;
use App\Http\Controllers\SavingsController;
use App\Http\Controllers\ResetDataController;

Route::middleware('guest')->group(function () {
    Route::get('/', [RegistrationController::class, 'create']);
    Route::post('/', [RegistrationController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::delete('/logout', [SessionController::class, 'destroy']);

    Route::get('/budget', [BudgetAmountController::class, 'create']);
    Route::post('/budget', [BudgetAmountController::class, 'store']);

    Route::get('/expenses', [ExpensesController::class, 'create']);
    Route::post('/expenses', [ExpensesController::class, 'store']);
    Route::delete('/expenses/{id}', [ExpensesController::class, 'destroy']);

    Route::get('/savings', [SavingsController::class, 'create']);
    Route::post('/set-savings', [SavingsController::class, 'set']);
    Route::post('/savings', [SavingsController::class, 'store']);
    Route::patch('/savings/edit', [SavingsController::class, 'edit']);
    Route::patch('/savings/update', [SavingsController::class, 'update']);

    Route::get('/leisure', [LeisureController::class, 'create']);
    Route::post('/leisure', [LeisureController::class, 'store']);
    Route::delete('/leisure/{id}', [LeisureController::class, 'destroy']);

    Route::delete('/reset', [ResetDataController::class, 'destroy']);
});
