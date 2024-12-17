@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<!-- Background Gradient Section -->
<div class="container-fluid" style="background: linear-gradient(to right, #FF7200, #F3A2B1); padding: 50px 0;">
    <div class="container">
        <!-- Card with Image and Text -->
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img src="{{ asset('storage/images/carrental.jpg') }}" alt="Car Rentals Logo" class="img-fluid" style="max-height: 200px;">
            </div>
            <div class="col-md-6 text-center text-white">
                <h2>About Us</h2>
                <p>We started this company to help make people's dreams come true and enjoy life to its fullest potential. Join us on this incredible journey to experience luxury and happiness.</p>
                <div>
                    <a href="#" class="btn btn-light px-4 py-2 mx-2">
                        <i class="fab fa-facebook-f"></i> <!-- Facebook Icon -->
                    </a>
                    <a href="#" class="btn btn-light px-4 py-2 mx-2">
                        <i class="fab fa-instagram"></i> <!-- Instagram Icon -->
                    </a>
                    <a href="#" class="btn btn-light px-4 py-2 mx-2">
                        <i class="fab fa-twitter"></i> <!-- Twitter Icon -->
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
