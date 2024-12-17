<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Car;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Check if the user is an admin
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('/login')->with('error', 'Unauthorized access.');
        }

        // Basic counts for dashboard
        $carCount = Car::count();
        $userCount = User::count();
        $bookingCount = Booking::count();

        // Data for recent activity or statistics
        $recentBookings = Booking::latest()->take(5)->get();
        $recentCars = Car::latest()->take(5)->get();
        $recentUsers = User::latest()->take(5)->get();

        // Data for recent or current month bookings
        $currentMonthBookings = Booking::whereMonth('created_at', Carbon::now()->month)->count();
        $currentMonthRevenue = Booking::whereMonth('created_at', Carbon::now()->month)->sum('total_price');

        return view('admin.dashboard', compact(
            'carCount', 'userCount', 'bookingCount', 
            'recentBookings', 'recentCars', 'recentUsers',
            'currentMonthBookings', 'currentMonthRevenue'
        ));
    }
}
