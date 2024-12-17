<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars'; // Ensure the table name matches
    protected $primaryKey = 'CAR_ID'; // Use CAR_ID as the primary key
    public $incrementing = true; // If CAR_ID is auto-incrementing
    protected $keyType = 'int'; // Match the type of CAR_ID

    
    public function getRouteKeyName()
    {
        return 'CAR_ID';
    }
    protected $fillable = [
        'CAR_NAME',
        'FUEL_TYPE',
        'CAPACITY',
        'PRICE',
        'CAR_IMG',
        'availability',
        'CATEGORY',
    ];

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
