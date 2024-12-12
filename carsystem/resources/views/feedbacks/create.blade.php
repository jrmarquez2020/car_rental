@extends('layout')

@section('title', 'Leave Feedback')

@section('content')
<h1>Leave Feedback for {{ $car->brand }} - {{ $car->model }}</h1>
<form action="/feedbacks" method="POST">
    @csrf
    <input type="hidden" name="car_id" value="{{ $car->id }}">
    <label for="rating">Rating:</label>
    <input type="number" name="rating" min="1" max="5" required>
    <label for="comments">Comments:</label>
    <textarea name="comments" required></textarea>
    <button type="submit">Submit Feedback</button>
</form>
@endsection
