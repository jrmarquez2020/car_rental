<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['brand', 'model', 'price_per_day', 'availability', 'description'];

    // A car can have many bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // A car can have many feedback entries
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}
