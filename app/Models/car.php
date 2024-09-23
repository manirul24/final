<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'brand',
        'model',
         'year_of_manufacture',
          'car_type',
           'daily_rent_price',
            'availability',
              'car_image'           

    ];

   public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
