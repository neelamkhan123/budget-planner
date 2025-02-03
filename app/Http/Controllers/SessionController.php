<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\Budget;

class SessionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate Credentials
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate the user
        if (!Auth::attempt($credentials)) {
            // Check if the email exists in the database
            $emailExists = User::where('email', $credentials['email'])->exists();

            // Customize error messages based on the cause of failure
            if (!$emailExists) {
                throw ValidationException::withMessages([
                    'email' => 'The email address does not exist in our records.',
                ]);
            }

            // Password is incorrect
            throw ValidationException::withMessages([
                'password' => 'The password you entered is incorrect.',
            ]);
        }

        // Regenerate session tokens
        request()->session()->regenerate();

        // Get budget value
        $budget = Budget::where('user_id', Auth::id())->first();

        if (!$budget) {
            // Redirect to expenses
            return redirect('/budget');
        }

        // Skip adding budget, and go staright to dashboard with expenses open
        return redirect('/expenses');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::logout();

        return redirect('/login');
    }
}
