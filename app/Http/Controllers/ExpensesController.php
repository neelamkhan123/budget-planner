<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $expenses = Expenses::where('user_id', Auth::id())->get();

        // Get all amounts from expenses and get the total sum
        $total = $expenses->pluck('amount')->sum();

        return view('folders.expenses', ['expenses' => $expenses, 'total' => $total]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'date' => ['required'],
            'title' => ['required'],
            'amount' => ['required'],
        ]);

        $date = $attributes['date'];
        $title = $attributes['title'];
        $amount = $attributes['amount'];

        if (! $date) {
            throw ValidationException::withMessages([
                'date' => 'Please provide a valid date'
            ]);
        }

        if (! $title) {
            throw ValidationException::withMessages([
                'title' => 'Please provide a valid title'
            ]);
        }

        if (! $amount) {
            throw ValidationException::withMessages([
                'amount' => 'Please provide a valid amount'
            ]);
        }

        Expenses::create(
            [
                'user_id' => Auth::id(),
                'date' => $date,
                'title' => $title,
                'amount' => $amount,
            ],

        );

        return redirect('/expenses');
    }

    /**
     * Display the specified resource.
     */
    // public function show()
    // {
    //     $expenses = Expenses::all();

    //     return view('folders.expenses', ['expenses' => $expenses]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expense = Expenses::findOrFail($id); // Find the expense or throw a 404 error
        $expense->delete(); // Delete the expense

        return redirect('/expenses');
    }
}
