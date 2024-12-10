<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Store payment details
    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'gcash_number' => 'required|string',
        ]);
        $validated['amount'] = Booking::find($validated['booking_id'])->calculateTotal();
        Payment::create($validated);
        return redirect('/bookings')->with('success', 'Payment successful!');
    }
}
