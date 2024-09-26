<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone',
        'role',
    ];


    Public static function isAdmin(){
        return  "admin";
        } 
        Public static function isCustomer(){
        return  "customer";
        } 

    // public function isAdmin()
    // {
    //     return $this->role === 'admin';
    // }

    /**
     * Check if the user has a customer role.
     *
     * @return bool
     */
    // public function isCustomer()
    // {
    //     return $this->role === 'customer';
    // }

    /**
     * Define a hasMany relationship with the Rental model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

}
