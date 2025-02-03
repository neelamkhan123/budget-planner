<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Leisure;
use App\Models\Budget;
use App\Models\Expenses;
use App\Models\Savings;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('components.dashboard-layout', function ($view) {
            $userId = Auth::id(); // Get the current user ID once

            // Fetch the data dynamically
            $budget = Budget::where('user_id', $userId)->first();
            $totalExpenses = Expenses::where('user_id', $userId)->pluck('amount')->sum();
            $totalSavings = Savings::where('user_id', $userId)->pluck('amount')->sum();
            $currentSavingsBalance = Savings::where('user_id', $userId)->pluck('savings_balance')->sum();
            $totalLeisure = Leisure::where('user_id', $userId)->pluck('amount')->sum();

            // Remaining Spending Balance
            $remainingBalance = ($budget->budget_value ?? 0) - $totalExpenses - $totalSavings - $totalLeisure;

            // Pass data to the view
            $view->with('budget', $budget);
            $view->with('remainingBalance', $remainingBalance);
        });

        View::composer('*', function ($view) {
            $userId = Auth::id(); // Get the current user ID once

            // Fetch the data dynamically
            $totalSavings = Savings::where('user_id', $userId)->pluck('amount')->sum();
            $currentSavingsBalance = Savings::where('user_id', $userId)->pluck('savings_balance')->sum();

            // Adding up savings
            $savingsBalance = $currentSavingsBalance + $totalSavings;

            // Pass data to the view
            $view->with('savingsBalance', $savingsBalance);
            $view->with('currentSavingsBalance', $currentSavingsBalance);
        });
    }
}
