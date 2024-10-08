<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rental extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'car_id', 'start_date', 'end_date', 'total_cost', 'status'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    /**
     * Define a belongsTo relationship with the User model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
