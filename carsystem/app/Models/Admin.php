<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = ['ADMIN_ID', 'ADMIN_PASSWORD'];

    protected $hidden = ['ADMIN_PASSWORD']; // To hide passwords in outputs
}
