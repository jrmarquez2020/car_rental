<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    // Store a new booking
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'CAR_ID' => 'required|exists:cars,CAR_ID',       // Car ID must exist in the cars table
            'BOOK_PLACE' => 'required|string|max:255',       // Booking place (optional field)
            'BOOK_DATE' => 'required|date',                  // Valid date format for booking date
            'DURATION' => 'required|integer|min:1',          // Duration must be a positive integer
            'PHONE_NUMBER' => 'required|numeric',            // Valid phone number (numeric)
            'DESTINATION' => 'required|string|max:255',      // Destination (optional field)
            'PRICE' => 'required|numeric',                   // Price per day (numeric value)
            'BOOK_STATUS' => 'required|string|max:255',      // Booking status (must be a string)
            'RETURN_DATE' => 'nullable|date|after_or_equal:BOOK_DATE', // Return date must be after booking date if provided
        ]);

        // Retrieve the email from the authenticated user
        $email = auth()->user()->email;

        // Calculate the total price based on the price per day and duration
        $total_price = $request->PRICE * $request->DURATION;

        // If a return date is provided, calculate the actual return date based on the booking date and duration
        $return_date = $request->RETURN_DATE ? Carbon::parse($request->RETURN_DATE) : null;

        // Create the booking in the database
        $booking = Booking::create([
            'CAR_ID' => $request->CAR_ID,
            'EMAIL' => $email, // Store the email of the authenticated user
            'BOOK_PLACE' => $request->BOOK_PLACE,
            'BOOK_DATE' => $request->BOOK_DATE,
            'DURATION' => $request->DURATION,
            'PHONE_NUMBER' => $request->PHONE_NUMBER,
            'DESTINATION' => $request->DESTINATION,
            'ID_PHOTO' => $request->file('ID_PHOTO') ? $request->file('ID_PHOTO')->store('booking_photos') : null,  // Optional file upload
            'PRICE' => $request->PRICE,
            'TOTAL_PRICE' => $total_price, // Store the calculated total price
            'BOOK_STATUS' => $request->BOOK_STATUS,
            'RETURN_DATE' => $return_date,       // Optional return date
        ]);

        // Redirect to the bookings page with a success message
        return redirect()->route('bookings.index')->with('success', 'Booking has been successfully created!');
    }

    // Show all bookings (admin or user can view)
    public function index()
    {
        // Fetch all bookings with their associated cars (using eager loading)
        $bookings = Booking::with('car')->get();

        // Return the bookings view with the data
        return view('bookings.index', compact('bookings'));
    }

    // Show booking details (optional if needed)
    public function show($id)
    {
        $booking = Booking::findOrFail($id);  // Fetch the booking by ID
        return view('bookings.show', compact('booking'));  // Return the details view
    }

    // Show the booking form for a specific car
    public function showBookingForm($id)
    {
        $car = Car::findOrFail($id);  // Get the car by its ID
        $user = auth()->user();
        return view('bookings.create', compact('car', 'user'));  // Pass the car details and user to the booking form view
    }
}
