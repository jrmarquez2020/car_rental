<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
    $request->validate([
        'car_id' => 'required|exists:cars,id',
        'user_id' => 'required|exists:users,id',
    ]);

    Booking::create($request->all());
    return redirect('/bookings');
    }


    public function index()
    {
        $bookings = Booking::with('car')->get();
        return view('bookings.index', compact('bookings'));
    }
}
