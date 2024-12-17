@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <h1 class="mb-4">Welcome to the Admin Dashboard</h1>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Cars</h5>
                    <p class="card-text">{{ $carCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text">{{ $userCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Bookings</h5>
                    <p class="card-text">{{ $bookingCount }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <h2 class="mt-5">Recent Activity</h2>
    <div class="row">
        <div class="col-lg-6">
            <h4>Recent Bookings</h4>
            <ul class="list-group">
                @foreach ($recentBookings as $booking)
                    <li class="list-group-item">
                        Booking ID: {{ $booking->BOOK_ID }} - {{ $booking->BOOK_PLACE }}
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-lg-6">
            <h4>Recent Cars</h4>
            <ul class="list-group">
                @foreach ($recentCars as $car)
                    <li class="list-group-item">
                        Car Name: {{ $car->name }} - Added On: {{ $car->created_at->format('d M Y') }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
