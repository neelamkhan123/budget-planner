<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Budget;
use Illuminate\Support\Facades\Auth;

class BudgetAmountController extends Controller
{

    public function create()
    {
        // Get latest budget row where the user_id is equal to the currently signed in user
        $budget = Budget::where('user_id', Auth::id())->first();

        return view('budget.create', ['budget' => $budget]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request
        $result = $request->validate([
            'budget_value' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required']
        ]);

        // Throw errors for budget_value
        $budget = $result['budget_value'];
        // Convert the value to a valid decimal number
        $verifiedBudget = preg_replace('/[^\d.]/', '', $budget); // Remove commas and other invalid characters

        if (! $verifiedBudget) {
            throw ValidationException::withMessages([
                'budget_value' => 'You must enter a budget value'
            ]);
        }

        if ($verifiedBudget < 100) {
            throw ValidationException::withMessages([
                'budget_value' => 'You must enter a minimum of £100'
            ]);
        }

        // Throw errors for start and end dates
        $startDate = $result['start_date'];
        $endDate = $result['end_date'];

        if (! $startDate) {
            throw ValidationException::withMessages([
                'reset_date' => 'You must provide a start date'
            ]);
        }

        if (! $endDate) {
            throw ValidationException::withMessages([
                'reset_date' => 'You must provide an end date'
            ]);
        }

        // Replace or create the budget entry
        Budget::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'budget_value' => $verifiedBudget,
                'start_date' => $startDate,
                'end_date' => $endDate
            ]
        );

        return redirect('/expenses');
    }
}
