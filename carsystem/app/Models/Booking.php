<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'car_id', 'start_date', 'end_date', 'status'];

    // A booking belongs to a car
    public function car()
    {
        return $this->belongsTo(Car::class, 'CAR_ID'); // Linking with cars table
    }
    
    // A booking belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A booking can have one payment
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    // Calculate the total price of the booking
    public function calculateTotal()
    {
        $days = $this->start_date->diffInDays($this->end_date);
        return $days * $this->car->price_per_day;
    }
}

