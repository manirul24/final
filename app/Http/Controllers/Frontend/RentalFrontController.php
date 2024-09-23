<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\rental;
use App\Models\car;
use Illuminate\Http\Request;

class RentalFrontController extends Controller
{
    
    public function create()
{
    // Fetch all available cars for display
    $cars = Car::where('availability', 'Available')->get();

    return view('bookings', compact('cars'));
}



    public function store(Request $request)
    {
    $request->validate([
        'car_id' => 'required|exists:cars,id',
        'start_date' => 'required|date|after:today',
        'end_date' => 'required|date|after:start_date',
    ]);

    // Check if the car is available during the chosen period
    $booked = rental::where('car_id', $request->car_id)
        ->where(function($query) use ($request) {
            $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                  ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
        })
        ->exists();

    if ($booked) {
        return back()->withErrors(['message' => 'The selected car is not available for the chosen dates.']);
    }

    // Create the booking
    rental::create([
        'car_id' => $request->car_id,
        'user_id' => auth()->id(),
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'status' => 'Pending',
    ]);

    return redirect()->route('bookings')->with('success', 'Car booked successfully!');
}


}
