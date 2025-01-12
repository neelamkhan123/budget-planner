<?php

use App\Http\Controllers\BudgetAmountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\LeisureController;
use App\Http\Controllers\SavingsController;

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
    // Route::get('/expenses', [ExpensesController::class, 'show']);
    Route::delete('/expenses/{id}', [ExpensesController::class, 'destroy']);

    Route::get('/savings', [SavingsController::class, 'index']);

    Route::get('/leisure', [LeisureController::class, 'index']);
});
