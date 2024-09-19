<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

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
        'availability_status' => 'required|boolean',
        'car_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    $car = new Car($request->all());

    if ($request->hasFile('car_image')) {
        $imagePath = $request->file('car_image')->store('car_images', 'public');
        $car->car_image = $imagePath;
    }

    $car->save();

    return redirect()->route('cars.index')->with('success', 'Car added successfully.');
}

// Similar functions for edit, update, and delete.

}
