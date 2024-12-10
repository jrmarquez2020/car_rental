<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        Booking::create($request->all());
        return redirect('/bookings');
    }

    public function index()
    {
        $bookings = Booking::with('car')->get();
        return view('booking.index', compact('bookings'));
    }
}
