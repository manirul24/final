<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\victim_student;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\car;
use App\Models\Rental;

class DashboardController extends Controller
{
    function DashboardPage(Request $request){


          $user =$request->header('userType'); // Get the logged-in user
        // Check if the user is admin or customer and return the corresponding dashboard view accordingly.
        // This assumes that the User model has a method isAdmin() and isCustomer() that returns a boolean value.
  

    if ($user=='admin') {

         $totalCars = Car::count();
        $availableCars = Car::where('availability', '1')->count(); // Adjust according to your column name
        $totalRentals = Rental::count();
        $totalEarnings = Rental::sum('total_cost');

        return view('report.statistics-admin', compact('totalCars', 'availableCars', 'totalRentals', 'totalEarnings'));

       // return view('report.statistics-admin' ); // Admin dashboard view
    }

            if($user=='customer') {
         
                 return redirect()->route('search')->with('success', 'Customer created successfully.');
       // return view('search',compact('user')); // Customer dashboard view
    } else {
            return view('search');
        }

      
       // return view('pages.dashboard.dashboard-page', compact('isCustomer'));
    }

    function Summary(){
     // $count = victim_student::count();

        $studentCountByCollege = DB::table('victim_students')
         ->leftJoin('users', 'victim_students.college_code', '=', 'users.college_code') 
    ->select('victim_students.college_code','users.college_name', DB::raw('count(*) as total'))
     ->groupBy('victim_students.college_code', 'users.college_name')
    ->get();

  
    
        return view('pages.dashboard.summery-page',compact('studentCountByCollege'));
    }
 
}
