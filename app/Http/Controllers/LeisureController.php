<?php

namespace App\Http\Controllers;

use App\Models\Leisure;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeisureController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $sortBy = $request->query('sort_by', 'date'); // Default to sorting by date

        $query = Leisure::where('user_id', Auth::id());

        // Apply sorting based on the query parameter
        if ($sortBy === 'asc_amount') {
            $query->orderBy('amount', 'asc');
        } else if ($sortBy === 'desc_amount') {
            $query->orderBy('amount', 'desc');
        } else {
            $query->orderBy('date', 'asc'); // Default sort by date
        }

        $leisure = $query->get();
        $total = $leisure->pluck('amount')->sum();

        return view('folders.leisure', ['leisure' => $leisure, 'total' => $total]);
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

        Leisure::create(
            [
                'user_id' => Auth::id(),
                'date' => $date,
                'title' => $title,
                'amount' => $amount,
            ],

        );

        return redirect('/leisure');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $leisure = Leisure::findOrFail($id); // Find the leis$leisure or throw a 404 error
        $leisure->delete(); // Delete the leis$leisure

        return redirect('/leisure');
    }
}
