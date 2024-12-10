<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password'];

    // A user can make many bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // A user can provide many feedback entries
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}
