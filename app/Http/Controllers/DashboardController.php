<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\victim_student;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DashboardController extends Controller
{
    function DashboardPage(Request $request){


          $user =$request->header('userType'); // Get the logged-in user
        // Check if the user is admin or customer and return the corresponding dashboard view accordingly.
        // This assumes that the User model has a method isAdmin() and isCustomer() that returns a boolean value.
 

    if ($user=='admin') {
        return view('pages.dashboard.dashboard-admin-page'); // Admin dashboard view
    }

    if ($user=='customer') {
        return view('pages.dashboard.dashboard-customer-page'); // Customer dashboard view
    }

    return view('dashboard.default'); // Default or fallback view
      
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
