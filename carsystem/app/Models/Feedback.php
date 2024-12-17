<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    // The table associated with the model.
    protected $table = 'feedbacks';

    // The attributes that are mass assignable.
    protected $fillable = ['EMAIL', 'COMMENT', 'RATING'];


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
