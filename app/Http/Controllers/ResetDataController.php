<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Budget;
use App\Models\Expenses;
use App\Models\Leisure;
use App\Models\Savings;

class ResetDataController extends Controller

{
    public function destroy()
    {
        Budget::where('user_id', Auth::id())->delete();
        Expenses::where('user_id', Auth::id())->delete();
        Leisure::where('user_id', Auth::id())->delete();
        Savings::where('user_id', Auth::id())->delete();

        return redirect('/budget');
    }
}
