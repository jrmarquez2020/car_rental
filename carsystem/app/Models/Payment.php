<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id', 'gcash_number', 'amount'];

    // Payment belongs to a booking
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
