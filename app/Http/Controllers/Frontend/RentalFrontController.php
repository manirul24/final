<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\rental;
use App\Models\car;
use App\Models\User;
use Illuminate\Http\Request;

class RentalFrontController extends Controller
{
    
    public function create(Request $request)
{
    $id=$request->id;
    
    // Fetch all available cars for display
    $cars = Car::where('id', $id)->first();

    return view('bookings', compact('cars'));
}



    public function store(Request $request)
    {
$carId=$request->input('car_id');
     
    $request->validate([
        'car_id' => 'required',
        'start_date' => 'required|date|after:today',
        'end_date' => 'required|date|after:start_date',
    ]);
   

    // Check if the car is available during the chosen period  'car_id' => 'required|exists:cars,id',
    $booked = rental::where('car_id', $request->car_id)
        ->where(function($query) use ($request) {
            $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                  ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
        })
        ->exists();

        

    if ($booked) {
        return back()->withErrors(['message' => 'The selected car is not available for the chosen dates.']);
    }
     
  $userId=$request->header('id');
// $dailyRent_price=$request->input('daily_rent_price');
    // dd($userId);

    // Create the booking
    rental::create([
        'car_id' => $request->car_id,
        'user_id' => $userId,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
          'total_cost' => $request->daily_rent_price,
        'status' => 'Booked',
    ]);

    return redirect()->route('search')->with('success', 'Car booked successfully!');
}


}
