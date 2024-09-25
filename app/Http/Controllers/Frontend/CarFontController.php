<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CarFontController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query();

        // Apply filters
        if ($request->has('car_type') && $request->car_type != '') {
            $query->where('car_type', $request->car_type);
        }

        if ($request->has('brand') && $request->brand != '') {
            $query->where('brand', $request->brand);
        }

        if ($request->has('min_price') && $request->min_price != '' && $request->has('max_price') && $request->max_price != '') {
            $query->whereBetween('daily_rent_price', [$request->min_price, $request->max_price]);
        }

        // Fetch cars with applied filters
        $cars = $query->get();

        // Get distinct car types and brands for the filter options
        $carTypes = Car::select('car_type')->distinct()->get();
        $brands = Car::select('brand')->distinct()->get();

        return view('search', compact('cars', 'carTypes', 'brands'));
    }

}

