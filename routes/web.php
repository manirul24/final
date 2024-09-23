<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Middleware\TokenVerificationMiddleware;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Frontend\CarFontController;
use App\Http\Controllers\Frontend\RentalFrontController;



Route::get('/', function () {
    return view('welcome');
});


// Web API Routes
Route::post('/user-registration',[UserController::class,'UserRegistration']);
Route::post('/user-login',[UserController::class,'UserLogin']);
Route::post('/send-otp',[UserController::class,'SendOTPCode']);
Route::post('/verify-otp',[UserController::class,'VerifyOTP']);
Route::post('/reset-password',[UserController::class,'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/user-profile',[UserController::class,'UserProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/user-update',[UserController::class,'UpdateProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/userLogin',[UserController::class,'LoginPage']);
Route::get('/userRegistration',[UserController::class,'RegistrationPage']);

Route::get('/logout',[UserController::class,'UserLogout']);


Route::resource('cars', CarController::class)->middleware([TokenVerificationMiddleware::class]);
Route::resource('customers', CustomerController::class)->middleware([TokenVerificationMiddleware::class]);
Route::resource('rentals', RentalController::class)->middleware([TokenVerificationMiddleware::class]);

//Route::get('/dashboard', [RentalController::class, 'statistics'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/dashboard',[DashboardController::class,'DashboardPage'])->middleware([TokenVerificationMiddleware::class]); 

// fontend routes
 Route::get('/cars-index', [CarFontController::class, 'index'])->name('cars.index');


 // Display form for creating a booking
Route::get('/bookings', [RentalFrontController::class, 'create'])->name('bookings.create');

// Store the booking
Route::post('/bookings', [RentalFrontController::class, 'store'])->name('bookings.store');
