<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'car_id', 'rating', 'comments'];

    // Feedback belongs to a car
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    // Feedback belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
