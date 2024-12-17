@extends('layouts.welcome')

@section('title', 'Welcome | Car Rental System')

@section('header-title', 'Welcome to')
@section('header-subtitle', 'CarRentPro')
@section('header-description', 'Explore luxury vehicles with ease. Start your journey with us today!')
@section('header-button')
    <a href="{{ route('cars.index') }}" class="btn btn-custom btn-lg">Get Started</a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <h3>Convenience</h3>
        <p>Book a car online from the comfort of your home.</p>
    </div>
    <div class="col-md-4">
        <h3>Wide Selection</h3>
        <p>Choose from a variety of cars to suit your needs.</p>
    </div>
    <div class="col-md-4">
        <h3>Affordable</h3>
        <p>Competitive pricing to fit your budget.</p>
    </div>
</div>
@endsection
