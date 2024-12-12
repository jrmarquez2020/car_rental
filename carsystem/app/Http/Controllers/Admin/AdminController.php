<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Car;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $carCount = Car::count();
        $userCount = User::count();
        $bookingCount = Booking::count();
        return view('admin.dashboard', compact('carCount', 'userCount', 'bookingCount'));
    }
}
