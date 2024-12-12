@extends('layout')

@section('title', 'Available Cars')

@section('content')
<h1>Available Cars</h1>
<div class="car-list">
    @foreach($cars as $car)
        <div class="car">
            <h3>{{ $car->brand }} - {{ $car->model }}</h3>
            <p>Price per Day: ${{ $car->price_per_day }}</p>
            <p>{{ $car->description }}</p>
            <a href="/cars/{{ $car->id }}/book">Book Now</a>
        </div>
    @endforeach
</div>
@endsection
