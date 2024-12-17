<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    // Display all bookings for the admin
    public function index()
    {
        $bookings = Booking::with('car', 'user')->get();
        return view('admin.bookings.index', compact('bookings')); // Ensure this points to the correct view
    }

    // Show the form for editing a booking
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.bookings.edit', compact('booking')); // Make sure this view is under admin/bookings/edit.blade.php
    }

    // Update the booking details
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking updated successfully!');
    }

    // Create a new booking
    public function create()
    {
        return view('admin.bookings.create'); // Ensure this points to the correct view
    }

    // Store a new booking in the database
    public function store(Request $request)
    {
        $booking = new Booking;
        $booking->user_id = $request->user_id;
        $booking->car_id = $request->car_id;
        $booking->status = 'pending';
        $booking->save();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking created successfully!');
    }

    // Delete a booking
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully!');
    }
}
