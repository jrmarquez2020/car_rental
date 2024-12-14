<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Car;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        // Basic counts for Dashboard
        $carCount = Car::count();
        $userCount = User::count();
        $bookingCount = Booking::count();

        // Data for recent activity or statistics
        $recentBookings = Booking::latest()->take(5)->get(); // Get latest 5 bookings
        $recentCars = Car::latest()->take(5)->get(); // Get latest 5 cars added
        $recentUsers = User::latest()->take(5)->get(); // Get latest 5 users

        // Data for recent or current month bookings
        $currentMonthBookings = Booking::whereMonth('created_at', Carbon::now()->month)->count();
        $currentMonthRevenue = Booking::whereMonth('created_at', Carbon::now()->month)
                                      ->sum('total_price'); // Assuming there is a total_price column in bookings

        return view('admin.dashboard', compact(
            'carCount', 'userCount', 'bookingCount', 
            'recentBookings', 'recentCars', 'recentUsers',
            'currentMonthBookings', 'currentMonthRevenue'
        ));
    }
}
