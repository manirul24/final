<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

     public function index()
    {
        $customers = User::where('role','customer')->get();
        return view('pages.customers.index', compact('customers'));
    }

    // Show form for creating a new customer
    public function create()
    {
        return view('pages.customers.create');
    }

    // Store a newly created customer
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|min:8',
        ]);


          $data = $request->all();
    $data['password'] = bcrypt($request->password);  // Hash the password

    User::create($data);


        // User::create($request->all());
        //   $data['password'] = bcrypt($request->password);

        return redirect()->route('pages.customers.index')->with('success', 'Customer created successfully.');
    }

    // Show form for editing a customer
    public function edit($id)
    {
           $user = User::findOrFail($id);
        return view('pages.customers.edit', compact('user'));
    }

    // Update a customer's information
    public function update(Request $request, User $customer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,'.$customer->id,
            'phone' => 'required',
            'address' => 'required',
        ]);

        $customer->update($request->all());
        return redirect()->route('pages.customers.index')->with('success', 'Customer updated successfully.');
    }

    // Remove a customer
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('pages.customers.index')->with('success', 'Customer deleted successfully.');
    }
}
