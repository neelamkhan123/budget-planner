<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Savings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SavingsController extends Controller
{
    protected $editSavings = true;

    public function create()
    {
        $savings = Savings::where('user_id', Auth::id())->first();

        if ($savings && $savings->amount) {
            $this->editSavings = false;
        }

        return view('folders.savings', [
            'savings' => $savings,
            'editSavings' => $this->editSavings,
        ])->with('editSavings', $this->editSavings);
    }

    public function store(Request $request)
    {
        $this->editSavings = false;

        $attributes = $request->validate([
            'amount' => ['required'],
        ]);

        $amountSaved = $attributes['amount'];

        if (!$amountSaved || $amountSaved < 1) {
            throw ValidationException::withMessages([
                'amount' => 'Please provide a valid amount',
            ]);
        }

        Savings::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'amount' => $amountSaved,
            ],
        );

        return redirect('/savings')->with('editSavings', $this->editSavings);
    }

    public function edit()
    {
        $this->editSavings = true;

        return redirect('/savings')->with('editSavings', $this->editSavings);
    }

    public function set(Request $request)
    {

        $attributes = $request->validate([
            'savings_balance' => ['required'],
        ]);

        $savingsBalance = $attributes['savings_balance'];

        if (!$savingsBalance) {
            throw ValidationException::withMessages([
                'amount' => 'Please provide a valid amount',
            ]);
        }

        Savings::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'savings_balance' => $savingsBalance,
                'amount' => 0,
            ],
        );

        return redirect('/savings');
    }

    public function update()
    {
        Savings::where('user_id', Auth::id())->delete();

        return redirect('/savings');
    }
}
