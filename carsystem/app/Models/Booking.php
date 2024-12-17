<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking extends Model
{
    use HasFactory;

    // Specify the table and primary key if they are different from default Laravel conventions
    protected $table = 'bookings';
    protected $primaryKey = 'BOOK_ID';  // Assuming 'BOOK_ID' is the primary key

    // Fields that are mass assignable
    protected $fillable = [
        'CAR_ID', 'EMAIL', 'BOOK_PLACE', 'BOOK_DATE', 'DURATION', 'PHONE_NUMBER',
        'DESTINATION', 'ID_PHOTO', 'PRICE', 'TOTAL_PRICE', 'BOOK_STATUS', 'RETURN_DATE'
    ];

    // Define the relationship with the Car model
    public function car()
    {
        return $this->belongsTo(Car::class, 'CAR_ID');  // Linking 'CAR_ID' in 'bookings' table to 'id' in 'cars' table
    }

    // Define the relationship with the User model (if applicable)
    public function user()
    {
        return $this->belongsTo(User::class, 'EMAIL');  // Assuming 'EMAIL' is a foreign key linking to users (or you could use 'user_id' if available)
    }

    // Calculate the total price based on the duration and car price
    public function calculateTotal()
    {
        $total = $this->PRICE * $this->DURATION;
        return $total;
    }

    // Optional: format total price as a formatted attribute
    public function getTotalFormattedAttribute()
    {
        return number_format($this->TOTAL_PRICE, 2);
    }
}
