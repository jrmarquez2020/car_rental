@extends('layouts.app')

@section('title', 'Feedback')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h3 class="mb-0" style="color: black">Feedback</h3>
        </div>

        <div class="card-body">
            <h4>Your opinion matters! Share your experience with us.</h4>
            
            <form action="{{ route('feedback.submit') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your name" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="comments" class="form-label">Comments</label>
                    <textarea class="form-control @error('comments') is-invalid @enderror" id="comments" name="comments" rows="4" placeholder="Write your message here" required></textarea>
                    @error('comments')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="rating" class="form-label">Rate Your Experience:</label>
                    <div class="star-rating">
                        <input type="radio" id="star5" name="rating" value="5"><label for="star5"></label>
                        <input type="radio" id="star4" name="rating" value="4"><label for="star4"></label>
                        <input type="radio" id="star3" name="rating" value="3"><label for="star3"></label>
                        <input type="radio" id="star2" name="rating" value="2"><label for="star2"></label>
                        <input type="radio" id="star1" name="rating" value="1"><label for="star1"></label>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-warning px-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .star-rating input {
        display: none;
    }

    .star-rating label {
        font-size: 30px;
        color: #ddd;
        cursor: pointer;
    }

    .star-rating input:checked ~ label {
        color: #FFB400;
    }

    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #FFB400;
    }
</style>
@endsection
