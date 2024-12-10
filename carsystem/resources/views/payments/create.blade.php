@extends('layout')

@section('title', 'Make Payment')

@section('content')
<h1>Complete Payment</h1>
<p>Total Amount: ${{ $amount }}</p>
<form action="/payments" method="POST">
    @csrf
    <input type="hidden" name="booking_id" value="{{ $booking->id }}">
    <label for="gcash_number">GCash Number:</label>
    <input type="text" name="gcash_number" required>
    <button type="submit">Pay Now</button>
</form>
@endsection
