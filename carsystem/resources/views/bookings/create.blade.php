@extends('layout')

@section('title', 'Book a Car')

@section('content')
<h1>Book {{ $car->brand }} - {{ $car->model }}</h1>
<form action="/bookings" method="POST">
    @csrf
    <input type="hidden" name="car_id" value="{{ $car->id }}">
    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date" required>
    <label for="end_date">End Date:</label>
    <input type="date" name="end_date" required>
    <button type="submit">Confirm Booking</button>
</form>
@endsection
