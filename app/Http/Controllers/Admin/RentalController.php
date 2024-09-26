<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Rental;
use App\Models\User;
use App\Models\Car;

class RentalController extends Controller
{

   public function statistics()
    {
        $totalCars = Car::count();
        $availableCars = Car::where('availability', '1')->count(); // Adjust according to your column name
        $totalRentals = Rental::count();
        $totalEarnings = Rental::sum('total_cost');

        return view('report.statistics-admin', compact('totalCars', 'availableCars', 'totalRentals', 'totalEarnings'));
    }


     public function index()
    {
        $rentals = Rental::with(['user', 'car'])->get();
        return view('pages.rentals.index', compact('rentals'));
    }

    // Show form for creating a new rental
    public function create()
    {
        $customers = User::all();
        $cars = Car::all();
        return view('pages.rentals.create', compact('customers', 'cars'));
    }

    // Store a newly created rental
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'car_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_cost' => 'required|numeric',
            'status' => 'required|in:ongoing,completed,canceled',
        ]);

       // Rental::create($request->all());


      Rental::create([
                    'user_id' =>$request->input('user_id'),    
                    'car_id' => $request->input('car_id'),                 
                    'start_date' =>  $request->input('start_date'),                 
                    'end_date' =>   $request->input('end_date'),                 
                    'total_cost' =>  $request->input('total_cost'),                 
                    'status' =>  $request->input('status'),          
                   
                ]);

        return redirect()->route('rentals.index')->with('success', 'Rental created successfully.');
    }

    // Show form for editing a rental
    public function edit(Rental $rental)
    {
        $customers = User::all();
        $cars = Car::all();
        return view('pages.rentals.edit', compact('rental', 'customers', 'cars'));
    }


     public function update(Request $request, Rental $rental)
    {
        $request->validate([
            'customer_id' => 'required',
            'car_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_cost' => 'required|numeric',
            'status' => 'required|in:ongoing,completed,canceled',
        ]);

        $rental->update($request->all());

        return redirect()->route('rentals.index')->with('success', 'Rental updated successfully.');
    }

    
    // Update an existing rental
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'user_id' => 'required',
    //         'car_id' => 'required',
    //         'start_date' => 'required|date',
    //         'end_date' => 'required|date|after_or_equal:start_date',
    //         'total_cost' => 'required|numeric',
    //         'status' => 'required|in:ongoing,completed,canceled,Booked,Pending',
    //     ]);

    //         $rental = Rental::findOrFail($id);

    //     $rental->update($request->all());

    //         $rental->save();

    //     return redirect()->route('rentals.index')->with('success', 'Rental updated successfully.');
    // }

    // Delete a rental
    public function destroy(Rental $rental)
    {
        $rental->delete();
        return redirect()->route('rentals.index')->with('success', 'Rental deleted successfully.');
    }
}
