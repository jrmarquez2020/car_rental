@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Left Side: Contact Information -->
        <div class="col-md-5 mb-4">
            <!-- Address -->
            <div class="d-flex align-items-center p-3 mb-3 bg-white rounded shadow-sm">
                <div class="me-3 text-warning">
                    <i class="fas fa-map-marker-alt fa-2x"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-1" style="color:black">Address</h5>
                    <p class="mb-0 text-secondary">Bypass, San Vicente, Urdaneta City, Pangasinan</p>
                </div>
            </div>

            <!-- Phone -->
            <div class="d-flex align-items-center p-3 mb-3 bg-white rounded shadow-sm">
                <div class="me-3 text-warning">
                    <i class="fas fa-phone-alt fa-2x"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-1" style="color:black">Phone</h5>
                    <p class="mb-0 text-secondary">09201021811 / 09318423134</p>
                </div>
            </div>

            <!-- Email -->
            <div class="d-flex align-items-center p-3 bg-white rounded shadow-sm">
                <div class="me-3 text-warning">
                    <i class="fas fa-envelope fa-2x"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-1" style="color:black">Email</h5>
                    <p class="mb-0 text-secondary">pangasinancarrental@gmail.com</p>
                </div>
            </div>
        </div>

        <!-- Right Side: Contact Form -->
        <div class="col-md-7">
            <div class="card p-4 shadow-sm">
                <h3 class="fw-bold mb-4">Send Message</h3>
                <form action="#" method="get">
                    @csrf
                    <!-- Full Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Full Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Your full name" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Your email address" required>
                    </div>

                    <!-- Message -->
                    <div class="mb-3">
                        <label for="message" class="form-label fw-bold">Type your Message</label>
                        <textarea name="message" class="form-control" rows="4" placeholder="Write your message here..." required></textarea>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-warning text-white px-4">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
