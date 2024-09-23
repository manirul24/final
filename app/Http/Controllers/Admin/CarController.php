<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
   public function index() {
    $cars = Car::all();
    return view('pages.cars.index', compact('cars'));
}

public function create() {
    return view('pages.cars.create');
}

public function store(Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'year_of_manufacture' => 'required|date_format:Y',
        'car_type' => 'required|string|max:255',
        'daily_rent_price' => 'required|numeric',
        'availability' => 'required|boolean',
        'car_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    $car = new Car($request->all());

    if ($request->hasFile('car_image')) {
        $imagePath = $request->file('car_image')->store('car_images', 'public');
        $car->image = $imagePath;
    }

    $car->save();

    return redirect()->route('cars.index')->with('success', 'Car added successfully.');
}

public function edit($id)
{
    // Find the car by its ID
    $car = Car::findOrFail($id);

    // Return the edit view with the car data
    return view('pages.cars.edit', compact('car'));
}

public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'year_of_manufacture' => 'required|date_format:Y',
        'car_type' => 'required|string|max:255',
        'daily_rent_price' => 'required|numeric',
        'availability' => 'required|boolean',
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    // Find the car by its ID
    $car = Car::findOrFail($id);

    // Update the car's data
    $car->update($request->all());

    // Handle image upload if there's a new image
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($car->image) {
            Storage::delete('public/' . $car->image);
        }

        // Store the new image
        $imagePath = $request->file('image')->store('car_images', 'public');
        $car->image = $imagePath;
    }

    // Save the updated car data
    $car->save();

    // Redirect back to the index page with a success message
    return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
}


public function destroy($id)
{
    // Find the car by its ID
    $car = Car::findOrFail($id);
    
    // If a car image exists, delete the image from storage
    if ($car->image) {
        Storage::delete('public/' . $car->image);
    }

    // Delete the car from the database
    $car->delete();

    // Redirect back to the index page with a success message
    return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
}


// Similar functions for edit, update, and delete.

}
